<?php
namespace Middleware;

require_once "helpers/Validation.php";

use Helpers\Validation;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;


class IndexCategoryMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_GET, [
        ]);
    }
}

class CreateCategoryMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'name'                 => 'required|min:3|max:50',
        ]);
    }
}

class UpdateCategoryMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'name'                 => 'required|min:3|max:50',
        ]);
    }
}
