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
