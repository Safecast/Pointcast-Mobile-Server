<?php
namespace Model;

class Dbutil extends \Model {

    public static function convertArrayToKeyValue($array, $key_column, $value_column) {

        $result = array();
        if (is_array($array)) {
            foreach ($array as $key => $record) {
                $result[$record[$key_column]] = $record[$value_column];
            }
        }
        return $result;
    }

    public static function recordCastInt(&$records) {

        $result = array();
        if (is_array($records)) {
            foreach ($records as $key => $record) {
                foreach ($record as $column => $value) {
                    if (is_numeric($value)) {
                        $records[$key][$column] = (int)$value;
                    }
                }
            }
        }
    }

}