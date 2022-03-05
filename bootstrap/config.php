<?php

$app['config'] =  [
    'database' => [
        'connection' => $_ENV['DB_CONNECTION'] . $_ENV['DB_HOST'] ,
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'dbname' => $_ENV['DB_DBNAME'],
    ],
];
