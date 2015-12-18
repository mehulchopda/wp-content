<?php

class ReadCfgFiles {

    public static function readCfgFile($filename) {
        if (file_exists($filename)) {
            $lines = file($filename);

            $cfgFile = array();

            for ($i = 0; $i < count($lines); $i++) {
                if (ReadCfgFiles::checkLine($lines[$i])) {
                    $str = explode("=", $lines[$i]);
                    $cfgFile[$str[0]] = str_replace("\n", "", $str[1]);
                }
            }
            return $cfgFile;
        } else {
            echo "$filename existiert nicht";
        }
    }

    public static function readDestinationCfgFile($filename) {
        if (file_exists($filename)) {
            $lines = file($filename);

            $cfgFile = array();

            for ($i = 0; $i < count($lines); $i++) {
                if (ReadCfgFiles::checkLine($lines[$i]) && strpos($lines[$i], "|") != false) {
                    $str = explode("|", $lines[$i]);
                    $str1 = explode("=", $str[1]);
                    $cfgFile[$str[0]][$str1[0]] = str_replace("\n", "", $str1[1]);
                }
            }
            return $cfgFile;
        } else {
            echo "$filename existiert nicht";
        }
    }

    private static function checkLine($line) {
        if (!(strpos($line, "#") === 0) && strpos($line, "=") != false && $line != "") {
            return true;
        } else {
            return false;
        }
    }

}
?>

