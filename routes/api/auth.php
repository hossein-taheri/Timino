<?php

require_once 'middlewares/validators/AuthMiddlewares.php';


use Middleware\RegisterMiddleware;
use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['prefix' => '/auth'], function() {
    SimpleRouter::post('/register', 'AuthController@register', ['middleware' => [ RegisterMiddleware::class ]])->setName('auth.register');

    SimpleRouter::post('/verify-email', 'AuthController@verifyEmail')->setName('auth.verifyEmail');

    SimpleRouter::post('/login', 'AuthController@login')->setName('auth.login');

    SimpleRouter::post('/refresh-token', 'AuthController@refreshToken')->setName('auth.refreshToken');

    SimpleRouter::post('/forgot-password/send-email', 'AuthController@forgotPasswordSendEmail')->setName('auth.forgotPasswordSendEmail');

    SimpleRouter::post('/forgot-password/verify-password', 'AuthController@forgotPasswordVerifyEmail')->setName('auth.forgotPasswordVerifyEmail');

    SimpleRouter::post('/forgot-password/set-password', 'AuthController@forgotPasswordSetPassword')->setName('auth.forgotPasswordSetPassword');
});
