<?php
namespace Middleware;

require_once 'helpers/Exceptions.php';

use ForbiddenException;
use JWTHelper;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use Repository\UserRepository;

class JWTAuthMiddleware implements IMiddleware
{
    public function handle(Request $request): void
    {
        $bearerToken = $request->getHeader('Authorization');
        $bearerToken = explode(' ',$bearerToken);

        if (
            $bearerToken[0] != 'Bearer'
            ||
            $bearerToken[1] == null
        ){
            throw new ForbiddenException("Token is not a bearer token");
        }

        $decoded = JWTHelper::decodeAccessToken($bearerToken[1]);

        $_POST['user_id'] = $decoded['user_id'] ;

    }
}

class JWTAdminAuthMiddleware implements IMiddleware
{
    public function handle(Request $request): void
    {
        $user = UserRepository::findOneById($_POST['user_id']);

        if ($user['role'] != 'admin'){
            throw new ForbiddenException("This route is accessible only for admin");
        }

    }
}
