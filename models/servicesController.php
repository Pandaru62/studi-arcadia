<?php

require_once "services.class.php";
class ServicesContr extends Services {
    private $serviceName;
    private $serviceDescription;
    private $serviceImage;
    private $isFree;

    public function __construct($serviceName = null, $serviceDescription = null, $serviceImage = null, $isFree = null) {
        $this->serviceName = $serviceName;
        $this->serviceDescription = $serviceDescription;
        $this->serviceImage = $serviceImage;
        $this->isFree = $isFree;
    }

    public function updateService($id) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($this->emptyInput() == true) {
            // Empty input
            header("Location: " .BASE_URL."/editservice?error=emptyinput");
            exit();
        }

        $this->editServices($id, $this->serviceName, $this->serviceDescription, $this->serviceImage, $this->isFree);
    }
}

    public function addService() {
        if($this->emptyInput() == true) {
            // Empty input
            header("Location: " .BASE_URL."/addservice?error=emptyinput");
            exit();
        }
        $this->setService($this->serviceName, $this->serviceDescription, $this->serviceImage, $this->isFree);
    }

    private function emptyInput() {
        if (empty($this->serviceName) || empty($this->serviceDescription)) {
            return true;
        } else {
            return false;
        }
    }
}