<?php

require "migrations/UserMigration.php";
use Migration\UserMigration;

class Connection
{
    public static function make($db)
    {
        try {
            $pdo = new PDO(
                "{$db['connection']};",
                $db['username'],
                $db['password']
            );
            $pdo->query("CREATE DATABASE IF NOT EXISTS ".$db['dbname']);
            $pdo->query("use ".$db['dbname']);
            return $pdo;
        } catch (PDOException $e) {
            die("Couldn't connect to DB::".$e->getMessage());
        }
    }
}


$app['pdo'] = Connection::make($app['config']['database']);


UserMigration::create($app['pdo']);

