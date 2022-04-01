<?php
namespace Middleware;

require_once "helpers/Validation.php";

use Helpers\Validation;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;


class IndexTimelineMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_GET, [
            'page'                  => 'numeric|integer|default:1|min:1',
        ]);
    }
}

class CreateTimelineMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'title'                 => 'required|min:5|max:50',
            'description'           => 'min:10|max:45',
            'avatar'                => 'min:5|max:25',
            'privilege_level'       => 'required|in:private,public',
        ]);
    }
}

class UpdateTimelineMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'title'                 => 'required|min:5|max:50',
            'description'           => 'min:10|max:45',
            'avatar'                => 'min:5|max:25',
            'privilege_level'       => 'required|in:private,public',
        ]);
    }
}

class AddMemberTimelineMiddleware implements IMiddleware {
    public function handle(Request $request): void
    {
        Validation::validate($_POST, [
            'new_user_id'               => 'required|numeric|integer|min:1',
        ]);
    }
}
