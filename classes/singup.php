<?php

class Singup extends Dbh{
    protected function setUser($username, $password, $email){
        $stmt = $this->connect()->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?);');

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        if(!$stmt->execute(array($username, $hashedpassword, $email))){
            $stmt = null;
            header("Location:: ../index.php?error=stmtfailed");
            exit();

        } 

        $stmt = null;
    }

    protected function checkUser($username, $email){
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username =? OR user_email = ?;');
        if(!$stmt->execute(array($username, $email))){
            $stmt = null;
            header("Location:: ../index.php?error=stmtfailed");
            exit();

        }
        $resultCheck;
        if($stmt->rowCount()> 0){
            $resultCheck = false;

        } else{
            $resultCheck = true;
        }
        return $resultCheck;
    }




}