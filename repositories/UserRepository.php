<?php
namespace Repository;

class UserRepository {
    public static function findAll(){
        //TODO :: write findAll user query ( by conditions )
    }
    public static function findOneById($id){
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT username,first_name,last_name,email,avatar,role FROM users WHERE id = :id AND is_confirmed = 1";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetchAll()[0];
    }
    public static function findOneByEmailOrUsername($email, $username){
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM users WHERE email = :email OR username = :username";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":username", $username);
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
        $username = "$username%";
        $pdo = $GLOBALS['pdo'];
        $query = "
            SELECT id,username,first_name,last_name,avatar,role
            FROM users
            WHERE username LIKE :username AND is_confirmed = 1 
            LIMIT 5";

        $statement = $pdo->prepare($query);
        $statement->bindParam(':username',$username);
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function findUsers($user_id, $per_page, $page,$username)
    {
        $offset = $per_page * ($page - 1);
        $username = "$username%";
        $pdo = $GLOBALS['pdo'];
        $query = "
            SELECT id,username,first_name,last_name,avatar,role
            FROM users 
            WHERE  username LIKE :username AND is_confirmed = 1
            LIMIT $per_page
            OFFSET $offset
           ";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':username',$username);
        PDOHelper::execute($statement);
        return $statement->fetchAll();
    }

    public static function countPagesUsers($user_id,$per_page,$username)
    {
        $username = "$username%";
        $pdo = $GLOBALS['pdo'];
        $query = "
            SELECT COUNT(*) FROM timelines 
            WHERE username LIKE :username AND is_confirmed = 1
           ";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':username',$username);
        PDOHelper::execute($statement);
        return ceil(($statement->fetchAll()[0][0]) / $per_page);
    }
}

