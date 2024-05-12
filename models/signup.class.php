<?php 

include_once "Dbh.php";

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

        protected function editUser($userId, $userLastName, $userFirstName, $userEmail, $userPassword, $userRole) {
            $sql = 'UPDATE user SET last_name = ?, first_name = ?, email = ?, password = ?, role_id = ?
                    WHERE id = ?';
            $stmt = $this->connect()->prepare($sql);
            $hashedPwd = password_hash($userPassword, PASSWORD_DEFAULT);
        
            if (!$stmt->execute([$userLastName, $userFirstName, $userEmail, $hashedPwd, $userRole, $userId])) {
                $stmt = null;
                header("Location: " . BASE_URL . "/editaccount?error=addUser");
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

    protected function getUsers (int $id = null) {
        if($id !== null) {
            $sql = 'SELECT user.id AS userId, email, first_name, last_name, role_id, name
                    FROM user
                    LEFT JOIN role
                    ON user.role_id = role.id
                    WHERE user.id = :id';
        } else {
            $sql = 'SELECT user.id AS userId, email, first_name, last_name, role_id, name
                    FROM user
                    LEFT JOIN role
                    ON user.role_id = role.id
                    WHERE role.id != 1
                    ORDER BY last_name';
        }
        $stmt = $this->connect()->prepare($sql);
        if ($id !== null) {
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        }
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }
    
    protected function deleteUser(int $id) {
        $sql = 'DELETE FROM user 
                WHERE `user`.`id` = :id AND `user`.`role_id` !=1';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user;
    }

}