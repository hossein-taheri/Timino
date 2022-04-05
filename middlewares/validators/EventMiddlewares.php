<?php
namespace Middleware;

require_once "helpers/Validation.php";

use Helpers\Validation;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;


class IndexEventMiddlewares implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_GET, [
        ]);
    }
}

class CreateEventMiddlewares implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'title'                 => 'required|min:5|max:50',
            'description'           => 'min:10|max:45',
        ]);
    }
}

class UpdateEventMiddlewares implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'title'                 => 'required|min:5|max:50',
            'description'           => 'min:10|max:45',
        ]);
    }
}
