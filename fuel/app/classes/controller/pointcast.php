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
		$m_sensor_mains = DB::select()->from('m_sensor_main')->execute()->as_array();
		
		// convert to device id list
		$device_ids = \Model_M_Sensor_Main::getDeviceIdList($m_sensor_mains);
		
		// get average data
		$averages = \Model\Sensors::getAverageSummary($device_ids);

        // get peaks data
        $peaks = \Model\Sensors::getPeakSummary($device_ids);
        
        // attach summary value
        \Model\Sensors::attachMeasurements($m_sensor_mains, $averages, $peaks);

        $this->response(array(
            'topic' => array(),
            'sensors' => $m_sensor_mains,
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
