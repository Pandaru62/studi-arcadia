<?php

class ReviewController {
    use getHabitats;
    public function Review() {
        $menuHabitats = $this->getHabitats();
        require_once "./views/review.php";
    }
}
