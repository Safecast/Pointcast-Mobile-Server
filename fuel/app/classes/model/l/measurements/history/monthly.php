<?php
class Model_L_Measurements_History_Monthly extends \Orm\Model
{
    protected static $_table_name = 'l_measurements_history_monthly';
    protected static $_properties = array(
		'l_measurements_history_monthly_id' => array(
			'data_type' => 'bigint',
			'label' => 'L measurements history monthly id',
			'null' => false,
			'validation' => array(
				0 => 'required',
				'numeric_min' => array(
					0 => -9223372036854775808,
				),
				'numeric_max' => array(
					0 => 9223372036854775807,
				),
			),
			'form' => array(
				'type' => 'number',
				'min' => -9223372036854775808,
				'max' => 9223372036854775807,
			),
		),
		'captured_date' => array(
			'data_type' => 'string',
			'label' => 'Captured date',
			'null' => true,
			'validation' => array(
			),
			'form' => array(
				'type' => 'text',
			),
		),
		'device_id' => array(
			'data_type' => 'int',
			'label' => 'Device id',
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
		'average_value' => array(
			'data_type' => 'int',
			'label' => 'Average value',
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
		'peak_value' => array(
			'data_type' => 'int',
			'label' => 'Peak value',
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
}