<?php 
require "../PHPMailer/script.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ContactForm'])) {
    if(empty($_POST["contactTitle"]) || empty($_POST["contactEmail"]) || empty($_POST["contactMessage"])) {
        header("Location: /studi-arcadia/contact?error=emptyimput");
        exit();
    } else {
    $subject = $_POST["contactTitle"];
    $email = $_POST["contactEmail"];
    $message = $_POST["contactMessage"];

    $response = sendContactFormMail($email, $subject, $message);
        header("Location: /studi-arcadia/contact?success=emailsent");

        exit();
    }

}

