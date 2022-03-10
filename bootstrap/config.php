<?php

$GLOBALS['config'] =  [
    'database' => [
        'connection' => $_ENV['DB_CONNECTION'] . $_ENV['DB_HOST'] ,
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'dbname' => $_ENV['DB_DBNAME'],
    ],
    'email' => [
        'host' => $_ENV['EMAIL_HOST'] ,
        'port' => $_ENV['EMAIL_PORT'],
        'username' => $_ENV['EMAIL_USERNAME'],
        'password' => $_ENV['EMAIL_PASSWORD'],
        'sender' => $_ENV['EMAIL_SENDER'],
    ],
];
