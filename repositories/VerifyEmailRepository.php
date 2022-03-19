<?php
namespace Repository;

class VerifyEmailRepository
{
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
