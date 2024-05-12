<?php

class SeeFeedingController extends Feeding {
    use getAllAnimals;
    
    public function seeFeeding() {

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
            // retrieve the names of the animals for the select in the search bar

            $animals = $this->getAllAnimals();



            // default values
            $currentPage = 1;
            $currentOffset = 0;
            $filter = "none";
            $sort = "datenew";

            if(!isset($_GET['pp']) || !isset($_GET['sort']) || !isset($_GET['filter'])) { 
                // sends default values if there's a missing GET argument
                header("Location: ".BASE_URL."/seefeeding?filter=".$filter."&sort=".$sort."&pp=".$currentPage);

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
                    $numberFeeding = $this->countAllFeeding();
                } else {
                    $numberFeeding = $this->countFilteredFeeding($sort, $filter, $id);
                }

                if ($numberFeeding % $limit === 0) {
                    $pagesNumber = ($numberFeeding/$limit);
                } elseif($numberFeeding < $limit) {
                    $pagesNumber = 1;
                } else {
                    $pagesNumber = ceil($numberFeeding/$limit);
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
                    header("Location: ".BASE_URL."/seefeeding?filter=none&sort=datenew&pp=1");
                }

                // adapting the pages
                $previousPage = $currentPage -1;
                $nextPage = $currentPage +1;

                if($filter == 'none') {
                    $feedings = $this->getAllFeeding($limit, $currentOffset, $sort);
                } else {
                    $feedings = $this->getFeedingFiltered($limit, $currentOffset, $sort, $filter, $id);
                }

                 // format dates
            
                foreach($feedings as $key => $feeding) {
                    $feedings[$key]['date'] = formatDate($feeding['date']);
                }

        
                require_once "./views/vet/seefeedingdetails.php";
                return $feeding;

            } // end if pp / sort / filters

        } else { // if user not logged in
            header("Location: ".BASE_URL);
        }

    }  // end function

} // end of class
    
        

            
