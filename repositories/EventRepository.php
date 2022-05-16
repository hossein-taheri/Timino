<?php

namespace Repository;

use Helpers\PDOHelper;

class EventRepository
{
    public static function findAllByTimelineId($timeline_id){
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM `events` WHERE `events`.timeline_id = :timeline_id ORDER BY `id` DESC ";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':timeline_id', $timeline_id);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }

    public static function create($timeline_id, $user_id, $title, $description)
    {
        $short_description = substr($description, 0, 50);
        $pdo = $GLOBALS['pdo'];
        $query = "INSERT INTO `events`(`timeline_id`, `user_id`, `title`, `description`, `short_description`) VALUES (:timeline_id,:user_id,:title,:description,:short_description)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':timeline_id', $timeline_id);
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':short_description', $short_description);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }

    public static function findOneById($id)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM `events` WHERE `id` = :id;";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id);
        PDOHelper::execute($statement);
        return $statement->fetchAll()[0];
    }

    public static function updateOneById($id, $timeline_id, $user_id, $title, $description)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "UPDATE `events` SET `timeline_id`=:timeline_id, `user_id`=:user_id, `title`=:title, `description`=:description WHERE `id` = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':timeline_id', $timeline_id);
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }
}
