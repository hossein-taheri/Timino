<?php

require_once 'middlewares/validators/AuthMiddlewares.php';

use Middleware\LoginMiddleware;
use Middleware\RegisterMiddleware;
use Middleware\ForgotPasswordSendEmailMiddleware;
use Middleware\ForgotPasswordVerifyPasswordMiddleware;
use Middleware\ForgotPasswordSetPasswordMiddleware;
use Pecee\SimpleRouter\SimpleRouter;


SimpleRouter::group(['prefix' => '/auth'], function () {
    SimpleRouter::post('/register', 'AuthController@register', ['middleware' => [RegisterMiddleware::class]])->setName('auth.register');

    SimpleRouter::post('/verify-email', 'AuthController@verifyEmail')->setName('auth.verifyEmail');

    SimpleRouter::post('/login', 'AuthController@login', ['middleware' => [LoginMiddleware::class]])->setName('auth.login');

    SimpleRouter::post('/refresh-token', 'AuthController@refreshToken')->setName('auth.refreshToken');

    SimpleRouter::post('/forgot-password/send-email', 'AuthController@forgotPasswordSendEmail', ['middleware' => [ForgotPasswordSendEmailMiddleware::class]])->setName('auth.forgotPasswordSendEmail');

    SimpleRouter::post('/forgot-password/verify-password', 'AuthController@forgotPasswordVerifyEmail', ['middleware' => [ForgotPasswordVerifyPasswordMiddleware::class]])->setName('auth.forgotPasswordVerifyEmail');

    SimpleRouter::post('/forgot-password/set-password', 'AuthController@forgotPasswordSetPassword', ['middleware' => [ForgotPasswordSetPasswordMiddleware::class]])->setName('auth.forgotPasswordSetPassword');
});
