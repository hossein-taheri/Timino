<?php

namespace Migration;

class ForgotPasswordMigration {
    public static function create(){
        $pdo = $GLOBALS['pdo'];
        $pdo->query("
            CREATE TABLE IF NOT EXISTS `forgot_passwords`(
                id int(10) NOT NULL auto_increment,
                email varchar(250) NOT NULL,
                code varchar(250) NOT NULL,     
                expiresAt date NOT NULL,     
                is_verified bool NOT NULL,
                PRIMARY KEY  (id)
        ");
    }
}
