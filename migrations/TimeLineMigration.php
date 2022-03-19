<?php

namespace Migration;

class TimeLineMigration {
    public static function create(){
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `timeline`(
                `id` int(10) NOT NULL auto_increment,
                `name` varchar(250) UNIQUE NOT NULL,
                `username` varchar(250)  NOT NULL,     
                `creat_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,     
                PRIMARY KEY  (`id`)
            );
        ");
    }
}
