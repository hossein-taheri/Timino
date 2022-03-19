<?php

namespace Migration;

class VerifyEmailMigration {
    public static function create(){
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `verify_emails`(
                `id` int(10) NOT NULL auto_increment,
                `email` varchar(250) NOT NULL,     
                `token` varchar(40) NOT NULL,
                PRIMARY KEY (id)
             );
        ");
    }
}
