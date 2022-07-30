<?php

function migrate()
{
    $migrations = json_decode(file_get_contents("./manage-project/migration_files_list.json"), true);
    foreach ($migrations as $migration) {
        try {
            require "migrations/$migration.php";
            $className = 'Migration\\' . $migration;
            $className::create();
            echo "$migration migrated successfully.\n";
        } catch (ErrorException $err) {
            echo "$migration migration failed" . "\n";
        }
    }
}