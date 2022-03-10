<?php
namespace Controllers;

require_once "helpers/EmailDispatcher.php";
require_once "repositories/UserRepository.php";
use Helpers\EmailDispatcher;
use Repository\UserRepository;

class AuthController{
    public function register()
    {
        return "AuthController Register";
    }

    public function verifyEmail()
    {
        return "AuthController VerifyEmail";
    }

    public function login()
    {
        $emailDispatcher = new EmailDispatcher;
        $emailDispatcher::send(['htaheri550@gmail.com'],'Subject','<h1>Message</h1>');
        echo json_encode(UserRepository::findOneById(1));
    }

    public function refreshToken()
    {
        return "AuthController RefreshToken";
    }

    public function forgotPassword()
    {
        return "AuthController RefreshToken";
    }
}
