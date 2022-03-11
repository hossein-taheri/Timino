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
}
