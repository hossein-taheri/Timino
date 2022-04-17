<?php
namespace Middleware;

require_once "helpers/Validation.php";

use Helpers\Validation;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;



class searchTimeLineMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_GET, [
            'title'              => 'required|min:1'
        ]);
    }
}

