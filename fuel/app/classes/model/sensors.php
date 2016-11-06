<?php
namespace Model;

class Sensors extends \Model {

        public static function getRecentRecord($device_ids) {
            
            $result = array();
            foreach ($device_ids as $device_id) {
                $l_measurements_history = \Model_L_Measurements_History::query()
                                ->where("device_id", $device_id)
                                ->order_by(array("captured_at" => "DESC"))
                                ->get_one();
                $result[$device_id] = $l_measurements_history;
            }
            return $result;
        }

        public static function getAggregation($device_ids) {
            
            $result = array();
            foreach ($device_ids as $device_id) {
                $l_measurements_history_daily = \Model_L_Measurements_History_Daily::query()
                                ->where("device_id", $device_id)
                                ->where("captured_date", date("Y-m-d 00:00:00", strtotime("-1 day")))
                                ->get_one();
                $result[$device_id] = $l_measurements_history_daily;
            }
            return $result;
        }

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

        public static function attachAggregations(&$m_sensor_mains, $recents, $aggregations) {
            // attach mesurement
            foreach ($m_sensor_mains as $key => $m_sensor_main) {
                $column_name = "sensor1_device_id";
                if ($m_sensor_main[$column_name] > 0) {
                    if (isset($recents[$m_sensor_main[$column_name]])) {
                        \Log::info(print_r($recents[$m_sensor_main[$column_name]], true));
                        $value = $recents[$m_sensor_main[$column_name]]->value;
                        $captured_at = $recents[$m_sensor_main[$column_name]]->captured_at;
                        $m_sensor_mains[$key]['recent'] = array('value' => $value, 'captured_at' => $captured_at);
                    }
                    if (isset($aggregations[$m_sensor_main[$column_name]])) {
                        \Log::info(print_r($aggregations[$m_sensor_main[$column_name]], true));
                        $peak_value = $aggregations[$m_sensor_main[$column_name]]->peak_value;
                        $average_value = $aggregations[$m_sensor_main[$column_name]]->average_value;
                        $m_sensor_mains[$key]['aggregation']['yesterday'] = array('peak_value' => $peak_value, 'avg_value' => $average_value);
                    }
                }
            }
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
        
        private static function convertRecord($data) {
            // object to array
            $data_array = get_object_vars($data);
            // format captured_at
            $time = strtotime($data_array['captured_at']);
            $data_array['captured_at'] = date("Y-m-d H:i:s", $time);
            $data_array['updated_at'] = date("Y-m-d H:i:s", time());
            $data_array['created_at'] = date("Y-m-d H:i:s", time());
           return $data_array;
        }


        public static function registerRecord($data) {
            $l_measurements_history = \Model_L_Measurements_History::query()->where('id', $data->id)
                        ->where('device_id', $data->device_id)
                        ->get_one();
            if (empty($l_measurements_history)) {
                $data = self::convertRecord($data);
                $l_measurements_history = \Model_L_Measurements_History::forge();
                $l_measurements_history->set($data);
                $l_measurements_history->save();
                return true;
            } else {
                return false;
            }
        } 
}