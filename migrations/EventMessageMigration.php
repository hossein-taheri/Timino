<?php

namespace Migration;

class EventMessageMigration
{
    public static function create()
    {
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `event_messages`(
                `id` int(10) NOT NULL auto_increment,
                `event_id` int(10) NOT NULL,
                `type` enum('image','video') NOT NULL,
                `link` varchar(250) NOT NULL,
                PRIMARY KEY (`id`),
                FOREIGN KEY (`event_id`) REFERENCES events(`id`)
            );
        ");
    }
}
