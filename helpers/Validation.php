<?php
namespace Helpers;

use Helpers\Response;
use Rakit\Validation\Validator;

class Validation
{
    public static function validate($inputs, $roles)
    {
        $validator = new Validator;

        $validation = $validator->make($inputs, $roles);

        $validation->validate();

        if ($validation->fails()) {
            $errors = $validation->errors();
            echo Response::validationError($errors->all());
            exit();
        }
    }
}
