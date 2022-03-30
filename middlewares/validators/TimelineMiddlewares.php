<?php
namespace Middleware;

require_once "helpers/Validation.php";

use Helpers\Validation;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;


class CreateTimelineMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'title'                 => 'required|min:5|max:50',
            'description'           => 'min:25|max:45',
            'avatar'                => 'min:5|max:25',
            'privilege_level'       => 'required|in:private,public',
        ]);
    }
}
