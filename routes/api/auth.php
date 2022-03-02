<?php
use Pecee\SimpleRouter\SimpleRouter;
use Pecee\Http\Request ;

SimpleRouter::group(['prefix' => '/auth'], function() {
    SimpleRouter::post('/', function (){
        return "Auth Index";
    });

});
