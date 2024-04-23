<?php
// Redirects to the habitats view

class HabitatsController extends Habitats {

    public function habitats() { 
        $menuHabitats = $this->getHabitats();
        require_once 'views/habitats.php';
    }

}