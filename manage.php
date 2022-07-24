<?php
try {
    error_reporting(E_ALL ^ E_NOTICE);

    require "./manage-project/generator.php";
    require "./manage-project/migrate.php";
    require "./manage-project/help.php";


    $first_subcommand = $argv[1];
    $second_subcommand = $argv[2];

    switch ($first_subcommand) {
        case (bool)preg_match('/generate::*/', $first_subcommand):
            switch ($first_subcommand) {
                case "generate:controller":
                    generate_controller($second_subcommand);
                    break;
                case "generate:middleware":
                    generate_middleware();
                    break;
                case "generate:repository":
                    generate_repository();
                    break;
                case "generate:migration":
                    generate_migration();
                    break;
                default:
                    help();
                    break;
            }
            break;
        case "migrate":
            migrate();
            break;
        default :
            help();
            break;
    }
} catch (ErrorException $e) {
    echo $e->getMessage();
} finally {
    echo "\n";
}