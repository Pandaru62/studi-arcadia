<?php

include "Dbh.php";

class Login extends Dbh{
    protected function getUser ($userEmail, $userPassword) {
        $sql = 'SELECT email, first_name, last_name, password, user.role_id, name, user.id AS userId  
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

        function generateToken() {
            return bin2hex(random_bytes(32)); 
        }

            session_set_cookie_params(3600);
            session_regenerate_id(false);
            session_start();
            $_SESSION["userEmail"] = $user[0]["email"];
            $_SESSION["userFirstName"] = $user[0]["first_name"];
            $_SESSION["userLastName"] = $user[0]["last_name"];
            $_SESSION["userRole"] = $user[0]["name"];
            $_SESSION["userId"] = $user[0]["userId"];

            if (!isset($_SESSION['csrf_token'])) {
                $_SESSION['csrf_token'] = generateToken();
            }

                    $stmt = null;
        }

    }
 
