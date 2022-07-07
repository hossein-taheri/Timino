<?php

namespace Controllers;

require_once "helpers/EmailDispatcher.php";
require_once "helpers/Exceptions.php";
require_once "helpers/JWTHelper.php";
require_once "helpers/RandomGenerator.php";
require_once "repositories/UserRepository.php";
require_once "repositories/ForgotPasswordRepository.php";
require_once "repositories/VerifyEmailRepository.php";
require_once "repositories/TimeLineRepository.php";
require_once "repositories/EventRepository.php";

use ForbiddenException;
use Helpers\RandomGenerator;
use NotFoundException;
use Helpers\EmailDispatcher;
use Helpers\Response;
use JWTHelper;
use Repository\ForgotPasswordRepository;
use Repository\UserRepository;
use Repository\VerifyEmailRepository;

class AuthController
{
    public function register()
    {
        $user = UserRepository::findOneByEmailOrUsername($_POST['email'], $_POST['username']);

        if ($user['is_confirmed'] == false) {
            UserRepository::deleteById($user['id']);
            $user = null;
        }

        if ($user != null) {
            throw new ForbiddenException("The entered username or email is exist");
        }

        UserRepository::create($_POST['username'], $_POST['email'], $_POST['first_name'], $_POST['last_name'], $_POST['password']);

        $user = UserRepository::findOneByEmailOrUsername($_POST['email'], $_POST['username']);

        $token = RandomGenerator::generateRandomString(32);


        VerifyEmailRepository::create($user['email'], $token);

        EmailDispatcher::send(
            [
                $user['email'],
            ],
            'VerifyEmail',
            "
                <h3>Dear $user[first_name] </h3>
                <h3> Welcome to Timino </h3>
                <h4>Press the below button to Verify email</h4>
                <a href='http://$_SERVER[HTTP_HOST]/api/auth/verify-email?email=$user[email]&token=$token'>
                <button type='submit'>
                    Submit
                </button>
                </a>
            "
        );


        return Response::message(
            'Your account created successfully, Check your email to verify it',
            null
        );
    }

    public function verifyEmail()
    {
        $loginVerify = VerifyEmailRepository::findOneByEmailAndToken($_GET['email'], $_GET['token']);

        if ($loginVerify == null) {
            throw new NotFoundException("The entered email or token is not correct");
        }

        UserRepository::verifyUserByEmail($_GET['email']);

        echo "Thank You. Your account has been verified successfully";
    }

    public function login()
    {
        $user = UserRepository::findOneByEmailOrUsername($_POST['username'], $_POST['username']);
        if ($user == null) {
            throw new ForbiddenException("The entered username or password is not correct");
        }

        if ($user['password'] != $_POST['password']) {
            throw new ForbiddenException("The entered username or password is not correct");
        }

        if ($user['is_confirmed'] == 0) {
            throw new ForbiddenException("Your account has not been confirmed");
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
        $decoded = JWTHelper::decodeRefreshToken($_POST['refresh_token']);

        return Response::message(
            null,
            [
                'AccessToken' => JWTHelper::encodeAccessToken($decoded['user_id'])
            ]
        );
    }

    public function forgotPasswordSendEmail()
    {
        $user = UserRepository::findOneByEmailOrUsername($_POST['email'], $_POST['email']);
        if ($user == null) {
            throw new ForbiddenException("The entered username or email is not correct We can not send confirmation email ");
        }


        $email = $_POST['email'];
        $verified_code = rand(100000, 999999);
        $expires_at = time() + 60 * 5;
        $subject = 'Forgot password';
        $body = '<p>Your verified code is: </p>' . $verified_code;


        ForgotPasswordRepository::RecordForgotPassword($email, $verified_code, $expires_at);// forgot password record in database

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

        if ($forgotPassword['expires_at'] < time()) {
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

        if ($forgotPassword['expires_at'] < time()) {
            throw new ForbiddenException('The code has been expired');
        }

        if (!$forgotPassword['is_verified']) {
            throw new ForbiddenException('The code has not been verified');
        }

        UserRepository::updatePasswordByEmail($forgotPassword['email'], $_POST['password']);

        return Response::message(
            'Your password has been changed successfully',
            null
        );
    }

    public function searchUsername()
    {
        $usernames = UserRepository::findAllByUsername($_POST['username']);
        if ($usernames == null) {
            throw new ForbiddenException("This record not found.");
        }
        return Response::message(
            'These records were found',
            $usernames
        );
    }

    public function searchTimelineName()
    {
        $timeline_name = TimeLineRepository::findAllByName($_POST['name']);
        if ($timeline_name == null) {
            throw new ForbiddenException("This record not found.");
        }
        return Response::message(
            'These records were found',
            $timeline_name
        );
    }
}

