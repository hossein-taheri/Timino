<?php


use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['prefix' => '/timeline'], function () {

    SimpleRouter::get('/search', 'TimelineController@search')->setName('timeline.search');

});