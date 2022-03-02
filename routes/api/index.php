<?php
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group(['prefix' => '/api'], function() {

    require "routes/api/auth.php";

});
