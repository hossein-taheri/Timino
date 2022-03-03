<?php

use Helpers\CustomExceptionHandler;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group(['exceptionHandler' => CustomExceptionHandler::class,'prefix' => '/api'], function() {

    require "routes/api/auth.php";

});
