<?php

namespace Fuel\Tasks;

class Cacher
{
	const FQDN = "http://pointcast-mobile-app.safecast.org";
    
    public function run()
    {
    	// self::requestHome();
    	self::execAnalytics();
    }

    public static function requestHome()
    {
		$POST_DATA = array(
		    'foo' => 'bar'
		);
		$curl=curl_init(Cacher::FQDN . "/pointcast/home.json");
		curl_setopt($curl,CURLOPT_POST, TRUE);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($POST_DATA));
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);  // オレオレ証明書対策
		curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);  // 
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl,CURLOPT_COOKIEJAR,      'cookie');
		curl_setopt($curl,CURLOPT_COOKIEFILE,     'tmp');
		curl_setopt($curl,CURLOPT_FOLLOWLOCATION, TRUE); // Locationヘッダを追跡

		$html = curl_exec($curl);
		curl_close($curl);

		print_r($html);
	}

	public static function execAnalytics()
	{

		$m_sensor_mains = \DB::select("m_sensor_main.*", "m_sensor_information.name", "m_sensor_information.conversion_rate")
                    ->from('m_sensor_main')
                    ->join('m_sensor_information', 'left')
                    ->on('m_sensor_main.m_sensor_information_id', '=', 'm_sensor_information.m_sensor_information_id')
                    ->order_by('m_sensor_main.view_order', 'ASC')
                    ->execute()->as_array();

        $start_time = strtotime(date("Y-m-d 00:00:00", time() - 86400));
        $end_time = strtotime(date("Y-m-d 00:00:00", time()));
        foreach ($m_sensor_mains as $key => $m_sensor_main) {
        	self::requestAnalytics($m_sensor_main['sensor1_device_id'], $start_time, $end_time);
        }
	}

	public static function requestAnalytics($m_sensor_main_id, $start_time, $end_time)
    {
		$POST_DATA = array(
		    'start_time' => $start_time,
		    'end_time' => $end_time,
		);
		$curl=curl_init(Cacher::FQDN . "/pointcast/analytics/${m_sensor_main_id}.json");
		curl_setopt($curl,CURLOPT_POST, TRUE);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($POST_DATA));
		curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);  // オレオレ証明書対策
		curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);  // 
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl,CURLOPT_COOKIEJAR,      'cookie');
		curl_setopt($curl,CURLOPT_COOKIEFILE,     'tmp');
		curl_setopt($curl,CURLOPT_FOLLOWLOCATION, TRUE); // Locationヘッダを追跡

		$html = curl_exec($curl);
		curl_close($curl);

		print_r($html);
	}
}