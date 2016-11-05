<?php

namespace Fuel\Tasks;

class Crawler
{
    
    public function run()
    {
        ini_set('memory_limit', '1024M');

        $m_sensor_mains = \Model_M_Sensor_Main::query()->get();
        $captured_before = date("Y-m-d", strtotime("+1 day"));
        $captured_after = date("Y-m-d", strtotime("-1 day"));
        foreach ($m_sensor_mains as $key => $m_sensor_main) {
            $this->executeCrawl($m_sensor_main->sensor1_device_id, $captured_before, $captured_after);
        }
        return;
    }

    public function executeCrawl($device_id, $captured_before, $captured_after)
    {
        // APIにレコード問い合わせ
        $page = 1;
        do {
            $mesurements_data = $this->getMesurementsData($device_id, $captured_before, $captured_after, $page);
            // register record
            foreach ($mesurements_data as $key => $record) {
                \Model\Sensors::registerRecord($record);
            }
            $page++;
        } while(!empty($mesurements_data));
    }

    public function getMesurementsData($device_id, $captured_before, $captured_after, $page = 1)
    {

        $conn = curl_init();
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);

        // https://api.safecast.org/en-US/devices/100/measurements.json?order=captured_at+desc&captured_after=2015-09-08+00%3A00&captured_before=2015-09-09+00%3A00
        $end_point = "http://api.safecast.org/en-US/devices";
        $url  = $end_point . "/${device_id}/measurements.json?";
        $url .= "captured_at+desc&captured_before=${captured_before}+00%3A00&";
        $url .= "captured_after=${captured_after}+00%3A00&";
        $url .= "page={$page}";

        curl_setopt($conn, CURLOPT_URL, $url);
        $response = curl_exec($conn);
         
        curl_close($conn);

        // decode json
        $mesurements = json_decode($response);

        return $mesurements;
    }

}