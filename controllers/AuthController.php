<?php
namespace Controllers;

require "repositories/UserRepository.php";
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
