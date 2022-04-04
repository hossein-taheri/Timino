<?php

use Helpers\Response;
use Pecee\SimpleRouter\SimpleRouter;
use Pecee\Http\Request;

require_once "helpers/Response.php";
require_once 'helpers/PDOHelper.php';

require_once 'middlewares/JWTAuthMiddleware.php';

require_once "controllers/AuthController.php";
require_once "controllers/UserController.php";
require_once "controllers/TimelineController.php";
require_once "controllers/EventController.php";

SimpleRouter::setDefaultNamespace('Controllers');

require_once 'routes/index.php';

SimpleRouter::error(function(Request $request, Exception $exception) {


    echo Response::error(
        $exception->getCode(),
        $exception->getMessage()
    );

});

SimpleRouter::start();
