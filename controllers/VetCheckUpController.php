<?php
// Redirects to the check up view for vets

require_once "./models/animal.class.php";
require_once "./models/checkup.class.php";


class VetCheckUpController extends CheckUp {
    use getAllAnimals;
    public function addCheckUp() { 
        if (isset($_SESSION['userRole']) && ($_SESSION['userRole'] == 'admin' || $_SESSION['userRole'] == 'vétérinaire')) {
            if(isset($_GET['animal'])) {
                $animalCheckId = $_GET['animal'];
            }
        $animals = $this->getAllAnimals();
        require_once './views/vet/addCheckUpForm.php';
        } 
        else {
            header("Location: ".BASE_URL);
        }
    }

    public function seeCheckUp() { 
        function formatDate($dateString) {
            $date = DateTime::createFromFormat('Y-m-d', $dateString);
            if ($date !== false) {
                $formattedDate = $date->format("d/m/Y");
                return $formattedDate; // Output: 01/05/2024
            } else {
                return "?";
            }
        }

        if (isset($_SESSION['userRole'])) {
            // when a user is logged in

            // retrieve the names of the animals for the select in the search bar
            $animals = $this->getAllAnimals();

            // default values
            $currentPage = 1;
            $currentOffset = 0;
            $filter = "none";
            $sort = "datenew";
            if(!isset($_GET['pp']) || !isset($_GET['sort']) || !isset($_GET['filter'])) { 
                // sends default values if there's a missing GET argument
                header("Location: ".BASE_URL."/seecheckup?filter=".$filter."&sort=".$sort."&pp=".$currentPage);

            } else { // if pp,sort, and filter are correctly given

                // retrieving filter
                $filter = $_GET['filter'];

                // retrieving the num to get the animal id or date for the filters
                if($filter == 'animal') {
                    if(isset($_GET['num'])) {
                        $id = $_GET['num'];
                    } else {
                        $id = 1;
                    }

                } elseif ($_GET['filter'] == 'date') {
                    if(isset($_GET['num'])) {
                        $id = $_GET['num'];
                    } else {
                        $id = 2024-05-02;
                    }
                }

                //  retrieving sorting method
                $sort = $_GET['sort'];

                // Counting number of pages required

                $limit = 20;
                if($filter == 'none') { 
                    $numberCheckUp = $this->countAllCheckUp();
                } else {
                    $numberCheckUp = $this->countFilteredCheckUp($sort, $filter, $id);
                }

                if ($numberCheckUp % $limit === 0) {
                    $pagesNumber = ($numberCheckUp/$limit);
                } elseif($numberCheckUp < $limit) {
                    $pagesNumber = 1;
                } else {
                    $pagesNumber = ceil($numberCheckUp/$limit);
                }
                
                // set up page and offset with a 20 limit / page

                if($_GET['pp']>=1 && $_GET['pp']<=$pagesNumber) {
                    $currentPage = $_GET['pp'];
                    if($currentPage == 1) {
                        $currentOffset = 0;
                    } else {
                        $currentOffset = ($_GET['pp']-1)*$limit;
                    }
                } else {
                    // if page doesn't exist => default values
                    header("Location: ".BASE_URL."/seecheckup?filter=none&sort=datenew&pp=1");
                }

                // adapting the pages
                $previousPage = $currentPage -1;
                $nextPage = $currentPage +1;

                if($filter == 'none') {
                    $checkUps = $this->getAllCheckUp($limit, $currentOffset, $sort);
                } else {
                    $checkUps = $this->getCheckUpFiltered($limit, $currentOffset, $sort, $filter, $id);
                }

                // format dates
                
                foreach($checkUps as $key => $checkUp) {
                    $checkUps[$key]['date'] = formatDate($checkUp['date']);
                }

                require_once './views/seecheckup.php';
                return $checkUps;
                
            
            }    // end if there's pp, filter, and sort
            
        } else { // if it's not a user
                header("Location: ".BASE_URL);
            }

    } // end seeCheckUp


}// end of class