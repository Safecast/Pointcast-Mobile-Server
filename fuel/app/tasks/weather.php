<?php

namespace Fuel\Tasks;

class Weather
{
    const APP_ID = "8b3edc2093c9ac8938cb4883836457f1";

    public function run()
    {
       $this->getCurrentWeather(100);
    }

    public function getCurrentWeather($device_id)
    {

        // get device information
        $m_sensor_main = \Model_M_Sensor_Main::query()
                            ->where("sensor1_device_id", $device_id)
                            ->get_one();

        if (empty($m_sensor_main) || empty($m_sensor_main->latitude) || empty($m_sensor_main->longitude) ) {
            echo "No sensor information.";
            return ;
        }

        $conn = curl_init();
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);

        // "http://api.openweathermap.org/data/2.5/weather?lcfirst(str)at=35&lon=139&appid=2de143494c0b295cca9337e1e96b00e0s";
        $end_point = "http://api.openweathermap.org/data/2.5/weather?";
        $url  = $end_point . "lat=" . $m_sensor_main->latitude . "&lon=" . $m_sensor_main->longitude . "&appid=" . self::APP_ID ;
var_dump($url);
        curl_setopt($conn, CURLOPT_URL, $url);
        $response = curl_exec($conn);
        curl_close($conn);

        // decode json
        $current_weather = json_decode($response);
var_dump($current_weather);

        return $current_weather;





        $url = "http://api.openweathermap.org/data/2.5/weather?lcfirst(str)at=35&lon=139&appid=2de143494c0b295cca9337e1e96b00e0s";


    }
    
}