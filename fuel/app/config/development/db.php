<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
    'default' => array(
        'connection'  => array(
            'dsn'        => 'mysql:host=localhost;dbname=pointcast_production',
            'username'   => 'root',
            'password'   => '',
        ),
    ),

    'create_orm_model' => array(
        'type'           => 'mysqli',
        'connection'     => array(
                'hostname'       => '127.0.0.1',
                'port'           => '3306',
                'database'       => 'pointcast',
                'username'       => 'root',
                'password'       => '',
                'persistent'     => false,
                'compress'       => false,
                // 'socket' => '/var/run/mysqld/mysqld.sock',
                // 'socket' => '/tmp/mysql.sock',
                                
        ),
        'identifier'     => '`',
        'table_prefix'   => '',
        'charset'        => 'utf8',
        'enable_cache'   => true,
        'profiling'      => false,
        'readonly'       => false,
    ),
);
