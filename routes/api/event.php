<?php

require_once 'middlewares/validators/TimelineMiddlewares.php';

use Middleware\AddMemberTimelineMiddleware;
use Middleware\CreateTimelineMiddleware;
use Middleware\DeleteMemberTimelineMiddleware;
use Middleware\IndexTimelineMiddleware;
use Middleware\JWTAuthMiddleware;
use Middleware\UpdateTimelineMiddleware;
use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['middleware'=>[JWTAuthMiddleware::class],'prefix' => '/{timeline}/event'], function () {
    SimpleRouter::get('/index', 'EventController@index', ['middleware' => [IndexTimelineMiddleware::class]])->setName('event.index');

    SimpleRouter::post('/create', 'EventController@store', ['middleware' => [CreateTimelineMiddleware::class]])->setName('event.create');

    SimpleRouter::get('/show/{event}', 'EventController@show')->setName('event.show');

    SimpleRouter::post('/update/{event}', 'EventController@update', ['middleware' => [UpdateTimelineMiddleware::class]])->setName('event.update');
});
