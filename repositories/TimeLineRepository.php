<?php
namespace Repository;

class TimeLineRepository {

    public static function findAllByName($name){
        $name = "%$name%";
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT name,username,creat_time FROM users WHERE name LIKE :name LIMIT 5";

        $statement = $pdo->prepare($query);
        $statement->bindParam(':name',$name);
        $statement->execute();
        return $statement->fetchAll();
    }
}
