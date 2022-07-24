<?php

error_reporting(E_ALL ^ E_NOTICE);


function writeContentInFile($path, $content)
{
    $file = fopen($path, "wb");
    fwrite($file, $content);
    fclose($file);
}