<?php


use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['prefix' => '/user'], function () {

    SimpleRouter::get('/search', 'UserController@search')->setName('user.search');

    SimpleRouter::get('/show/{id}', 'UserController@show')->setName('user.show');

});