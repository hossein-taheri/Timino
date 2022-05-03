<?php

namespace Repository;

use Helpers\PDOHelper;

class CommentRepository
{
    public static function findAll($eventId)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM `comments` , `users` WHERE comments.event_id = :event_id AND users.id = comments.user_id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':event_id',$eventId);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }

    public static function create($eventId, $creatorId, $message)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "INSERT INTO `comments`(`event_id`, `user_id`, `body`) VALUES (:event_id,:user_id,:body)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':event_id',$eventId);
        $statement->bindParam(':user_id',$creatorId);
        $statement->bindParam(':body',$message);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }
}