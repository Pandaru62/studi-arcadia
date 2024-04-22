<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["contactTitle"];
    $email = $_POST["contactEmail"];
    $message = $_POST["contactMessage"];

    $to = "loris.buchelet@gmail.com";
    $subject = "Arcadia - Nouveau message depuis le site";
    $body = "Title: $title\nEmail: $email\n\n$message";

    // Send email
    if (mail($to, $subject, $body)) {
        echo "Votre message a été envoyé avec succès!";
    } else {
        echo "Erreur lors de l'envoi du mail. Merci de réessayer.";
    }
}