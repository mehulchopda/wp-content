<?php

/**
 * Description of Mw
 *
 * @author daniela
 */
class Mw {

    private $id1;
    private $id2;
    private $name;
    private $price;

    function __construct() {
        
    }

    public function getId1() {
        return $this->id1;
    }

    public function setId1($id1) {
        $this->id1 = $id1;
    }

    public function getId2() {
        return $this->id2;
    }

    public function setId2($id2) {
        $this->id2 = $id2;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setParamsByArray($mw) {
        foreach ($mw as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

}

?>
