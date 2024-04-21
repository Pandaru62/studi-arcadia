<?php

// NULL
class Feeding extends Dbh {
        private $id;
        private $animal_id;
        private $date;
        private $time;
        private $food;
        private $quantity;

        public function getId()
        {
                return $this->id;
        }

        public function setId($id): self
        {
                $this->id = $id;

                return $this;
        }
        public function getAnimalId()
        {
                return $this->animal_id;
        }

        public function setAnimalId($animal_id): self
        {
                $this->animal_id = $animal_id;

                return $this;
        }

        public function getDate()
        {
                return $this->date;
        }

        public function setDate($date): self
        {
                $this->date = $date;

                return $this;
        }

        public function getTime()
        {
                return $this->time;
        }

        public function setTime($time): self
        {
                $this->time = $time;

                return $this;
        }

        public function getFood()
        {
                return $this->food;
        }

        public function setFood($food): self
        {
                $this->food = $food;

                return $this;
        }

        public function getQuantity()
        {
                return $this->quantity;
        }

        public function setQuantity($quantity): self
        {
                $this->quantity = $quantity;

                return $this;
        }
}