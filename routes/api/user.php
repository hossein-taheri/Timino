<?php


use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['prefix' => '/user'], function () {

    SimpleRouter::post('/search-user', 'AuthController@searchUsername')->setName('user.searchUsername');

    SimpleRouter::post('/search-timeline', 'AuthController@searchTimelineName')->setName('user.searchTimelineName');

});