<?php

namespace Migration;

class CommentMigration
{
    public static function create()
    {
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `comments`(
                `id` int(10) NOT NULL auto_increment,
                `event_id` int(10) NOT NULL,
                `user_id` int(10) NOT NULL,
                `body` varchar(250),
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`),
                FOREIGN KEY (`event_id`) REFERENCES events(`id`),
                FOREIGN KEY (`user_id`) REFERENCES users(`id`) 
            );
        ");
    }
}
