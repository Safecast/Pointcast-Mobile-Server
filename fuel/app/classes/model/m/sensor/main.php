<?php

class Model_M_Sensor_Main extends \Orm\Model
{

	protected static $_table_name = 'm_sensor_main';
        
        static $_primary_key = array('m_sensor_main_id');

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
		'm_sensor_information_id' => array(
			'data_type' => 'int',
			'label' => 'M sensor information id',
			'null' => false,
			'validation' => array(
				0 => 'required',
			),
			'form' => array(
				'type' => 'number',
			),
		),
		'latitude' => array(
			'data_type' => 'float',
			'label' => 'Latitude',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -9999999.9989999998,
				),
				'numeric_max' => array(
					0 => 9999999.9989999998,
				),
			),
			'form' => array(
				'type' => 'number',
				'step' => 0.999,
				'min' => -9999999.9989999998,
				'max' => 9999999.9989999998,
			),
		),
		'longitude' => array(
			'data_type' => 'float',
			'label' => 'Longitude',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -9999999.9989999998,
				),
				'numeric_max' => array(
					0 => 9999999.9989999998,
				),
			),
			'form' => array(
				'type' => 'number',
				'step' => 0.999,
				'min' => -9999999.9989999998,
				'max' => 9999999.9989999998,
			),
		),
		'sensor_status' => array(
			'data_type' => 'tinyint',
			'label' => 'Sensor status',
			'null' => true,
			'validation' => array(
			),
			'form' => array(
				'type' => 'number',
			),
		),
		'dre2cpm' => array(
			'data_type' => 'float',
			'label' => 'Dre2cpm',
			'null' => true,
			'validation' => array(
				'numeric_min' => array(
					0 => -9999.9899999999998,
				),
				'numeric_max' => array(
					0 => 9999.9899999999998,
				),
			),
			'form' => array(
				'type' => 'number',
				'step' => 0.98999999999999999,
				'min' => -9999.9899999999998,
				'max' => 9999.9899999999998,
			),
		),
		'alarm' => array(
			'data_type' => 'int',
			'label' => 'Alarm',
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
			'label' => 'View order',
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
        ),
		'Orm\Observer_CreatedAt' => array(
	        'events' => array('before_insert'),
	        'mysql_timestamp' => true,
	        'property' => 'created_at',
	    ),
		'Orm\Observer_UpdatedAt' => array(
	        'events' => array('before_save'),
	        'mysql_timestamp' => true,
	        'property' => 'updated_at',
	    ),
	);

}