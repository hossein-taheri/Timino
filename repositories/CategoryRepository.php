<?php
namespace Repository;

use Helpers\PDOHelper;

class CategoryRepository {
    public static function findAll(){
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM `categories`";
        $statement = $pdo->prepare($query);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }

    public static function findOne($category_id){
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM `categories` WHERE id = :category_id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':category_id', $category_id);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }

    public static function create($name){
        $pdo = $GLOBALS['pdo'];
        $query = "INSERT INTO `categories`(`name`) VALUES (:name)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':name', $name);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }

    public static function update($category_id,$name){
        $pdo = $GLOBALS['pdo'];
        $query = "UPDATE `categories` SET `name`=:name WHERE `id`=:category_id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':category_id', $category_id);
        $statement->bindParam(':name', $name);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }

}