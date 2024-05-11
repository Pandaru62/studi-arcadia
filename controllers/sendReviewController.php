<?php
session_start();
require_once "../models/reviews.class.php";
require_once "../models/habitat.class.php";

class SendReviewController extends Reviews {
    use getHabitats;
    public function sendReview() {
        try {
            if($_SERVER['REQUEST_METHOD'] === "POST") {
                $pseudo = trim($_POST['visitorPseudo']);
                $review = trim($_POST['visitorReview']);
            
                if (empty($pseudo) || empty($review)) {
                    throw new Exception("Les deux champs doivent être complétés.");
                } else {
                    $pseudo = htmlspecialchars($pseudo);
                    $review = htmlspecialchars($review);
                    
                    // Insert review
                    $review = $this->insertReview($pseudo, $review, false);
                    
                    if ($review) {
                        $_SESSION['success'] = "Votre avis a bien été envoyé.";
                    } else {
                        throw new Exception("Votre avis n'a pas pu être envoyé. Veuillez réessayer.");
                    }
                }
            }
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
        }
        
        // Redirect after setting session variables
        header("Location: " .BASE_URL. "/review");
        exit();
    }
        
}

