<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.7
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Pointcast extends Controller_Rest
{
	
	/**
	 * The basic welcome message
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		return Response::forge(View::forge('welcome/index'));
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a ViewModel to
	 * show how to use them.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_home()
	{
		// get sensors list
		$m_sensor_mains = DB::select("m_sensor_main.*", "m_sensor_information.name", "m_sensor_information.conversion_rate")
                ->from('m_sensor_main')
                ->join('m_sensor_information', 'left')
                ->on('m_sensor_main.m_sensor_information_id', '=', 'm_sensor_information.m_sensor_information_id')
                ->where('m_sensor_main.enable', 1)
                ->order_by('m_sensor_main.view_order', 'ASC')
                ->execute()->as_array();
        
        // convert int value
        \Model\Dbutil::recordCastInt($m_sensor_mains);
		
		// convert to device id list
		$device_ids = \Model_M_Sensor_Main::getDeviceIdList($m_sensor_mains);
		
		// get recent data
		$recents = \Model\Sensors::getRecentRecord($device_ids);

		// get aggregation data
		$aggregations = \Model\Sensors::getAggregation($device_ids);

        // get peaks data
        // $peaks = \Model\Sensors::getPeakSummary($device_ids);
        
        // attach summary value
        // \Model\Sensors::attachMeasurements($m_sensor_mains, $averages, $peaks);

        // attach recents aggregations data
        \Model\Sensors::attachAggregations($m_sensor_mains, $recents, $aggregations);

        $this->response(array(
            'topic' => array(),
            'sensors' => $m_sensor_mains,
        ));
    }

    public function action_analytics($m_sensor_main_id = 1) {

        // グラフ表示用の分析結果を表示する
        $chart = array();
        
        // realtime
        $chart_realtime = \Model\Chart::getRealtimeChart($m_sensor_main_id);

        $this->response(
            array('chart' => 
                array(
                    'realtime' => $chart_realtime,
                    'weekly' => array(),
                    'monthly' => array(),
                ),
        ));
    }

	/**
	 * The 404 action for the application.
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(ViewModel::forge('welcome/404'), 404);
	}

}
