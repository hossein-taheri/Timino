<?php
require_once 'middlewares/validators/AuthMiddlewares.php';
require_once 'middlewares/JWTAuthMiddleware.php';

use Pecee\SimpleRouter\SimpleRouter;
use Middleware\searchMiddleware;


SimpleRouter::group(['prefix' => '/user'], function () {

    SimpleRouter::get('/search_suggestion', 'UserController@search_suggestion')->setName('user.search_suggestion');

    SimpleRouter::get('/show/{id}', 'UserController@show')->setName('user.show');

    SimpleRouter::get('/search', 'UserController@search', ['middleware' => [searchMiddleware::class]])->setName('User.search');


});