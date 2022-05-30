<?php

namespace Migration;

class TimelineMemberMigration
{
    public static function create()
    {
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `timeline_members`(
                `id` int(10) NOT NULL auto_increment,
                `timeline_id` int(10) NOT NULL,
                `user_id` int(10) NOT NULL,
                `event_privilege_level` ENUM('read_only','create_event') NOT NULL DEFAULT 'read_only',
                `chat_access` BOOLEAN NOT NULL DEFAULT FALSE,     
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,     
                PRIMARY KEY  (`id`),
                FOREIGN KEY (`timeline_id`) REFERENCES timelines(`id`),
                FOREIGN KEY (`user_id`) REFERENCES users(`id`) 
            );
        ");
    }
}
