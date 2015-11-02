# 2015-11-02 sensors master
CREATE TABLE `m_sensor_main` (
  `m_sensor_main_id` integer,
  `name_en` varchar(255),
  `name_jp` varchar(255),
  `sensor1_device_id` integer DEFAULT 0,
  `sensor2_device_id` integer DEFAULT 0,
  `sensor3_device_id` integer DEFAULT 0,
  `sensor4_device_id` integer DEFAULT 0,
  `sensor5_device_id` integer DEFAULT 0,
  `sensor6_device_id` integer DEFAULT 0,
  `sensor7_device_id` integer DEFAULT 0,
  `sensor8_device_id` integer DEFAULT 0,
  `sensor9_device_id` integer DEFAULT 0,
  `updated_at` datetime,
  `created_at` datetime,
  PRIMARY KEY (`m_sensor_main_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# 2015-10-30 main measurement table
CREATE TABLE `l_measurements_history` (
  `l_measurements_history_id` bigint(20) AUTO_INCREMENT,
  `captured_at` datetime,
  `channel_id` integer,
  `device_id` integer,
  `devicetype_id` varchar(128),
  `height` integer,
  `id` bigint(20) NOT NULL,
  `location_name` varchar(128),
  `original_id` bigint(20) ,
  `sensor_id` integer,
  `station_id` integer,
  `unit` varchar(128),
  `user_id` integer,
  `value` integer,
  `latitude` FLOAT(14,11),
  `longitude` FLOAT(14,11),
  `updated_at` datetime,
  `created_at` datetime,
  PRIMARY KEY (`l_measurements_history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



