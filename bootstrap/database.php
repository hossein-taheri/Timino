<?php

require "migrations/UserMigration.php";
require "migrations/ForgotPasswordMigration.php";
require "migrations/VerifyEmailMigration.php";
require "migrations/TimeLineMigration.php";
require "migrations/TimelineMemberMigration.php";
require "migrations/ChatMessageMigration.php";
require "migrations/EventMigration.php";
require "migrations/LikeMigration.php";
require "migrations/EventMessageMigration.php";
require "migrations/CommentMigration.php";
require "migrations/CategoryMigration.php";
require "migrations/EventCategoryMigration.php";

use Migration\CategoryMigration;
use Migration\ChatMessageMigration;
use Migration\CommentMigration;
use Migration\EventCategoryMigration;
use Migration\EventMessageMigration;
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
EventMessageMigration::create();
LikeMigration::create();
CommentMigration::create();
CategoryMigration::create();
EventCategoryMigration::create();
