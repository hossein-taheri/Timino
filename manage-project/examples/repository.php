<?php

namespace Repository;

use Helpers\PDOHelper;

class REPOSITORY_NAME
{
    // TODO :: write your functions and your own queries
    public static function findOne()
    {
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM ``";
        $statement = $pdo->prepare($query);
        PDOHelper::execute($statement);
        return $statement->fetchAll()[0];
    }

}