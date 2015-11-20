<?php
namespace Model;

class Chart extends \Model {

    const REALTIME_CHART_LIMIT = 576; // 2days  

    public static function getRealtimeChart($m_sensor_main_id) {

        $result = array();

        $m_sensor_main = \DB::select()->from('m_sensor_main')
                                        ->where("m_sensor_main_id", $m_sensor_main_id)
                                        ->execute()
                                        ->as_array();
        if (empty($m_sensor_main)) {
            return array();
        }

        $m_sensor_main = reset($m_sensor_main);

        // attach mesurement
        // for($i = 1; $i <= 9; $i++) {
            $i = 1;
            $column_name = "sensor${i}_device_id";
            if ($m_sensor_main[$column_name] > 0) {
                // check mesurement and append
                $device_id = $m_sensor_main[$column_name];
                $result[$device_id] = self::getRealtimeChartByDeviceId($device_id);
            }
        // }

        return $result;

    }

    public static function getRealtimeChartByDeviceId($device_id) {
        $captured_at = date("Y-m-d H:i:s", strtotime("-5 day"));
        $limit = self::REALTIME_CHART_LIMIT;
        $sql = <<< EOF
SELECT DATE_FORMAT(captured_at, '%Y/%m/%d %H:%i') as captured_date, value
FROM l_measurements_history
WHERE device_id = $device_id AND captured_at > '$captured_at'
ORDER BY captured_date DESC
LIMIT $limit;
EOF;
        $l_measurements_histories = \DB::query($sql)
                                        ->execute()
                                        ->as_array();
        // value change and cast
        foreach ($l_measurements_histories as $key => $l_measurements_history) {
            $capture_timestamp = strtotime($l_measurements_history['captured_date']);
            $l_measurements_histories[$key]['major_label'] = (int)date("d", $capture_timestamp);
            $l_measurements_histories[$key]['middle_label'] = (int)date("H", $capture_timestamp);
            $l_measurements_histories[$key]['minor_label'] = (int)date("i", $capture_timestamp);
            $l_measurements_histories[$key]['value'] = (int)$l_measurements_history['value'];
            $l_measurements_histories[$key]['timestamp'] = $capture_timestamp;
        }

        return $l_measurements_histories;

    }

}