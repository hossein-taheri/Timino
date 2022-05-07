<?php

namespace Migration;

class ChatMessageMigration
{
    public static function create()
    {
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `chat_messages`(
                `id` int(10) NOT NULL auto_increment,
                `timeline_id` int(10) NOT NULL,
                `user_id` int(10) NOT NULL,
                `message` varchar(500) NOT NULL,
                `parent_id` int(10),
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`),
                FOREIGN KEY (`timeline_id`) REFERENCES timelines(`id`),
                FOREIGN KEY (`user_id`) REFERENCES users(`id`),
                FOREIGN KEY (`parent_id`) REFERENCES chat_messages(`id`)
            );
        ");
    }
}
