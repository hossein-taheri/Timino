<?php
require_once 'middlewares/validators/UserMiddlewares.php';
require_once 'middlewares/JWTAuthMiddleware.php';

use Middleware\JWTAuthMiddleware;
use Middleware\UpdateUserMiddleware;
use Pecee\SimpleRouter\SimpleRouter;
use Middleware\searchMiddleware;


SimpleRouter::group(['prefix' => '/user'], function () {

    SimpleRouter::get('/search_suggestion', 'UserController@search_suggestion')->setName('user.search_suggestion');

    SimpleRouter::get('/search', 'UserController@search', ['middleware' => [searchMiddleware::class]])->setName('User.search');

    SimpleRouter::get('/show/{id}', 'UserController@show')->setName('user.show');

    SimpleRouter::get('/my-profile', 'UserController@myProfile', ['middleware' => [JWTAuthMiddleware::class]])->setName('User.my.profile');

    SimpleRouter::post('/update', 'UserController@update', ['middleware' => [JWTAuthMiddleware::class , UpdateUserMiddleware::class]])->setName('User.update');



});