<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group(['prefix' => '/api'], function() {

    require_once  "routes/api/auth.php";

});
