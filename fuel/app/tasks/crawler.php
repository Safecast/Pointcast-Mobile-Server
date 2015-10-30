<?php

namespace Fuel\Tasks;

class Crawler
{
    
    public function run($device_id = null, $captured_before = null, $captured_after = null)
    {
        if (empty($device_id) || empty($captured_before) || empty($captured_after)) {
            \Cli::error('The argument is not enough. EX) php oil r 100101 2015-09-09 2015-09-08');
            return;
        }

        $this->executeCrawl($captured_before, $captured_after);
        return;
    }

    public function executeCrawl($captured_before, $captured_after) {
        // APIにレコード問い合わせ
        $mesurements_data = $this->getMesurementsData($captured_before, $captured_after);

        // 分解
var_dump($mesurements_data);

    }

    public function getMesurementsData($captured_before, $captured_after) {

        $conn = curl_init();
        // curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);

        // https://api.safecast.org/measurements.json?captured_after=2012-09-08+00%3A00&captured_before=2012-09-09+00%3A00
        $url = 'http://api.safecast.org/measurements.json?captured_after=2012-09-08+00%3A00&captured_before=2012-09-09+00%3A00';
         
        curl_setopt($conn, CURLOPT_URL, $url);
        $response = curl_exec($conn);
         
        curl_close($conn);

        // decode json
        $mesurements = json_decode($response);

        return $mesurements;
    }

}