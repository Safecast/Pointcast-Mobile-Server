<?php

namespace Fuel\Tasks;

class Weather
{
    const APP_ID = "8b3edc2093c9ac8938cb4883836457f1";

    public function run()
    {
        $m_sensor_mains = \DB::select()
                ->from('m_sensor_main')
                ->order_by('view_order', 'ASC')
                ->execute()->as_array();
        foreach ($m_sensor_mains as $key => $m_sensor_main) {
            $this->getCurrentWeather($m_sensor_main['sensor1_device_id']);
        }
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
        if (isset($current_weather->cod) 
                && $current_weather->cod == "404") {
            // nothing data 
            continue;
        }
        $l_weather_history = \Model_L_Weather_History::query()
            ->where("original_id", $current_weather->id)
            ->where("sensor1_device_id", $device_id)
            ->where("dt", $current_weather->dt)
            ->get_one();
        
        if (empty($l_weather_history)) {
            $l_weather_history = \Model_L_Weather_History::forge();
        }
        $l_weather_history->sensor1_device_id = $device_id;
        $l_weather_history->coord_lon = $current_weather->coord->lon;
        $l_weather_history->coord_lat = $current_weather->coord->lat;
        $l_weather_history->weather_id = $current_weather->weather[0]->id;
        $l_weather_history->weather_main = $current_weather->weather[0]->main;
        $l_weather_history->weather_description = $current_weather->weather[0]->description;
        $l_weather_history->icon = $current_weather->weather[0]->icon;
        $l_weather_history->base = $current_weather->base;
        $l_weather_history->main_temp = $current_weather->main->temp;
        $l_weather_history->main_pressure = $current_weather->main->pressure;
        $l_weather_history->main_humidity = $current_weather->main->humidity;
        $l_weather_history->temp_min = $current_weather->main->temp_min;
        $l_weather_history->temp_max = $current_weather->main->temp_max;
        if (isset($current_weather->visibility)) {
            $l_weather_history->visibility = $current_weather->visibility;
        } else {
            $l_weather_history->visibility = 0;
        }
        $l_weather_history->wind_speed = $current_weather->wind->speed;
        if (isset($current_weather->wind->deg)){
            $l_weather_history->wind_deg = $current_weather->wind->deg;
        } else {
            $l_weather_history->wind_deg = 0;
        }
        
        $l_weather_history->clouds_all = $current_weather->clouds->all;
        $l_weather_history->dt = $current_weather->dt;
        if (isset($current_weather->sys->type)) {
            $l_weather_history->sys_type = $current_weather->sys->type;
        } else {
            $l_weather_history->sys_type = 0;
        }
        $l_weather_history->sys_id = $current_weather->id;
        $l_weather_history->sys_message = $current_weather->sys->message;
        $l_weather_history->sys_country = $current_weather->sys->country;
        $l_weather_history->sys_sunrise = $current_weather->sys->sunrise;
        $l_weather_history->sys_sunset = $current_weather->sys->sunset;
        $l_weather_history->original_id = $current_weather->id;
        $l_weather_history->name = $current_weather->name;
        $l_weather_history->cod = $current_weather->cod;
        $l_weather_history->save();

        return $current_weather;
    }
    
}