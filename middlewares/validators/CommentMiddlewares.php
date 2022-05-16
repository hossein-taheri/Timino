<?php
namespace Middleware;

require_once "helpers/Validation.php";

use Helpers\Validation;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;


class IndexCommentMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_GET, [
        ]);
    }
}

class CreateCommentMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'message'              => 'required|min:1|max:150',
        ]);
    }
}
