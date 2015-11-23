<?php
class Model_M_Sensor_Main extends \Orm\Model
{
	static $_primary_key = array('m_sensor_main_id');

    protected static $_table_name = 'm_sensor_main';
    protected static $_properties = array(
		'm_sensor_main_id' => array(
			'data_type' => 'int',
			'label' => 'M sensor main id',
			'null' => false,
			'validation' => array(
				0 => 'required',
				'numeric_min' => array(
					0 => -2147483648,
				),
				'numeric_max' => array(
					0 => 2147483647,
				),
			),
			'form' => array(
				'type' => 'number',
				'min' => -2147483648,
				'max' => 2147483647,
			),
		),
		'name_en' => array(
			'data_type' => 'varchar',
			'label' => 'Name en',
			'null' => true,
			'validation' => array(
				'max_length' => array(
					0 => 255,
				),
			),
			'form' => array(
				'type' => 'text',
				'maxlength' => 255,
			),
		),
		'name_jp' => array(
			'data_type' => 'varchar',
			'label' => 'Name jp',
			'null' => true,
			'validation' => array(
				'max_length' => array(
					0 => 255,
				),
			),
			'form' => array(
				'type' => 'text',
				'maxlength' => 255,
			),
		),
		'latitude' => array(
			'data_type' => 'float',
			'label' => 'latitude',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -99999.999989999997,
				),
				'numeric_max' => array(
					0 => 99999.999989999997,
				),
			),
			'form' => array(
				'type' => 'number',
				'step' => 0.99999000000000005,
				'min' => -99999.999989999997,
				'max' => 99999.999989999997,
			),
		),
		'longitude' => array(
			'data_type' => 'float',
			'label' => 'longtitude',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -99999.999989999997,
				),
				'numeric_max' => array(
					0 => 99999.999989999997,
				),
			),
			'form' => array(
				'type' => 'number',
				'step' => 0.99999000000000005,
				'min' => -99999.999989999997,
				'max' => 99999.999989999997,
			),
		),
		'sensor1_device_id' => array(
			'data_type' => 'int',
			'label' => 'Sensor1 device id',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -2147483648,
				),
				'numeric_max' => array(
					0 => 2147483647,
				),
			),
			'form' => array(
				'type' => 'number',
				'min' => -2147483648,
				'max' => 2147483647,
			),
		),
		'sensor2_device_id' => array(
			'data_type' => 'int',
			'label' => 'Sensor2 device id',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -2147483648,
				),
				'numeric_max' => array(
					0 => 2147483647,
				),
			),
			'form' => array(
				'type' => 'number',
				'min' => -2147483648,
				'max' => 2147483647,
			),
		),
		'sensor3_device_id' => array(
			'data_type' => 'int',
			'label' => 'Sensor3 device id',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -2147483648,
				),
				'numeric_max' => array(
					0 => 2147483647,
				),
			),
			'form' => array(
				'type' => 'number',
				'min' => -2147483648,
				'max' => 2147483647,
			),
		),
		'sensor4_device_id' => array(
			'data_type' => 'int',
			'label' => 'Sensor4 device id',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -2147483648,
				),
				'numeric_max' => array(
					0 => 2147483647,
				),
			),
			'form' => array(
				'type' => 'number',
				'min' => -2147483648,
				'max' => 2147483647,
			),
		),
		'sensor5_device_id' => array(
			'data_type' => 'int',
			'label' => 'Sensor5 device id',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -2147483648,
				),
				'numeric_max' => array(
					0 => 2147483647,
				),
			),
			'form' => array(
				'type' => 'number',
				'min' => -2147483648,
				'max' => 2147483647,
			),
		),
		'sensor6_device_id' => array(
			'data_type' => 'int',
			'label' => 'Sensor6 device id',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -2147483648,
				),
				'numeric_max' => array(
					0 => 2147483647,
				),
			),
			'form' => array(
				'type' => 'number',
				'min' => -2147483648,
				'max' => 2147483647,
			),
		),
		'sensor7_device_id' => array(
			'data_type' => 'int',
			'label' => 'Sensor7 device id',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -2147483648,
				),
				'numeric_max' => array(
					0 => 2147483647,
				),
			),
			'form' => array(
				'type' => 'number',
				'min' => -2147483648,
				'max' => 2147483647,
			),
		),
		'sensor8_device_id' => array(
			'data_type' => 'int',
			'label' => 'Sensor8 device id',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -2147483648,
				),
				'numeric_max' => array(
					0 => 2147483647,
				),
			),
			'form' => array(
				'type' => 'number',
				'min' => -2147483648,
				'max' => 2147483647,
			),
		),
		'sensor9_device_id' => array(
			'data_type' => 'int',
			'label' => 'Sensor9 device id',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -2147483648,
				),
				'numeric_max' => array(
					0 => 2147483647,
				),
			),
			'form' => array(
				'type' => 'number',
				'min' => -2147483648,
				'max' => 2147483647,
			),
		),
		'view_order' => array(
			'data_type' => 'int',
			'label' => 'view order',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -2147483648,
				),
				'numeric_max' => array(
					0 => 2147483647,
				),
			),
			'form' => array(
				'type' => 'number',
				'min' => -2147483648,
				'max' => 2147483647,
			),
		),
		'enable' => array(
			'data_type' => 'int',
			'label' => 'enable',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -2147483648,
				),
				'numeric_max' => array(
					0 => 2147483647,
				),
			),
			'form' => array(
				'type' => 'number',
				'min' => -2147483648,
				'max' => 2147483647,
			),
		),
		'updated_at' => array(
			'data_type' => 'string',
			'label' => 'Updated at',
			'null' => true,
			'validation' => array(
			),
			'form' => array(
				'type' => false,
			),
		),
		'created_at' => array(
			'data_type' => 'string',
			'label' => 'Created at',
			'null' => true,
			'validation' => array(
			),
			'form' => array(
				'type' => false,
			),
		),
	);
    protected static $_observers = array(
        'Orm\Observer_Validation' => array(
            'events' => array('before_save'),
        ),
        'Orm\Observer_Typing' => array(
            'events' => array('before_save', 'after_save', 'after_load'),
        ),        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
            'property' => 'created_at',
        ),        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => false,
            'property' => 'updated_at',
        ),    );

    public static function getDeviceIdList($m_sensor_mains) {

    	// get all device_id
    	$device_id = array();
    	foreach($m_sensor_mains as $key => $m_sensor_main) {
    		/*
    		for ($i = 1; $i <= 9; $i++) {
    			$column_name = "sensor${i}_device_id";
    			if (isset($m_sensor_main[$column_name]) && $m_sensor_main[$column_name] > 0) {
    				$device_id[] = $m_sensor_main[$column_name];
    			}
    		}
    		*/
    		// fixed sensor 1
    		$column_name = "sensor1_device_id";
			if (isset($m_sensor_main[$column_name]) && $m_sensor_main[$column_name] > 0) {
				$device_id[] = $m_sensor_main[$column_name];
			}
    	}
    	return $device_id;
    }
}