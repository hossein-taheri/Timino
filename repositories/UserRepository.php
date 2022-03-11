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
    public static function findOneByEmailOrUsername($emailOrUsername){
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM users WHERE email = :email OR username = :username";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":email", $emailOrUsername);
        $statement->bindParam(":username", $emailOrUsername);
        $statement->execute();
        return $statement->fetchAll()[0];
    }
    public static function updatePasswordByEmail($email, $password){
        $pdo = $GLOBALS['pdo'];
        $query = "UPDATE users SET password = :password WHERE email = :email";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $password);
        $statement->execute();
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
