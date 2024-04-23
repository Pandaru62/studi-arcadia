<?php

// Redirects to the contact view

require_once "./models/reviews.class.php";

class ContactController extends Reviews {
    use getHabitats;
    public function contact() { 
        $menuHabitats = $this->getHabitats();
        require_once 'views/contact.php';
    }

}