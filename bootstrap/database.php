<?php

require "migrations/UserMigration.php";
require "migrations/ForgotPasswordMigration.php";
require "migrations/VerifyEmailMigration.php";
require "migrations/TimeLineMigration.php";
require "migrations/TimelineMemberMigration.php";
require "migrations/ChatMessageMigration.php";
require "migrations/EventMigration.php";
require "migrations/LikeMigration.php";

use Migration\ChatMessageMigration;
use Migration\EventMigration;
use Migration\LikeMigration;
use Migration\TimelineMemberMigration;
use Migration\UserMigration;
use Migration\ForgotPasswordMigration;
use Migration\VerifyEmailMigration;
use Migration\TimeLineMigration;

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
TimeLineMigration::create();
TimelineMemberMigration::create();
ChatMessageMigration::create();
EventMigration::create();
LikeMigration::create();
