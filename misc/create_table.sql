
// 2015-10-30 main measurement table
CREATE TABLE `l_measurements_history` (
  `l_measurements_history_id` bigint(20) NOT NULL AUTO_INCREMENT,
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
