<?php
try {
    require 'vendor/autoload.php';
    require 'manage-project/config.php';
    require 'bootstrap/dotenv.php';
    require 'bootstrap/config.php';
    require 'bootstrap/database.php';
    require 'manage-project/generator.php';
    require 'manage-project/migrate.php';
    require 'manage-project/help.php';

    $first_subcommand = $argv[1];
    $second_subcommand = $argv[2];

    switch ($first_subcommand) {
        case (bool)preg_match('/generate::*/', $first_subcommand):
            switch ($first_subcommand) {
                case "generate:controller":
                    generate_controller($second_subcommand);
                    break;
                case "generate:middleware":
                    generate_middleware($second_subcommand);
                    break;
                case "generate:repository":
                    generate_repository($second_subcommand);
                    break;
                case "generate:migration":
                    generate_migration($second_subcommand);
                    break;
                default:
                    help_command();
                    break;
            }
            break;
        case "migrate":
            migrate();
            break;
        case "help":
            help();
            break;
        default :
            help_command();
            break;
    }
} catch (ErrorException $e) {
    echo $e->getMessage()."\n";
}