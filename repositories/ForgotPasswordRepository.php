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


    public static function RecordForgotPassword($email,$verified_code,$expires_at){
    $pdo = $GLOBALS['pdo'];
    $query = "INSERT INTO forgot_passwords (eamil,verified_code,expires_at) VALUES (:eamil,:verified_code,:expires_at)";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":verified_code", $verified_code);
    $statement->bindParam(":expires_at", $expires_at);
    $statement->execute();
    return $statement->fetchAll();
   }
}
