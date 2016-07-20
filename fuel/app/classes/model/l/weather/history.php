<?php
class Model_L_Weather_History extends \Orm\Model
{
    static $_primary_key = array('l_weather_history_id');

    protected static $_table_name = 'l_weather_history';
    protected static $_properties = array(
        'l_weather_history_id' => array(
            'data_type' => 'int',
            'label' => 'L weather history id',
            'null' => false,
            'validation' => array(
                0 => 'required',
                'numeric_min' => array(
                    0 => 0,
                ),
                'numeric_max' => array(
                    0 => 4294967295,
                ),
            ),
            'form' => array(
                'type' => 'number',
                'min' => 0,
                'max' => 4294967295,
            ),
        ),
        'sensor1_device_id' => array(
            'data_type' => 'int',
            'label' => 'sensor1 device id',
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
        'coord_lon' => array(
            'data_type' => 'float',
            'label' => 'Coord lon',
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
        'coord_lat' => array(
            'data_type' => 'float',
            'label' => 'Coord lat',
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
        'weather_id' => array(
            'data_type' => 'int',
            'label' => 'Weather id',
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
        'weather_main' => array(
            'data_type' => 'varchar',
            'label' => 'Weather main',
            'null' => true,
            'validation' => array(
                'max_length' => array(
                    0 => 128,
                ),
            ),
            'form' => array(
                'type' => 'text',
                'maxlength' => 128,
            ),
        ),
        'weather_description' => array(
            'data_type' => 'varchar',
            'label' => 'Weather description',
            'null' => true,
            'validation' => array(
                'max_length' => array(
                    0 => 128,
                ),
            ),
            'form' => array(
                'type' => 'text',
                'maxlength' => 128,
            ),
        ),
        'icon' => array(
            'data_type' => 'varchar',
            'label' => 'Icon',
            'null' => true,
            'validation' => array(
                'max_length' => array(
                    0 => 128,
                ),
            ),
            'form' => array(
                'type' => 'text',
                'maxlength' => 128,
            ),
        ),
        'base' => array(
            'data_type' => 'varchar',
            'label' => 'Base',
            'null' => true,
            'validation' => array(
                'max_length' => array(
                    0 => 128,
                ),
            ),
            'form' => array(
                'type' => 'text',
                'maxlength' => 128,
            ),
        ),
        'main_temp' => array(
            'data_type' => 'float',
            'label' => 'Main temp',
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
        'main_pressure' => array(
            'data_type' => 'int',
            'label' => 'Main pressure',
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
        'main_humidity' => array(
            'data_type' => 'int',
            'label' => 'Main humidity',
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
        'temp_min' => array(
            'data_type' => 'float',
            'label' => 'Temp min',
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
        'temp_max' => array(
            'data_type' => 'float',
            'label' => 'Temp max',
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
        'visibility' => array(
            'data_type' => 'int',
            'label' => 'Visibility',
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
        'wind_speed' => array(
            'data_type' => 'float',
            'label' => 'Wind speed',
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
        'wind_deg' => array(
            'data_type' => 'int',
            'label' => 'Wind deg',
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
        'clouds_all' => array(
            'data_type' => 'int',
            'label' => 'Clouds all',
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
        'dt' => array(
            'data_type' => 'bigint',
            'label' => 'Dt',
            'null' => true,
            'validation' => array(
                'numeric_min' => array(
                    0 => -9223372036854775808,
                ),
                'numeric_max' => array(
                    0 => 99999999999,
                ),
            ),
            'form' => array(
                'type' => 'number',
                'min' => -9223372036854775808,
                'max' => 99999999999,
            ),
        ),
        'sys_type' => array(
            'data_type' => 'int',
            'label' => 'Sys type',
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
        'sys_id' => array(
            'data_type' => 'bigint',
            'label' => 'Sys id',
            'null' => true,
            'validation' => array(
                'numeric_min' => array(
                    0 => -9223372036854775808,
                ),
                'numeric_max' => array(
                    0 => 99999999999,
                ),
            ),
            'form' => array(
                'type' => 'number',
                'min' => -9223372036854775808,
                'max' => 99999999999,
            ),
        ),
        'sys_message' => array(
            'data_type' => 'float',
            'label' => 'Sys message',
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
        'sys_country' => array(
            'data_type' => 'varchar',
            'label' => 'Sys country',
            'null' => true,
            'validation' => array(
                'max_length' => array(
                    0 => 128,
                ),
            ),
            'form' => array(
                'type' => 'text',
                'maxlength' => 128,
            ),
        ),
        'sys_sunrise' => array(
            'data_type' => 'bigint',
            'label' => 'Sys sunrise',
            'null' => true,
            'validation' => array(
                'numeric_min' => array(
                    0 => -9223372036854775808,
                ),
                'numeric_max' => array(
                    0 => 99999999999,
                ),
            ),
            'form' => array(
                'type' => 'number',
                'min' => -9223372036854775808,
                'max' => 99999999999,
            ),
        ),
        'sys_sunset' => array(
            'data_type' => 'bigint',
            'label' => 'Sys sunset',
            'null' => true,
            'validation' => array(
                'numeric_min' => array(
                    0 => -9223372036854775808,
                ),
                'numeric_max' => array(
                    0 => 99999999999,
                ),
            ),
            'form' => array(
                'type' => 'number',
                'min' => -9223372036854775808,
                'max' => 99999999999,
            ),
        ),
        'original_id' => array(
            'data_type' => 'bigint',
            'label' => 'Original id',
            'null' => true,
            'validation' => array(
                'numeric_min' => array(
                    0 => -9223372036854775808,
                ),
                'numeric_max' => array(
                    0 => 99999999999,
                ),
            ),
            'form' => array(
                'type' => 'number',
                'min' => -9223372036854775808,
                'max' => 99999999999,
            ),
        ),
        'name' => array(
            'data_type' => 'varchar',
            'label' => 'Name',
            'null' => true,
            'validation' => array(
                'max_length' => array(
                    0 => 128,
                ),
            ),
            'form' => array(
                'type' => 'text',
                'maxlength' => 128,
            ),
        ),
        'cod' => array(
            'data_type' => 'int',
            'label' => 'Cod',
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
            'mysql_timestamp' => true,
            'property' => 'created_at',
        ),        'Orm\Observer_UpdatedAt' => array(
            'events' => array('before_save'),
            'mysql_timestamp' => true,
            'property' => 'updated_at',
        ),    );
}