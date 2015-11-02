<?php
namespace Model;

class Dbutil extends \Model {

    public static function  convertArrayToKeyValue($array, $key_column, $value_column) {

        $result = array();
        if (is_array($array)) {
            foreach ($array as $key => $record) {
                $result[$record[$key_column]] = $record[$value_column];
            }
        }
        return $result;
    }

}