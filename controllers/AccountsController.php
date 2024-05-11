<?php
// Redirects to the account view for admin
require_once "./models/signup.class.php";

class AccountsController extends Signup {

    public function showAccounts() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') {
            $userList = $this->getUsers();
            require_once 'views/admin/showaccounts.php';
            return $userList;
        } else {
            header("Location: ".BASE_URL);
        }
    }   

    public function deleteAccount() {      
        
        if(isset($_SESSION['userRole']) && $_SESSION["userRole"] == "admin") {
            if(isset($_GET['id'])) {
                $deletedUser = $_GET['id'];
                $delete = $this->deleteUser($deletedUser);
                header("Location: ".BASE_URL."/showaccounts?success=accountdeleted");
            } elseif(!isset($_GET['id'])) {
            header("Location: ".BASE_URL);
            } else {
            header("Location: ".BASE_URL."/showaccounts?error=accountdeleted");
            }
        } else {
            header("Location: ".BASE_URL);
        }
    }

    public function editAccount() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin' && !isset($_GET['id'])) {
            $userList = $this->getUsers();
            require_once 'views/admin/editaccount.php';
            return $userList;
        } else if(isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin' && isset($_GET['id'])) {
            $userId = $_GET['id'];
            $user = $this->getUsers($userId);
            require_once 'views/admin/editaccountform.php';
            return $user;
        } else {
            header("Location: ".BASE_URL);
        }

    }

}