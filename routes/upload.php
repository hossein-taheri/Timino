<?php

require_once 'middlewares/validators/EventMiddlewares.php';

use Middleware\JWTAuthMiddleware;
use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['prefix' => '/upload'], function () {
    SimpleRouter::post('/file', 'UploadController@uploadFile')->setName('upload.file');
});
