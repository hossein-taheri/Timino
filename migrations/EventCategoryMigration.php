<?php

namespace Migration;

class EventCategoryMigration
{
    public static function create()
    {
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `event_categories`(
                `event_id` int(10) NOT NULL,
                `category_id` int(10) NOT NULL,
                FOREIGN KEY (`event_id`) REFERENCES events(`id`),
                FOREIGN KEY (`category_id`) REFERENCES categories(`id`) 
            );
        ");
    }
}
