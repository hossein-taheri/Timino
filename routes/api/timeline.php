<?php


use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['prefix' => '/timeline'], function () {

    SimpleRouter::get('/search', 'TimelineController@search')->setName('timeline.search');

    SimpleRouter::get('/index', 'TimelineController@index')->setName('timeline.index');

    SimpleRouter::post('/create', 'TimelineController@create')->setName('timeline.create');

    SimpleRouter::get('/show/{id}', 'TimelineController@show')->setName('timeline.show');

    SimpleRouter::post('/update/{id}', 'TimelineController@update')->setName('timeline.update');

    SimpleRouter::post('/delete/{id}', 'TimelineController@destroy')->setName('timeline.delete');
});
