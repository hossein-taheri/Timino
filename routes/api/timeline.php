<?php

require_once 'middlewares/validators/TimelineMiddlewares.php';

use Middleware\AddMemberTimelineMiddleware;
use Middleware\CreateTimelineMiddleware;
use Middleware\DeleteMemberTimelineMiddleware;
use Middleware\IndexTimelineMiddleware;
use Middleware\JWTAuthMiddleware;
use Middleware\UpdateTimelineMiddleware;
use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['middleware'=>[JWTAuthMiddleware::class],'prefix' => '/timeline'], function () {

    SimpleRouter::get('/search', 'TimelineController@search')->setName('timeline.search');

    SimpleRouter::get('/index', 'TimelineController@index', ['middleware' => [IndexTimelineMiddleware::class]])->setName('timeline.index');

    SimpleRouter::post('/create', 'TimelineController@store', ['middleware' => [CreateTimelineMiddleware::class]])->setName('timeline.create');

    SimpleRouter::get('/show/{id}', 'TimelineController@show')->setName('timeline.show');

    SimpleRouter::post('/update/{id}', 'TimelineController@update', ['middleware' => [UpdateTimelineMiddleware::class]])->setName('timeline.update');

    SimpleRouter::post('/delete/{id}', 'TimelineController@destroy')->setName('timeline.delete');

    SimpleRouter::post('/add-member/{id}', 'TimelineController@addMember', ['middleware' => [AddMemberTimelineMiddleware::class]])->setName('timeline.add.member');

    SimpleRouter::post('/delete-member/{id}', 'TimelineController@deleteMember', ['middleware' => [DeleteMemberTimelineMiddleware::class]])->setName('timeline.delete.member');
});
