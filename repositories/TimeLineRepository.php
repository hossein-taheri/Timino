<?php
namespace Repository;

class TimeLineRepository {

    public static function findAllByName($title){
        $title = "$title%";
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT title,description,created_at,avatar FROM timelines WHERE title LIKE :title LIMIT 5";

        $statement = $pdo->prepare($query);
        $statement->bindParam(':title',$title);
        $statement->execute();
        return $statement->fetchAll();
    }
}
