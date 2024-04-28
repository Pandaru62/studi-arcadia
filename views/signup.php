<?php


if(isset($_POST["signupForm"])) {
    $userLastName = $_POST["userLastName"];
    $userFirstName = $_POST["userFirstName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $userRole = $_POST["userRole"];

    // include "../models/Dbh.php";
    include "../models/signup.class.php";
    include "../models/signupController.php";
    $signup = new SignUpContr($userLastName, $userFirstName, $userEmail, $userPassword, $userRole);

    $signup->signupUser();

    header("location: /studi-arcadia/signup?success=userAdded");
}