<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=staging_pointcast;unix_socket=/tmp/mysql.sock',
			'username'   => 'pointcast',
			'password'   => 'pointcast',
		),
	),

    'create_orm_model' => array(
        'type'           => 'mysqli',
        'connection'     => array(
                'hostname'       => 'localhost',
                'port'           => '3306',
                'database'       => 'staging_pointcast',
                'username'       => 'pointcast',
                'password'       => 'pointcast',
                'persistent'     => false,
                'compress'       => false,
                // 'socket' => '/var/run/mysqld/mysqld.sock',
                'socket' => '/tmp/mysql.sock',
                                
        ),
        'identifier'     => '`',
        'table_prefix'   => '',
        'charset'        => 'utf8',
        'enable_cache'   => true,
        'profiling'      => false,
        'readonly'       => false,
    ),
);
