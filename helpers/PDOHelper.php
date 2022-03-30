<?php
namespace Helpers;

require_once 'helpers/Exceptions.php';

use InternalServerErrorException;

class PDOHelper {
    public static function execute($statement){
        $success = $statement->execute();
        if (!$success){
            throw new InternalServerErrorException($statement->errorInfo()[2]);
        }
    }
}
