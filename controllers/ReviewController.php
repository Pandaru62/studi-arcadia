<?php

class ReviewController extends Habitats {
    public function review() {
        $menuHabitats = $this->getHabitats();
        require_once "./views/review.php";
    }
}
