<?php

use Helpers\Response;
use Pecee\SimpleRouter\SimpleRouter;
use Pecee\Http\Request;

require_once "helpers/Response.php";
require_once 'helpers/PDOHelper.php';

require_once 'middlewares/JWTAuthMiddleware.php';

require_once "controllers/AuthController.php";
require_once "controllers/UserController.php";
require_once "controllers/TimeLineController.php";
require_once "controllers/EventController.php";
require_once "controllers/UploadController.php";
require_once "controllers/CategoryController.php";

SimpleRouter::setDefaultNamespace('Controllers');

cors();

require_once 'routes/index.php';

SimpleRouter::error(function(Request $request, Exception $exception) {


    echo Response::error(
        $exception->getCode(),
        $exception->getMessage()
    );

});

SimpleRouter::start();

function cors() {
    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }
}