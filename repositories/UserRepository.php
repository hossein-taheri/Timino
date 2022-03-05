<?php
namespace Repository;

class UserRepository {
    public static function findAll(){
        //TODO :: write findAll user query ( by conditions )
    }
    public static function findOneById($id){
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM users WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetchAll()[0];
    }
    public static function create(){
        //TODO :: write create user query
    }
    public static function update(){
        //TODO :: write update user query
    }
    public static function delete(){
        //TODO :: write delete user query
    }
}
