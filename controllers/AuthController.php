<?php
namespace Controllers;

require_once "helpers/EmailDispatcher.php";
require_once "helpers/Exceptions.php";
require_once "repositories/UserRepository.php";
require_once "helpers/JWT.php";

use ForbiddenException;
use Helpers\EmailDispatcher;
use Helpers\Response;
use JWTHelper;
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

    /**
     * @throws ForbiddenException
     */
    public function login()
    {
        $user = UserRepository::findOneByEmailOrUsername($_POST['username']);
        if ( $user == null ){
            throw new ForbiddenException("The entered username or password is not correct");
        }

        if ( $user['password'] != $_POST['password'] ){
            throw new ForbiddenException("The entered username or password is not correct");
        }

        $token = JWTHelper::encodeAccessToken($user['id']);
        return Response::message(null,$token);
    }

    public function refreshToken()
    {
    }

    public function forgotPassword()
    {
        return "AuthController RefreshToken";
    }
}
