<?php

require "migrations/UserMigration.php";
require "migrations/ForgotPasswordMigration.php";
require "migrations/VerifyEmailMigration.php";
use Migration\UserMigration;
use Migration\ForgotPasswordMigration;
use Migration\VerifyEmailMigration;

try {
    $db = $GLOBALS['config']['database'];
    $pdo = new PDO(
        "{$db['connection']};",
        $db['username'],
        $db['password']
    );
    $pdo->query("CREATE DATABASE IF NOT EXISTS " . $db['dbname']);
    $pdo->query("use " . $db['dbname']);
    $GLOBALS['pdo'] = $pdo;
} catch (PDOException $e) {
    die("Couldn't connect to DB::" . $e->getMessage());
}


UserMigration::create();
ForgotPasswordMigration::create();
VerifyEmailMigration::create();
