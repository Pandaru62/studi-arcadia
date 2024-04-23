<?php
if(isset($_POST["loginForm"])) {
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];

    include "../models/login.class.php";
    include "../models/loginContr.class.php";
    $signup = new LoginContr($userEmail, $userPassword);

    $signup->loginUser();

    header("location: /studi-arcadia/login?error=none");
}