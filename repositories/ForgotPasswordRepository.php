<?php
namespace Repository;

class ForgotPasswordRepository {
    public static function findOneByEmailAndCode($email, $code){
        $pdo = $GLOBALS['pdo'];
        $query = "SELECT * FROM forgot_passwords WHERE email = :email AND code = :code";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":code", $code);
        $statement->execute();
        return $statement->fetchAll()[0];
    }


    public static function RecordForgotPassword($email,$code,$expires_at){
    $pdo = $GLOBALS['pdo'];
    $query = "INSERT INTO forgot_passwords(email,code,expires_at) values(:email ,:verified_code ,:expires_at)";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':email',$email);
    $statement->bindParam(':verified_code',$code);
    $statement->bindParam(':expires_at',$expires_at);
    $statement->execute();
    return $statement->fetchAll();
   }


    public static function isVerified($email,$code){
        $pdo = $GLOBALS['pdo'];
        $query = "UPDATE forgot_passwords SET is_verified = 1 WHERE code=:code AND email=:email";

        $statement = $pdo->prepare($query);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':code',$code);
        $statement->execute();
        return $statement->fetchAll();
}
}