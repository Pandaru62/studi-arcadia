<?php 
require "../PHPMailer/script.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ContactForm'])) {
    try {

        $subject = htmlspecialchars($_POST["contactTitle"]);
        $email = filter_var($_POST["contactEmail"], FILTER_SANITIZE_EMAIL);
        $message = htmlspecialchars($_POST["contactMessage"]);

        if(empty($subject) || empty($email) || empty($message|| strlen($subject) > 10 || strlen($message) > 100)) {
            header("Location: /studi-arcadia/contact?error=emptyimput");
            throw new Exception("Invalid input");
        } 


        if ($response) {
            header("Location: /studi-arcadia/contact?success=emailsent");
        } else {
            throw new Exception("Error sending email.");
        }
    } catch (Exception $e) {
        header("Location: /studi-arcadia/contact?error=" . urlencode($e->getMessage()));
    }
exit();

}

