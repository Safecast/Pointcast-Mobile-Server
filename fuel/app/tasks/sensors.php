<?php

namespace Fuel\Tasks;

class Sensors
{
    
    public function run()
    {
        ini_set('memory_limit', '1024M');

        // Update Sensor List.
        $this->updateSensorList();
        return;
    }

    public function updateSensorList() {

        $url = "http://realtime.safecast.org/wp-content/uploads/devices.json";
        $conn = curl_init();
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($conn, CURLOPT_URL, $url);
        $response = curl_exec($conn);
        curl_close($conn);

        // decode json
        $sensor_list = json_decode($response);

        foreach ($sensor_list as $key => $sensor) {
            $m_sensor_main = \Model_M_Sensor_Main::query()
                                ->where("sensor1_device_id","=",$sensor->id)
                                ->get_one();
        
            if (empty($m_sensor_main)) {
                // nothing sensor master data
                var_dump($sensor);
                $m_sensor_information_id = $this->getMSensorInformationId($sensor);
                $m_sensor_main = \Model_M_Sensor_Main::forge();
                $m_sensor_main->m_sensor_main_id = $sensor->id;
                $m_sensor_main->name_en = $sensor->location;
                $m_sensor_main->name_jp = $sensor->location;
                $m_sensor_main->m_sensor_information_id = $m_sensor_information_id;
                $m_sensor_main->latitude = $sensor->lat;
                $m_sensor_main->longitude = $sensor->lon;
                $m_sensor_main->sensor1_device_id = $sensor->id;
                $m_sensor_main->view_order = $sensor->id;
                $m_sensor_main->enable = 1;
                $m_sensor_main->updated_at = date("Y-m-d H:i:s");
                $m_sensor_main->created_at = date("Y-m-d H:i:s");
                $m_sensor_main->save();
            }
        }
    }

    public function getMSensorInformationId($sensor) {

        /*
        // $url = "http://api.safecast.org/devices/${device_id}.json";
        $url = "http://realtime.safecast.org/ja/sensor/${device_id}";
        $conn = curl_init();
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($conn, CURLOPT_URL, $url);
        $response = curl_exec($conn);
        curl_close($conn);

        // decode json
        $device = json_decode($response);
        var_dump($device);
// exit;
        */
        $sensor_name = "";
        if ($sensor->cpm > 0) {
            if ($sensor->cpm / $sensor->usvh > 300) {
                // 334
                $sensor_name = "LND7318";
            } else {
                // 120
                $sensor_name = "LND712";
            }
        } else {
            // 値がない場合は暫定
            $sensor_name = "LND7318";
        }

        $m_sensor_main = \Model_M_Sensor_Information::query()
            ->where("name", $sensor_name)
            ->get_one();

var_dump($m_sensor_main->name);

        return $m_sensor_main->m_sensor_information_id;
    }

}