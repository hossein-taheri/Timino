<?php

namespace Migration;

class MIGRATION_NAMEMigration
{
    public static function create()
    {
        $pdo = $GLOBALS['pdo'];
        // TODO :: write your own queries here
        $pdo->query("
            CREATE TABLE IF NOT EXISTS ``(    
            );
        ");
    }
}
