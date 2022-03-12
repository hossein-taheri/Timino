<?php

use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['prefix' => '/auth'], function() {
    SimpleRouter::post('/register', 'AuthController@register')->setName('auth.register');

    SimpleRouter::post('/verify-email', 'AuthController@verifyEmail')->setName('auth.verifyEmail');

    SimpleRouter::post('/login', 'AuthController@login')->setName('auth.login');

    SimpleRouter::post('/refresh-token', 'AuthController@refreshToken')->setName('auth.refreshToken');

    SimpleRouter::post('/forgot-password/send-email', 'AuthController@forgotPasswordSendEmail')->setName('auth.forgotPasswordSendEmail');

    SimpleRouter::post('/forgot-password/verify-password', 'AuthController@forgotPasswordVerifyEmail')->setName('auth.forgotPasswordVerifyEmail');

    SimpleRouter::post('/forgot-password/set-password', 'AuthController@forgotPasswordSetPassword')->setName('auth.forgotPasswordSetPassword');
});