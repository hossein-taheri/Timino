<?php
require_once 'middlewares/validators/TimeLineMiddlewares.php';
require_once 'middlewares/JWTAuthMiddleware.php';

use Pecee\SimpleRouter\SimpleRouter;
use Middleware\searchTimeLineMiddleware;


SimpleRouter::group(['prefix' => '/timeline'], function () {

    SimpleRouter::get('/search', 'TimeLineController@search', ['middleware' => [searchTimeLineMiddleware::class]])->setName('timeline.search');


});