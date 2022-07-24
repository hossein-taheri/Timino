<?php

/**
 * @throws ErrorException
 */
function generate_controller($name=null)
{
    if ($name == null){
        throw new ErrorException("enter the controller's name");
    }
    $content = file_get_contents("./manage-project/examples/controller.php",false);
    $name .= 'Controller';
    $content = str_replace("CONTROLLER_NAME",$name,$content);

    if (file_exists("./controllers/$name.php")){
        throw new ErrorException("$name.php already exists in controller directory");
    }

    $file = fopen("./controllers/$name.php","wb");
    fwrite($file,$content);
    fclose($file);
}

function generate_middleware()
{

}

function generate_repository()
{

}

function generate_migration()
{

}