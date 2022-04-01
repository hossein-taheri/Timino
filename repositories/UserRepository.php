<?php
namespace Repository;

use Helpers\PDOHelper;

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
    public static function findOneByEmail($email){
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM users WHERE email = :email";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":email", $email);
        PDOHelper::execute($statement);
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
    public static function create($username,$email,$first_name,$last_name,$password){
        $pdo = $GLOBALS['pdo'];
        $query = "INSERT INTO users(username,email,first_name,last_name,password) values(:username ,:email ,:first_name ,:last_name ,:password)";

        $statement = $pdo->prepare($query);
        $statement->bindParam(':username',$username);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':first_name',$first_name);
        $statement->bindParam(':last_name',$last_name);
        $statement->bindParam(':password',$password);
        $statement->execute();
    }
    public static function update(){
        //TODO :: write update user query
    }
    public static function deleteById($id)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "DELETE FROM users WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function verifyUserByEmail($email)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "UPDATE users SET is_confirmed = 1 WHERE email = :email";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function findAllByUsername($username){
        $username = "%$username%";
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT username,first_name,last_name,email FROM users WHERE username LIKE :username LIMIT 5";

        $statement = $pdo->prepare($query);
        $statement->bindParam(':username',$username);
        $statement->execute();
        return $statement->fetchAll();
    }
}

