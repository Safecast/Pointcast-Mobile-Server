<?php
class Model_M_Sensor_Information extends \Orm\Model
{
    protected static $_table_name = 'm_sensor_information';
    protected static $_properties = array(
		'm_sensor_information_id' => array(
			'data_type' => 'int',
			'label' => 'M sensor information id',
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
		'name' => array(
			'data_type' => 'varchar',
			'label' => 'Name',
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
		'conversion_rate' => array(
			'data_type' => 'int',
			'label' => 'Conversion rate',
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
}