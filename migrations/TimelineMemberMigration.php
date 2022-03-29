<?php

namespace Migration;

class TimelineMemberMigration
{
    public static function create()
    {
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `timeline_members`(
                `timeline_id` int(10) NOT NULL,
                `user_id` int(10) NOT NULL,
                `event_privilege_level` ENUM('read_only','create_event') NOT NULL DEFAULT 'read_only',
                `chat_access` BOOL NOT NULL DEFAULT FALSE,     
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,     
                FOREIGN KEY (`timeline_id`) REFERENCES timelines(`id`),
                FOREIGN KEY (`user_id`) REFERENCES users(`id`) 
            );
        ");
    }
}
