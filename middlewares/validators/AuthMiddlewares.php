<?php
namespace Middleware;

require_once "helpers/Validation.php";

use Helpers\Validation;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;



class RegisterMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'username'              => 'required|min:5|max:45|regex:/^(?=[a-zA-Z0-9._]{5,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/',
            'email'                 => 'required|email',
            'first_name'            => 'required|min:3|max:45',
            'last_name'             => 'required|min:3|max:45',
            'password'              => 'required|min:6|max:45'
        ]);
    }
}

class LoginMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'username'              => 'required|min:5|max:45',
            'password'              => 'required|min:6|max:45'
        ]);
    }
}

class ForgotPasswordSendEmailMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'email'                 => 'required|email',
        ]);
    }
}

class ForgotPasswordVerifyPasswordMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'email'                 => 'required|email',
            'code'                  => 'required|min:100000|max:999999|numeric'
        ]);
    }
}

class ForgotPasswordSetPasswordMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'email'                 => 'required|email',
            'code'                  => 'required|min:100000|max:999999|numeric',
            'password'              => 'required|min:6|max:45'
        ]);
    }
}
