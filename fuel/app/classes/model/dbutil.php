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
                    if (is_float($value)) {
                        // to float
                        $records[$key][$column] = (float)$value;
                    }else if (is_numeric($value) && !is_int($value)) {
                        // to float
                        $records[$key][$column] = (float)$value;
                    } else if (is_int($value)) {
                        // to integer
                        $records[$key][$column] = (int)$value;
                    }
                }
            }
        }
    }

    public static function getDeviceIdList($m_sensor_mains) {
       // get all device_id
       $device_id = array();
       foreach($m_sensor_mains as $key => $m_sensor_main) {
           // fixed sensor 1
           $column_name = "sensor1_device_id";
           if (isset($m_sensor_main[$column_name]) && $m_sensor_main[$column_name] > 0) {
                   $device_id[] = $m_sensor_main[$column_name];
           }
       }
       return $device_id;
    }
}