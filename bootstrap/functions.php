<?php

function dd($input)
{
    die(var_dump($input));
}

if (!file_exists('/tmp/audios')) {
    mkdir('path/to/directory', 0777, true);
}

if (!file_exists('/tmp/images')) {
    mkdir('path/to/directory', 0777, true);
}

if (!file_exists('/tmp/videos')) {
    mkdir('path/to/directory', 0777, true);
}