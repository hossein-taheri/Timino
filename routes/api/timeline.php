<?php


use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['prefix' => '/timeline'], function () {

    SimpleRouter::get('/search', 'TimeLineController@search')->setName('timeline.search');

});