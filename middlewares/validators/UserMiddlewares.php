<?php
namespace Middleware;

require_once "helpers/Validation.php";

use Helpers\Validation;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;



class searchMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_GET, [
            'page'                  => 'numeric|integer|default:1|min:1',
        ]);
        $_GET['page'] = 1;
    }
}

class UpdateUserMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'first_name'            => 'required|min:3|max:45',
            'last_name'             => 'required|min:3|max:45',
            'avatar'                => 'min:6|max:45',
            'phone'                 => 'min:11|max:11',
            'gender'                => 'in:male,public',
        ]);
    }
}
