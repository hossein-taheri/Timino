<?php

use Controllers\AuthController;
use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['prefix' => '/auth'], function() {

    SimpleRouter::post('/', function () {
        return "Auth Index";
    });

});
