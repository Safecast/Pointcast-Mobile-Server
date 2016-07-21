<?php
/**
 * The production database settings. These get merged with the global settings.
 */

return array(
    'default' => array(
        'connection'  => array(
            'dsn'        => 'mysql:host=localhost;dbname=pointcast_production',
            'username'   => 'root',
            'password'   => '',
        ),
    ),
);
