<?php
namespace Repository;

class VerifyEmailRepository
{
    public static function findOneByEmailAndToken($email, $token)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM verify_emails WHERE email = :email AND token = :token";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":token", $token);
        $statement->execute();
        return $statement->fetchAll()[0];
    }

    public static function create($email, $token)
    {
        $pdo = $GLOBALS['pdo'];
        $query = "INSERT INTO verify_emails(email,token) values(:email ,:token)";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':token',$token);
        $statement->execute();
    }
}
