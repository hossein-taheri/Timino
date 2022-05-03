<?php

require_once 'middlewares/validators/EventMiddlewares.php';
require_once 'middlewares/validators/CommentMiddlewares.php';

use Middleware\CreateCommentMiddleware;
use Middleware\IndexCommentMiddleware;
use Middleware\IndexEventMiddlewares;
use Middleware\CreateEventMiddlewares;
use Middleware\UpdateEventMiddlewares;
use Middleware\JWTAuthMiddleware;
use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['middleware'=>[JWTAuthMiddleware::class],'prefix' => '/{timeline}/event'], function () {
    SimpleRouter::get('/index', 'EventController@index', ['middleware' => [IndexEventMiddlewares::class]])->setName('event.index');

    SimpleRouter::post('/create', 'EventController@store', ['middleware' => [CreateEventMiddlewares::class]])->setName('event.create');

    SimpleRouter::get('/show/{event}', 'EventController@show')->setName('event.show');

    SimpleRouter::post('/update/{event}', 'EventController@update', ['middleware' => [UpdateEventMiddlewares::class]])->setName('event.update');

    SimpleRouter::get('/comment/{event}/index', 'CommentController@index', ['middleware' => [IndexCommentMiddleware::class]])->setName('comment.index');

    SimpleRouter::post('/comment/{event}/create', 'CommentController@store', ['middleware' => [CreateCommentMiddleware::class]])->setName('comment.create');
});
