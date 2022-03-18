<?php
namespace Middleware;


use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class RegisterMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        echo "RegisterMiddleware";
        exit();
    }
}
