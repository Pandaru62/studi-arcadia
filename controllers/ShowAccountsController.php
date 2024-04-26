<?php
// Redirects to the account view for admin
require_once "./models/signup.class.php";

class showAccountsController extends Signup {

    public function showAccounts() {      
        if (isset($_SESSION['userRole']) && $_SESSION['userRole'] == 'admin') {
            $userList = $this->getUsers();
            require_once 'views/admin/showaccounts.php';
            return $userList;
        }
}

}