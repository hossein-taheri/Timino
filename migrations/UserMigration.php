<?php

namespace Migration;

class UserMigration {
    public static function create($pdo){
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `users`(
                `id` int(10) NOT NULL auto_increment,
                `username` varchar(250) UNIQUE NOT NULL,
                `email` varchar(250) UNIQUE NOT NULL,     
                `first_name` varchar(250) NOT NULL,     
                `last_name` varchar(250) NOT NULL,     
                `password` varchar(250) NOT NULL,
                PRIMARY KEY  (`id`)
            );
        ");
    }
}
