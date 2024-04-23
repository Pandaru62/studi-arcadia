<?php

class LoginContr extends Login {
    private $userEmail;
    private $userPassword;

    public function __construct($userEmail, $userPassword) {
        $this->userEmail = $userEmail;
        $this->userPassword = $userPassword;
    }

    public function loginUser() {
        if($this->emptyInput() == true) {
            // Empty input
            header("location: /studi-arcadia/login?error=emptyinput");
            exit();
        }

    $this->getUser($this->userEmail, $this->userPassword);
        
    }

    private function emptyInput() {
        $isEmpty = null;
        if(empty($this->userEmail) ||empty($this->userPassword)) {
            $isEmpty = true;
        } else {
            $isEmpty = false;
        }
        return $isEmpty;
    }
}