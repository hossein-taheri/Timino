<?php
namespace Controllers;

require_once "helpers/EmailDispatcher.php";
require_once "helpers/Exceptions.php";
require_once "repositories/UserRepository.php";
require_once "repositories/ForgotPasswordRepository.php";
require_once "helpers/JWT.php";

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
        $user = UserRepository::findOneByEmailOrUsername($_POST['email'],$_POST['username']);

        if($user != null)
        {
            throw new ForbiddenException("The entered username or email is exist");
        }

        UserRepository::create($_POST['username'],$_POST['email'],$_POST['first_name'],$_POST['last_name'],$_POST['password']);

        return Response::message(
            null,
            null
        );
    }

    public function verifyEmail()
    {
        return "AuthController VerifyEmail";
    }

    public function login()
    {
        $user = UserRepository::findOneByEmailOrUsername($_POST['username'], $_POST['username']);
        if ( $user == null ){
            throw new ForbiddenException("The entered username or password is not correct");
        }

        if ( $user['password'] != $_POST['password'] ){
            throw new ForbiddenException("The entered username or password is not correct");
        }

        return Response::message(
            null,
            [
                'AccessToken' => JWTHelper::encodeAccessToken($user['id']),
                'RefreshToken' => JWTHelper::encodeRefreshToken($user['id'])
            ]
        );
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
        $user = UserRepository::findOneByEmailOrUsername($_POST['email'], $_POST['email']);
        if($user == null)
        {
            throw new ForbiddenException("The entered username or email is not correct We can not send confirmation email ");
        }


        $email= $_POST['email'];
        $verified_code= rand(100000,999999);
        $expires_at= time()+ 60 * 5;
        $subject='Forgot password';
        $body='<p>Your verified code is: </p>'.$verified_code;


        ForgotPasswordRepository::RecordForgotPassword($email,$verified_code,$expires_at );// forgot password record in database

        EmailDispatcher::send([$email], $subject, $body);


        return Response::message(
            null,
            null
        );
    }

    public function forgotPasswordVerifyEmail()
    {
        $forgotPassword = ForgotPasswordRepository::findOneByEmailAndCode($_POST['email'], $_POST['code']);

        if ($forgotPassword == null) {
            throw new NotFoundException('The entered email or code is not correct');
        }

        if( $forgotPassword['expires_at'] < time() ) {
            throw new ForbiddenException('The code has been expired');
        }

        ForgotPasswordRepository::isVerified($_POST['email'], $_POST['code']);
        //$forgotPassword['is_verified'] = true;

        return Response::message(
            null,
            null
        );
    }

    public function forgotPasswordSetPassword()
    {
        $forgotPassword = ForgotPasswordRepository::findOneByEmailAndCode($_POST['email'], $_POST['code']);

        if ($forgotPassword == null) {
            throw new NotFoundException('The entered email or code is not correct');
        }

        if( $forgotPassword['expires_at'] < time() ) {
            throw new ForbiddenException('The code has been expired');
        }

        if( !$forgotPassword['is_verified'] ) {
            throw new ForbiddenException('The code has not been verified');
        }

        UserRepository::updatePasswordByEmail($forgotPassword['email'],$_POST['password']);

        return Response::message(
            'Your password has been changed successfully',
            null
        );
    }
}
