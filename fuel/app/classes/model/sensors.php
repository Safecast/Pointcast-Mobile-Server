<?php
namespace Model;

class Sensors extends \Model {

        public static function getAverageSummary($device_ids) {
            $base_timestamp = strtotime("-1 day");
            $yeasterday_data = self::getAverageData(date("Y-m-d 23:59:59", $base_timestamp),
                                                        date("Y-m-d 00:00:00", $base_timestamp));
            $base_timestamp = strtotime("-1 months");
            $last_month_data = self::getAverageData(date("Y-m-t 23:59:59", $base_timestamp), 
                                                        date("Y-m-01 00:00:00", $base_timestamp));

            $base_timestamp = strtotime("last year");
            $last_year_data = self::getAverageData(date("Y-12-31 23:59:59", $base_timestamp),
                                                        date("Y-01-01 00:00:00", $base_timestamp));

            return array("yeasterday" => $yeasterday_data, 
                            "last_month" => $last_month_data, 
                            "last_year_data" => $last_year_data);
        }

        public static function getAverageData($before_date, $after_date) {
            $sql = <<< EOF
SELECT device_id,avg(value) as avg
FROM l_measurements_history
WHERE captured_at <= '$before_date' and captured_at >= '$after_date'
GROUP BY device_id ;
EOF;
            $result = \DB::query($sql)->execute()->as_array();
            $averages = \Model\Dbutil::convertArrayToKeyValue($result, "device_id", "avg");
            return $averages;
        }

        public static function getPeakSummary($device_ids) {
            $base_timestamp = strtotime("-1 day");
            $yeasterday_data = self::getPeakData(date("Y-m-d 23:59:59", $base_timestamp),
                                                        date("Y-m-d 00:00:00", $base_timestamp));
            
            $base_timestamp = strtotime("-1 months");
            $last_month_data = self::getPeakData(date("Y-m-t 23:59:59", $base_timestamp), 
                                                        date("Y-m-01 00:00:00", $base_timestamp));

            $base_timestamp = strtotime("last year");
            $last_year_data = self::getPeakData(date("Y-12-31 23:59:59", $base_timestamp),
                                                        date("Y-01-01 00:00:00", $base_timestamp));
            return array("yeasterday" => $yeasterday_data, 
                            "last_month" => $last_month_data, 
                            "last_year_data" => $last_year_data);
        }

        public static function getPeakData($before_date, $after_date) {
            $sql = <<< EOF
SELECT device_id, max(value) as avg
FROM l_measurements_history
WHERE captured_at <= '$before_date' and captured_at >= '$after_date'
GROUP BY device_id ;
EOF;
            $result = \DB::query($sql)->execute()->as_array();
            $peaks = \Model\Dbutil::convertArrayToKeyValue($result, "device_id", "avg");
            return $peaks;
        }

        public static function attachMeasurements(&$m_sensor_mains, $averages, $peaks) {

            static $search = array("yeasterday", "last_month", "last_year_data");
            
            // attach mesurement
            foreach ($m_sensor_mains as $key => $m_sensor_main) {
                for($i = 1; $i <= 9; $i++) {
                    $column_name = "sensor${i}_device_id";
                    if ($m_sensor_main[$column_name] > 0) {
                        // check mesurement and append
                        foreach ($search as $word) {
                            // average
                            if (isset($averages[$word][$m_sensor_main[$column_name]])) {
                                $value = $averages[$word][$m_sensor_main[$column_name]];
                                $m_sensor_mains[$key]['average'][$word] = $value;
                            }
                            // column
                            if (isset($peaks[$word][$m_sensor_main[$column_name]])) {
                                $value = $peaks[$word][$m_sensor_main[$column_name]];
                                $m_sensor_mains[$key]['peak'][$word] = $value;
                            }
                        }
                    }
                }
            }
        }
}