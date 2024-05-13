<?php
require_once "./templates/header.php"; 
?>


<div class="container mb-4 py-3">

    <section id="seeHabitatsComments">

        <div class="row bg-arc-mint-green pt-3 mt-1">

            <h2>Consulter les derniers commentaires envoyés concernant les habitats.</h2>
                   
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="searchCommentsBar" class="form-label">Recherche par habitat</label>
                    <input type="text" id="searchCommentsBar" class="form-control" placeholder="ex. 'Marais'">
                </div>
            </div>
        </div>
        
        <div class="row bg-arc-mint-green pt-3 mb-1">

            <div class="table-responsive">
                <table class="table table-success table-striped align-middle" id="HabitatCommentsTable">
                    <thead class="table-dark fw-bold">
                        <tr class=" text-center">
                            <td>Auteur</td>
                            <td>Habitat concerné</td>
                            <td>Description</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($comments as $comment): ?>
                        <tr class="text-center">
                            <td><?=$comment['first_name'].' '.$comment['last_name']?></td>
                            <td><?=$comment['name']?></td>
                            <td><?=$comment['comment']?></td>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>

<script>
  // JavaScript to filter data based on search input
  document.getElementById("searchCommentsBar").addEventListener("input", function() {
    var searchValue = this.value.toLowerCase();
    var rows = document.querySelectorAll("#HabitatCommentsTable tbody tr");
    
    rows.forEach(function(row) {
      var habitat = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
      
      if (habitat.includes(searchValue)) {
        row.style.display = "";
      } else {
        row.style.display = "none";
      }
    });
  });
</script>

<?php require_once "./templates/footer.php"; ?>
