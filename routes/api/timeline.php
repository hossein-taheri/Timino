<?php

require_once 'middlewares/validators/TimelineMiddlewares.php';

use Middleware\AddMemberTimelineMiddleware;
use Middleware\CreateTimelineMiddleware;
use Middleware\DeleteMemberTimelineMiddleware;
use Middleware\IndexTimelineMiddleware;
use Middleware\JWTAuthMiddleware;
use Middleware\UpdateTimelineMiddleware;
use Pecee\SimpleRouter\SimpleRouter;




SimpleRouter::group(['prefix' => '/timeline'], function () {
    SimpleRouter::get('/search', 'TimeLineController@search')->setName('timeline.search');

    SimpleRouter::get('/index', 'TimeLineController@index', ['middleware' => [JWTAuthMiddleware::class, IndexTimelineMiddleware::class]])->setName('timeline.index');

    SimpleRouter::post('/create', 'TimeLineController@store', ['middleware' => [JWTAuthMiddleware::class, CreateTimelineMiddleware::class]])->setName('timeline.create');

    SimpleRouter::get('/show/{id}', 'TimeLineController@show', ['middleware' => [JWTAuthMiddleware::class]])->setName('timeline.show');

    SimpleRouter::post('/update/{id}', 'TimeLineController@update', ['middleware' => [JWTAuthMiddleware::class, UpdateTimelineMiddleware::class]])->setName('timeline.update');

    SimpleRouter::post('/add-member/{id}', 'TimeLineController@addMember', ['middleware' => [JWTAuthMiddleware::class, AddMemberTimelineMiddleware::class]])->setName('timeline.add.member');

    SimpleRouter::post('/delete-member/{id}', 'TimeLineController@deleteMember', ['middleware' => [JWTAuthMiddleware::class, DeleteMemberTimelineMiddleware::class]])->setName('timeline.delete.member');
});