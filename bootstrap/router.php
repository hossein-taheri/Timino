<?php

use Helpers\Response;
use Pecee\SimpleRouter\SimpleRouter;
use Pecee\Http\Request;
require_once "helpers/Response.php";
require_once "controllers/AuthController.php";

SimpleRouter::setDefaultNamespace('Controllers');

require_once 'routes/index.php';

SimpleRouter::error(function(Request $request, Exception $exception) {


    echo Response::error(
        $exception->getCode(),
        $exception->getMessage()
    );

});

SimpleRouter::start();
