<?php

namespace Migration;

class LikeMigration
{
    public static function create()
    {
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `likes`(
                `event_id` int(10) NOT NULL,
                `user_id` int(10) NOT NULL,
                FOREIGN KEY (`event_id`) REFERENCES events(`id`),
                FOREIGN KEY (`user_id`) REFERENCES users(`id`) 
            );
        ");
    }
}
