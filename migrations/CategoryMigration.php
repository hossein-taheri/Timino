<?php

namespace Migration;

class CategoryMigration
{
    public static function create()
    {
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `categories`(
                `id` int(10) NOT NULL auto_increment,
                `name` varchar(250) NOT NULL,
                PRIMARY KEY (`id`)
            );
        ");
    }
}
