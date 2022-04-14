<?php

namespace Repository;

use Helpers\PDOHelper;

class TimeLineRepository
{
    public static function create($creator_id, $title, $description, $avatar, $privilege_level)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "INSERT INTO `timelines`(`user_id`, `title`, `description`, `avatar`, `privilege_level`) VALUES (:user_id,:title,:description,:avatar,:privilege_level)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':user_id', $creator_id);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':avatar', $avatar);
        $statement->bindParam(':privilege_level', $privilege_level);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }

    public static function findAllByName($title)
    {
        $title = "%title%";
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT title,description,created_at,avatar FROM timelines WHERE title LIKE :title LIMIT 5";

        $statement = $pdo->prepare($query);
        $statement->bindParam(':title',$title);
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function findOneById($id)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM `timelines` WHERE `id` = :id;";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id);
        PDOHelper::execute($statement);
        return $statement->fetchAll()[0];
    }

    public static function updateOneById($id, $title, $description, $avatar, $privilege_level)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "UPDATE `timelines` SET `title`=:title,`description`=:description,`avatar`=:avatar,`privilege_level`=:privilege_level WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':id', $id);
        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':avatar', $avatar);
        $statement->bindParam(':privilege_level', $privilege_level);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }

    public static function findUserTimelines($user_id, $per_page, $page)
    {
        $offset = $per_page * ($page - 1);

        $pdo = $GLOBALS['pdo'];
        $query = "
            SELECT `id`, `title`, `description`, `avatar` FROM timelines 
            WHERE (
                (
                    SELECT COUNT(*)
                    FROM timeline_members
                    WHERE
                        timeline_members.timeline_id = timelines.id
                        AND
                        timeline_members.user_id = :user_id
                ) > 0
            )
            ORDER BY `id` DESC
            LIMIT $per_page
            OFFSET $offset
           ";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':user_id', $user_id);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }

    public static function countPagesUserTimelines($user_id,$per_page)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "
            SELECT COUNT(*) FROM timelines 
            WHERE (
                (
                    SELECT COUNT(*)
                    FROM timeline_members
                    WHERE
                        timeline_members.timeline_id = timelines.id
                        AND
                        timeline_members.user_id = :user_id
                ) > 0
            )
           ";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':user_id', $user_id);
        PDOHelper::execute($statement);
        return ceil(($statement->fetchAll()[0][0]) / $per_page);
    }

    public static function findOneByUserId($user_id)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM `timelines` WHERE `user_id` = :user_id ORDER BY `id` DESC;";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':user_id', $user_id);
        PDOHelper::execute($statement);
        return $statement->fetchAll()[0];
    }
}
