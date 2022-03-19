<?php

use Helpers\CustomExceptionHandler;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group(['prefix' => '/api'], function() {

    require_once  "routes/api/auth.php";

    require_once  "routes/api/user.php";
});
