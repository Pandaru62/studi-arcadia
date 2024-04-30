<?php

// Redirects to the account editor view for admin
require_once "./models/signup.class.php";

class DeleteAccountController extends Signup {

    public function deleteAccount() {      
        
        if(isset($_SESSION) && $_SESSION["userRole"] == "admin" && isset($_GET['id'])) {
            $deletedUser = $_GET['id'];
            $delete = $this->deleteUser($deletedUser);
            header("Location: ".BASE_URL."/showaccounts?success=accountdeleted");
        } elseif(!isset($_GET['id'])) {
            header("Location: ".BASE_URL);
        } else {
            header("Location: ".BASE_URL."/showaccounts?error=accountdeleted");
        }
    }
}

