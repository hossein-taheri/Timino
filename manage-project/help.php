<?php

function help_command()
{
    echo "Command not found\nTry 'php manage.php help' for more information.\n";
}

function help()
{
    echo
    "Usage: php manage.php <command>

    Commands:
        generate:controller  <name>\t\t\t\tGenerate PHP controller
        generate:middleware  <name>\t\t\t\tGenerate PHP middleware
        generate:repository  <name>\t\t\t\tGenerate PHP repository
        generate:migration   <name>\t\t\t\tGenerate PHP migration
        migrate                    \t\t\t\tMigrate Migrations to the database 
        help                       \t\t\t\tUsage information\n";

}



