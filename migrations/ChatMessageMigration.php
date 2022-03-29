<?php

namespace Migration;

class ChatMessageMigration
{
    public static function create()
    {
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `timeline`(
                `id` int(10) NOT NULL auto_increment,
                `timeline_id` int(10) NOT NULL,
                `user_id` int(10) NOT NULL,
                `message` varchar(500) NOT NULL,
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,     
                FOREIGN KEY (`timeline_id`) REFERENCES timelines(`id`),
                FOREIGN KEY (`user_id`) REFERENCES users(`id`) 
            );
        ");
    }
}
