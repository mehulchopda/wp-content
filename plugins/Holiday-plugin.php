<?php

/*
Plugin Name: Holiday Post

Description: Index Posts for Holiday Lifestyle
Version: 1.0
Author: Mehul
/
 */

/**
 * Calls the class on the post add/edit screens.
 */
function call_Multi_Image_Uploader() {
    new Multi_Image_Uploader();
}

/**
 * Get images attached to some post
 *
 * @param int $post_id
 * @return array
 */
function miu_get_images($post_id = null) {
    global $post;
    if ($post_id == null) {
        $post_id = $post->ID;
    }

    $value = get_post_meta($post_id, 'miu_images', true);
    $images = unserialize($value);
    $result = array();
    if (!empty($images)) {
        foreach ($images as $image) {
            $result[] = $image;
        }
    }
    return $result;
}

if (is_admin()) {
    add_action('load-post.php', 'call_Multi_Image_Uploader');
    add_action('load-post-new.php', 'call_Multi_Image_Uploader');
}

/**
 * Multi_Image_Uploader
 */
class Multi_Image_Uploader {

    var $post_types = array();

    /**
     * Initialize Multi_Image_Uploader
     */
    public function __construct() {
        $this->post_types = array('post', 'page');

        //limit meta box to certain post types
        add_action('add_meta_boxes', array($this, 'add_meta_box'));
        add_action('save_post', array($this, 'save'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    /**
     * Adds the meta box container.
     */
    public function add_meta_box($post_type) {

        if (in_array($post_type, $this->post_types)) {
            add_meta_box('multi_image_upload_meta_box', __('Upload Multiple Images', 'miu_textdomain'), array($this, 'render_meta_box_content'), $post_type, 'advanced', 'high');
        }
    }

    /**
     * Save the images when the post is saved.
     *
     * @param int $post_id The ID of the post being saved.
     */
    public function save($post_id) {

        /*
         * We need to verify this came from the our screen and with proper authorization,
         * because save_post can be triggered at other times.
         */

        // Check if our nonce is set.
        if (!isset($_POST['miu_inner_custom_box_nonce'])) {
            return $post_id;
        }

        $nonce = $_POST['miu_inner_custom_box_nonce'];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, 'miu_inner_custom_box')) {
            return $post_id;
        }

        // If this is an autosave, our form has not been submitted,
        //     so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        // Check the user's permissions.
        if ('page' == $_POST['post_type']) {

            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } else {

            if (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }
        }

        /* OK, its safe for us to save the data now. */

        // Validate user input.
        $posted_images = $_POST['miu_images'];
        $miu_images = array();
        if (!empty($posted_images)) {
            foreach ($posted_images as $image_url) {
                if (!empty($image_url)) {
                    $miu_images[] = esc_url_raw($image_url);
                }
            }
        }

        // Update the miu_images meta field.
        update_post_meta($post_id, 'miu_images', serialize($miu_images));
    }

    /**
     * Render Meta Box content.
     *
     * @param WP_Post $post The post object.
     */
    public function render_meta_box_content($post) {

        // Add an nonce field so we can check for it later.
        wp_nonce_field('miu_inner_custom_box', 'miu_inner_custom_box_nonce');

        // Use get_post_meta to retrieve an existing value from the database.
        $value = get_post_meta($post->ID, 'miu_images', true);
        ?>
        <div id="miu_images">
            <?php
            $children = get_post_meta($post->ID, 'childs', true);

            //Retrieve post meta field for a post.
            $c = 0;
            if (is_array($children)) {
                foreach ($children as $childs) {
                    if (isset($childs['title']) || isset($childs['content']) || isset($childs['image'])) {
                        printf('<p>Title: <input type="text" name="childs[%1$s][title]" value="%2$s" /> Content : <input type="text" name="childs[%1$s][content]" value="%3$s" />' . '<button onClick="addRow()" value="Add Image" class="button">Add image</button>' . '<button class="remove">Remove Element</button></p>', $c, $childs['title'], $childs['content']);
                        $c = $c + 1;
                    }
                }
            }
            ?>
            <span id="here"></span>
            <button class="add">Add Element</button>
            <script>
                var jQuery = jQuery.noConflict();
                var that = jQuery(this);
                jQuery(document).ready(function () {
                    var imgCount = 0;
                    var count = <?php echo $c;?>;
                    jQuery(".add").click(function () {
                        count = count + 1;

                        jQuery('#here').append('<p>Title: <input type="text" name="childs[' + count + '][title]" value="" /> \n\
                    Content : <input type="text" name="childs[' + count + '][content]" value="" /> Image: <input type="text" class="meta-image" name="childs[' + count + '][image]" value="" />\n\
                    <button class="meta-image-button" name:"Choose Image">Choose Image</button><button class="addImage">&#43;</button><button class="remove">Remove Element</button></p>');
                        return false;
                    });
                    jQuery(".remove").live('click', function () {
                        jQuery(this).parent().remove();
                    });
                });
            </script>
        </div>
        <?php

        $images = unserialize($value);

        $script = "<script>
            itemsCount= 0;";
        if (!empty($images)) {
            foreach ($images as $image) {
                $script .= "addRow('{$image}');";
            }
        }
        $script .= "</script>";
        echo $script;
    }

    function enqueue_scripts($hook) {
        if ('post.php' != $hook && 'post-edit.php' != $hook && 'post-new.php' != $hook) {
            return;
        }

        wp_enqueue_script('miu_script', plugin_dir_url(__FILE__) . 'miu_script.js', array('jquery'));
    }
}
