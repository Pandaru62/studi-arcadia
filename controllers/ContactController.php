<?php

// Redirects to the contact view

require_once "./models/reviews.class.php";

class ContactController extends Reviews {

    public function contact() { 
        require_once 'views/contact.php';
    }

}