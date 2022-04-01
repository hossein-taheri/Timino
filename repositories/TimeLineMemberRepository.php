<?php

namespace Repository;

use Helpers\PDOHelper;

class TimeLineMemberRepository
{
    public static function findOneByTimelineIdAndUserId($timeline_id, $user_id)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "
                SELECT timeline_members.timeline_id , timeline_members.user_id 
                FROM timeline_members, timelines , users
                WHERE
                    timeline_members.timeline_id = :timeline_id
                    AND
                    timeline_members.user_id = :user_id
                GROUP BY timeline_members.timeline_id , timeline_members.user_id 
        ";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':timeline_id', $timeline_id);
        $statement->bindParam(':user_id', $user_id);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }
    public static function create($timeline_id, $user_id, $event_privilege_level, $chat_access)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "INSERT INTO `timeline_members`
                    (
                        `timeline_id`,
                        `user_id`, 
                        `event_privilege_level`, 
                        `chat_access`
                    ) VALUES (
                        :timeline_id,
                        :user_id,
                        :event_privilege_level,
                        :chat_access
                    )";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':timeline_id', $timeline_id);
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':event_privilege_level', $event_privilege_level);
        $statement->bindParam(':chat_access', $chat_access);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }

    public static function delete($timeline_id, $user_id)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "DELETE FROM `timeline_members` WHERE timeline_members.user_id = :user_id AND timeline_members.timeline_id = :timeline_id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':timeline_id', $timeline_id);
        $statement->bindParam(':user_id', $user_id);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }
}
