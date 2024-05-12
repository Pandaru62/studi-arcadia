<?php

include_once "signup.class.php";
class SignUpContr extends Signup {

    private $userLastName;
    private $userFirstName;
    private $userEmail;
    private $userPassword;
    private $userRole;

    public function __construct($userLastName = null, $userFirstName = null, $userEmail = null, $userPassword = null, $userRole = null) {        $this->userLastName = $userLastName;
        $this->userFirstName = $userFirstName;
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
        $this->userRole = $userRole;
    }

    public function signupUser() {
        if($this->emptyInput() == true) {
            // Empty input
            header("Location: " .BASE_URL."/signup?error=emptyinput");
            exit();
        }
        if($this->invalidEmail() == true) {
            // Empty input
            header("Location: " .BASE_URL."/signup?error=email");
            exit();
        }

        $this->setUser($this->userLastName, $this->userFirstName, $this->userEmail, $this->userPassword, $this->userRole);
    }


    public function updateUser($userId) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($this->emptyInput() == true) {
                // Empty input
                header("Location: " . BASE_URL ."/editaccount?error=emptyinput");
                exit();
            }
            if ($this->invalidEmail() == true) {
                // Invalid email
                header("Location: " . BASE_URL . "/editaccount?error=email");
                exit();
            }
    
            // Perform update logic
            $this->editUser($userId, $this->userLastName, $this->userFirstName, $this->userEmail, $this->userPassword, $this->userRole);
        } 
    }
    
    private function emptyInput() {
        if (empty($this->userLastName) || empty($this->userFirstName) || empty($this->userEmail) || empty($this->userRole)) {
            return true;
        } else {
            return false;
        }
    }
    private function invalidEmail() {
        $result = false;
        if (!filter_var($this->userEmail, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        return $result;
    }

}