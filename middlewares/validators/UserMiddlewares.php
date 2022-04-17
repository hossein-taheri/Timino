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
            'page'                  => 'default:1|numeric|integer|min:1',
            'username'              => 'required|min:1'
        ]);
        $_GET['page']=1;
    }
}

class searchSuggestionMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_GET, [
            'username'                  => 'required|min:1',
        ]);
    }
}


class showMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_GET, [
            'id'                  => 'integer|min:1|default:-1',
        ]);
    }
}

