<?php

namespace Migration;

class EventMigration
{
    public static function create()
    {
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `events`(
                `id` int(10) NOT NULL auto_increment,
                `timeline_id` int(10) NOT NULL,
                `user_id` int(10) NOT NULL,
                `title` varchar(500) NOT NULL,
                `description` varchar(4000),
                `short_description` varchar(100),
                `coordinate` POINT,
                `likes_count` int(10) NOT NULL DEFAULT 0,
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`),
                FOREIGN KEY (`timeline_id`) REFERENCES timelines(`id`),
                FOREIGN KEY (`user_id`) REFERENCES users(`id`) 
            );
        ");
    }
}
