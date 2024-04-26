<?php
// Redirects to the account editor view for admin
require_once "./models/signup.class.php";

class EditAccountController extends Signup {

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

