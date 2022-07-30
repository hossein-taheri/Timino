<?php

namespace Migration;

class MIGRATION_NAME
{
    public static function create()
    {
        $pdo = $GLOBALS['pdo'];
        // TODO :: write your own queries here
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `TABLE_NAME`(
                `id` int(10) NOT NULL auto_increment,
                PRIMARY KEY (id)
            );
        ");
    }
}
