<?php
require_once 'middlewares/validators/UserMiddlewares.php';
require_once 'middlewares/JWTAuthMiddleware.php';

use Pecee\SimpleRouter\SimpleRouter;
use Middleware\searchMiddleware;
use Middleware\searchSuggestionMiddleware;
use Middleware\showMiddleware;



SimpleRouter::group(['prefix' => '/user'], function () {

    SimpleRouter::get('/search_suggestion', 'UserController@search_suggestion',['middleware' => [searchSuggestionMiddleware::class]])->setName('user.search_suggestion');

    SimpleRouter::get('/show/{id}', 'UserController@show', ['middleware' => [showMiddleware::class]])->setName('user.show');

    SimpleRouter::get('/search', 'UserController@search', ['middleware' => [searchMiddleware::class]])->setName('user.search');



});