<?php

class SignUpContr extends Signup {

    private $userLastName;
    private $userFirstName;
    private $userEmail;
    private $userPassword;
    private $userRole;

    public function __construct($userLastName, $userFirstName, $userEmail, $userPassword, $userRole) {
        $this->userLastName = $userLastName;
        $this->userFirstName = $userFirstName;
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
        $this->userRole = $userRole;
    }

    public function signupUser() {
        if($this->emptyInput() == true) {
            // Empty input
            header("Location: " .BASE_URL."/login?error=emptyinput");
            exit();
        }
        if($this->invalidEmail() == true) {
            // Empty input
            header("Location: " .BASE_URL."/login?error=email");
            exit();
        }

        $this->setUser($this->userLastName, $this->userFirstName, $this->userEmail, $this->userPassword, $this->userRole);
    }

    private function emptyInput() {
        $isEmpty = null;
        if(empty($this->userLastName) || empty($this->userFirstName) || empty($this->userEmail) ||empty($this->userPassword) || empty($this->userRole) ) {
            $isEmpty = true;
        } else {
            $isEmpty = false;
        }
        return $isEmpty;
    }

    private function invalidEmail() {
        $result = false;
        if (!filter_var($this->userEmail, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        return $result;
    }

}