<?php

require_once "middlewares/validators/CategoryMiddlewares.php";

use Middleware\CreateCategoryMiddleware;
use Middleware\JWTAdminAuthMiddleware;
use Middleware\JWTAuthMiddleware;
use Middleware\UpdateCategoryMiddleware;
use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['prefix' => '/category'], function () {
    SimpleRouter::get('/index', 'CategoryController@index',['middleware' => JWTAuthMiddleware::class])->setName('category.index');

    SimpleRouter::post('/create', 'CategoryController@store', ['middleware' => [ JWTAuthMiddleware::class, JWTAdminAuthMiddleware::class,CreateCategoryMiddleware::class]])->setName('category.create');

    SimpleRouter::post('/update/{id}', 'CategoryController@update', ['middleware' => [ JWTAuthMiddleware::class, JWTAdminAuthMiddleware::class,UpdateCategoryMiddleware::class]])->setName('category.update');
});