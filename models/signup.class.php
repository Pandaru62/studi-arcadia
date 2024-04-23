<?php 

include "Dbh.php";

class Signup extends Dbh{

    protected function setUser ($userLastName, $userFirstName, $userEmail, $userPassword, $userRole) {
        $sql = 'INSERT INTO user (last_name, first_name, email, password, role_id)
        VALUES (?, ?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);

        $hashedPwd = password_hash($userPassword, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($userLastName, $userFirstName, $userEmail, $hashedPwd, $userRole))) {
            $stmt = null;
            header("Location: " .BASE_URL."/login?error=stmtfailed");
            exit();
        }

        $stmt = null;
    
    }
 

    protected function checkUser($userEmail) {
        $sql = 'SELECT email FROM user WHERE email = ?';
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute($userEmail)) {
            $stmt = null;
            header("Location: " .BASE_URL."/login?error=stmtfailed");
            exit();
        }

        $resultCheck = true;
        if($stmt->rowCount() >0) {
            $resultCheck = false;
        }
        return $resultCheck;
    }



}