<?php

/**
 * @throws ErrorException
 */
function generate_controller($name = null)
{
    if ($name == null) {
        throw new ErrorException("Enter the controller name");
    }
    $content = file_get_contents("./manage-project/examples/controller.php");
    $name .= 'Controller';
    $content = str_replace("CONTROLLER_NAME", $name, $content);

    if (file_exists("./controllers/$name.php")) {
        throw new ErrorException("$name.php already exists in controller directory");
    }

    $file = fopen("./controllers/$name.php", "wb");
    fwrite($file, $content);
    fclose($file);
}

/**
 * @throws ErrorException
 */
function generate_middleware($name = null)
{
    if ($name == null) {
        throw new ErrorException("Enter the middleware name");
    }
    $content = file_get_contents("./manage-project/examples/middleware.php");
    $name .= 'Middleware';
    $content = str_replace("MIDDLEWARE_NAME", $name, $content);

    if (file_exists("./middlewares/$name.php")) {
        throw new ErrorException("$name.php already exists in middlewares directory");
    }

    $file = fopen("./middlewares/$name.php", "wb");
    fwrite($file, $content);
    fclose($file);
}

/**
 * @throws ErrorException
 */
function generate_repository($name = null)
{
    if ($name == null) {
        throw new ErrorException("Enter the repository name");
    }
    $content = file_get_contents("./manage-project/examples/repository.php");
    $name .= 'Repository';
    $content = str_replace("REPOSITORY_NAME", $name, $content);

    if (file_exists("./repositories/$name.php")) {
        throw new ErrorException("$name.php already exists in repositories directory");
    }

    $file = fopen("./repositories/$name.php", "wb");
    fwrite($file, $content);
    fclose($file);
}

/**
 * @throws ErrorException
 */
function generate_migration($name = null)
{
    if ($name == null) {
        throw new ErrorException("Enter the migration name");
    }
    $content = file_get_contents("./manage-project/examples/migration.php");
    $name .= 'Migration';
    $content = str_replace("MIGRATION_NAME", $name, $content);

    if (file_exists("./migrations/$name.php")) {
        throw new ErrorException("$name.php already exists in migrations directory");
    }

    $file = fopen("./migrations/$name.php", "wb");
    fwrite($file, $content);
    fclose($file);
}