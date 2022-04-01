<?php
require_once 'middlewares/validators/AuthMiddlewares.php';
require_once 'middlewares/JWTAuthMiddleware.php';

use Pecee\SimpleRouter\SimpleRouter;
use Middleware\IndexUserMiddleware;


SimpleRouter::group(['prefix' => '/user'], function () {

    SimpleRouter::get('/search', 'UserController@search')->setName('user.search');

    SimpleRouter::get('/show/{id}', 'UserController@show')->setName('user.show');

    SimpleRouter::get('/index', 'UserController@index', ['middleware' => [IndexUserMiddleware::class]])->setName('User.index');


});