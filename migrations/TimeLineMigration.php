<?php

namespace Migration;

class TimeLineMigration
{
    public static function create()
    {
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `timelines`(
                `id` int(10) NOT NULL auto_increment,
                `user_id` int(10) NOT NULL,
                `title` varchar(250) NOT NULL,
                `description` varchar(4000),
                `avatar` varchar(250),
                `privilege_level` ENUM('private','tmp') NOT NULL DEFAULT 'private',
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,     
                PRIMARY KEY (`id`),
                FOREIGN KEY (`user_id`) REFERENCES users(`id`) 
            );
        ");
    }
}
