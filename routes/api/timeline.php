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
    SimpleRouter::get('/search', 'TimelineController@search')->setName('timeline.search');

    SimpleRouter::get('/index', 'TimelineController@index', ['middleware' => [JWTAuthMiddleware::class, IndexTimelineMiddleware::class]])->setName('timeline.index');

    SimpleRouter::post('/create', 'TimelineController@store', ['middleware' => [JWTAuthMiddleware::class, CreateTimelineMiddleware::class]])->setName('timeline.create');

    SimpleRouter::get('/show/{id}', 'TimelineController@show', ['middleware' => [JWTAuthMiddleware::class]])->setName('timeline.show');

    SimpleRouter::post('/update/{id}', 'TimelineController@update', ['middleware' => [JWTAuthMiddleware::class, UpdateTimelineMiddleware::class]])->setName('timeline.update');

    SimpleRouter::post('/add-member/{id}', 'TimelineController@addMember', ['middleware' => [JWTAuthMiddleware::class, AddMemberTimelineMiddleware::class]])->setName('timeline.add.member');

    SimpleRouter::post('/delete-member/{id}', 'TimelineController@deleteMember', ['middleware' => [JWTAuthMiddleware::class, DeleteMemberTimelineMiddleware::class]])->setName('timeline.delete.member');
});