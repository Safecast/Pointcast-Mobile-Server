<?php

namespace Fuel\Tasks;

class Sensors
{

    const STATUS_ONLINE = 1;
    const STATUS_OFFLINE = 2;
    const STATUS_OFFLINE_LONG = 3;
    
    
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
                                ->where("sensor1_device_id", "=", $sensor->id)
                                ->get_one();

            var_dump($sensor->id);
            var_dump($m_sensor_main);

        // exit;
            if (empty($m_sensor_main)) {
                $m_sensor_main = \Model_M_Sensor_Main::forge();
                $m_sensor_main->m_sensor_main_id = $sensor->id;
                $m_sensor_main->sensor1_device_id = $sensor->id;
            }

            $sensor_status = $this->getSensorStatusCode($sensor);

            // nothing sensor master data
            $m_sensor_information_id = $this->getMSensorInformationId($sensor);
            $m_sensor_main->name_en = $sensor->location;
            $m_sensor_main->name_jp = $sensor->location;
            $m_sensor_main->m_sensor_information_id = $m_sensor_information_id;
            $m_sensor_main->latitude = $sensor->lat;
            $m_sensor_main->longitude = $sensor->lon;
            $m_sensor_main->view_order = $sensor->id;
            $m_sensor_main->sensor_status = $sensor_status;
            $m_sensor_main->dre2cpm = $sensor->DRE2CPM;
            $m_sensor_main->updated_at = date("Y-m-d H:i:s");
            $m_sensor_main->created_at = date("Y-m-d H:i:s");
            $m_sensor_main->save();
            // }
        }
    }

    public function getMSensorInformationId($sensor) {

        $sensor_name = "";
        if ($sensor->DRE2CPM > 0) {
            if ($sensor->DRE2CPM > 900) {
                // 960
                $sensor_name = "LND78017 ";
            } elseif ($sensor->DRE2CPM > 300) {
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

        return $m_sensor_main->m_sensor_information_id;
    }

    public function getSensorStatusCode($sensor) {

        var_dump($sensor->Status);
        switch($sensor->Status) {
            case "Online":
                return self::STATUS_ONLINE;
                break;
            case "Offline":
                return self::STATUS_OFFLINE;
                break;
            case "Offline long":
                return self::STATUS_OFFLINE_LONG;
                break;
            default:
                error_log($sensor->Status . ": undefined");
                return self::STATUS_OFFLINE_LONG;
                break;
        }

        // return $m_sensor_main->m_sensor_information_id;
    }

}