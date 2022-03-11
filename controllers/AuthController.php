<?php
namespace Controllers;

require_once "helpers/EmailDispatcher.php";
require_once "helpers/Exceptions.php";
require_once "repositories/UserRepository.php";
require_once "repositories/ForgotPasswordRepository.php";
require_once "helpers/JWT.php";

use Cassandra\Date;
use ForbiddenException;
use NotFoundException;
use Helpers\EmailDispatcher;
use Helpers\Response;
use JWTHelper;
use Repository\ForgotPasswordRepository;
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

    public function forgotPasswordSendEmail()
    {
        return "AuthController ForgotPasswordSendEmail";
    }

    public function forgotPasswordVerifyEmail()
    {
        return "AuthController ForgotPasswordVerifyEmail";
    }

    public function forgotPasswordSetPassword()
    {
        $forgotPassword = ForgotPasswordRepository::findOneByEmailAndCode($_POST['email'], $_POST['code']);

        if ($forgotPassword == null) {
            throw new NotFoundException('The entered email or code is not correct');
        }

        if( Date($forgotPassword['expires_at']) < Date(date("Y-m-d H:i:s")) ) {
            throw new ForbiddenException('The code has been expired');
        }

        UserRepository::updatePasswordByEmail($forgotPassword['email'],$_POST['password']);

        return Response::message(
            'Your password has been changed successfully',
            null
        );
    }
}
