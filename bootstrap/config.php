<?php

$app['config'] =  [
    'database' => [
        'connection' => $_ENV['DB_CONNECTION'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'dbname' => $_ENV['DB_DBNAME'],
    ],
];
