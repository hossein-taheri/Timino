<?php
namespace Repository;

use Helpers\PDOHelper;

class TimeLineRepository {
    public static function create($creator_id,$title,$description,$avatar,$privilege_level){
        $pdo = $GLOBALS['pdo'];
        $query = "INSERT INTO `timelines`(`user_id`, `title`, `description`, `avatar`, `privilege_level`) VALUES (:user_id,:title,:description,:avatar,:privilege_level)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':user_id',$creator_id);
        $statement->bindParam(':title',$title);
        $statement->bindParam(':description',$description);
        $statement->bindParam(':avatar',$avatar);
        $statement->bindParam(':privilege_level',$privilege_level);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }

    public static function findAllByName($name){
        $name = "%$name%";
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT name,username,creat_time FROM timeline WHERE name LIKE :name LIMIT 5";

        $statement = $pdo->prepare($query);
        $statement->bindParam(':name',$name);
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function findOneById($id)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM `timelines` WHERE `id` = :id;";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id',$id);
        PDOHelper::execute($statement);
        return $statement->fetchAll()[0];
    }

    public static function updateOneById($id,$title,$description,$avatar,$privilege_level)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "UPDATE `timelines` SET `title`=:title,`description`=:description,`avatar`=:avatar,`privilege_level`=:privilege_level WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id',$id);
        $statement->bindParam(':title',$title);
        $statement->bindParam(':description',$description);
        $statement->bindParam(':avatar',$avatar);
        $statement->bindParam(':privilege_level',$privilege_level);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }
}
