<?php
namespace Controllers;

require_once "helpers/EmailDispatcher.php";
require_once "helpers/Exceptions.php";
require_once "repositories/UserRepository.php";
require_once "helpers/JWT.php";

use ForbiddenException;
use Helpers\EmailDispatcher;
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

        return json_encode(JWTHelper::encodeAccessToken($user['id']));
    }

    public function refreshToken()
    {
//        $emailDispatcher = new EmailDispatcher;
//        $emailDispatcher::send(['htaheri550@gmail.com'],'Subject','<h1>Message</h1>');
//        echo json_encode(UserRepository::findOneById(1));
    }

    public function forgotPassword()
    {
        return "AuthController RefreshToken";
    }
}
