<?php

use Middleware\JWTAdminAuthMiddleware;
use Middleware\JWTAuthMiddleware;
use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group([['middleware' => JWTAuthMiddleware::class], 'prefix' => '/category'], function () {
    SimpleRouter::get('/index', 'CategoryController@index')->setName('category.index');

    SimpleRouter::post('/create', 'CategoryController@create', ['middleware' => [JWTAdminAuthMiddleware::class]])->setName('category.create');

    SimpleRouter::post('/update/{id}', 'CategoryController@update', ['middleware' => [JWTAdminAuthMiddleware::class]])->setName('category.update');
});