<?php
namespace Model;

class Chart extends \Model {

    const REALTIME_CHART_LIMIT = 576; // 2days


    public static function getRealtimeChart($m_sensor_main_id, $start_time, $end_time) {

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
                $result['sensors'][$device_id] = self::getRealtimeChartByDeviceId($device_id, $start_time, $end_time);
                $result['weather'][$device_id] = self::getRealtimeWeatherByDeviceId($device_id, $start_time, $end_time);
            }
        // }

        return $result;

    }

    public static function getRealtimeChartByDeviceId($device_id, $start_time, $end_time) {
        $start_date = date("Y-m-d H:i:s", $start_time);
        $end_date = date("Y-m-d H:i:s", $end_time);
        $limit = self::REALTIME_CHART_LIMIT;
        $sql = <<< EOF
SELECT DATE_FORMAT(captured_at, '%Y/%m/%d %H:%i') as captured_date, value
FROM l_measurements_history
WHERE device_id = $device_id AND captured_at > '$start_date' AND captured_at <= '$end_date'
ORDER BY captured_date DESC
LIMIT $limit;
EOF;

\Log::error($sql);
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

    public static function getRealtimeWeatherByDeviceId($device_id, $start_time, $end_time) {
        $start_date = date("Y-m-d H:i:s", $start_time);
        $end_date = date("Y-m-d H:i:s", $end_time);
        $limit = self::REALTIME_CHART_LIMIT;
        $sql = <<< EOF
SELECT dt, weather_main, icon
FROM l_weather_history
WHERE sensor1_device_id = $device_id AND dt > '$start_date' AND dt <= '$end_date'
ORDER BY dt DESC
LIMIT $limit;
EOF;
        $l_weather_histories = \DB::query($sql)
                                        ->execute()
                                        ->as_array();
\Log::error($sql);
        // value change and cast
        foreach ($l_weather_histories as $key => $l_weather_history) {
            $l_weather_histories[$key]['weather_main'] = $l_weather_history['weather_main'];
            $l_weather_histories[$key]['icon'] = $l_weather_history['icon'];
            $l_weather_histories[$key]['timestamp'] = (int)$l_weather_history['dt'];
        }

        return $l_weather_histories;

    }

}
