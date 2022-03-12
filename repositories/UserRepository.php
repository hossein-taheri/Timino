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
    public static function create($username,$f_name,$l_name,$email,$password){
        $pdo = $GLOBALS['pdo'];
        $query = "INSERT INTO users(username,f_name,l_name,email,password) value (:username,:f_name,:l_name,:email,:password)";

        $statement = $pdo->prepare($query);
        $statement->bindParam(':username',$username,PDO::PARAM_STR);
        $statement->bindParam(':f_name',$f_name,PDO::PARAM_STR);
        $statement->bindParam(':l_name',$l_name,PDO::PARAM_STR);
        $statement->bindParam(':email',$email,PDO::PARAM_STR);
        $statement->bindParam(':password',$password,PDO::PARAM_STR);
        $statement->execute();
    }
    public static function update(){
        //TODO :: write update user query
    }
    public static function delete(){
        //TODO :: write delete user query
    }
}
