<?php

require "./manage-project/generator.php";
require "./manage-project/migrate.php";
require "./manage-project/help.php";

$subcommands = $argv[1];


switch ($subcommands) {
    case (bool)preg_match('/generate::*/', $subcommands):
        switch ($subcommands) {
            case "generate:controller":
                generate_controller();
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

echo "\n";

