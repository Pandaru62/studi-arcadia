<?php

include "Dbh.php";

class Login extends Dbh{
    protected function getUser ($userEmail, $userPassword) {
        $sql = 'SELECT * 
               FROM user
               LEFT JOIN role
               ON user.role_id = role.id
               WHERE email = ?';
        $stmt = $this->connect()->prepare($sql);

        $stmt->execute(array($userEmail));

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(!$user)
        {
            $stmt = null;
            throw new Exception ("login-error");
            // header("Location: " .BASE_URL."/login?error=wronguser");
            // exit();
        } 

        if(!password_verify($userPassword, $user[0]["password"])) {
            $stmt = null;
            throw new Exception ("login-error");
            // header("location: /studi-arcadia/login?error=wrongPassword");
            // exit();
        }

            session_start();
            $_SESSION["userEmail"] = $user[0]["email"];
            $_SESSION["userFirstName"] = $user[0]["first_name"];
            $_SESSION["userLastName"] = $user[0]["last_name"];
            $_SESSION["userRole"] = $user[0]["name"];
            $_SESSION["userFirstName"] = $user[0]["first_name"];



                    $stmt = null;
        }

    }
 
