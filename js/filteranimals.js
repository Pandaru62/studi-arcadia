// linked with see_animals.php


// older version 
document.getElementById("searchSpeciesBar").addEventListener("input", function() {
    var searchValue = this.value.toLowerCase();
    var rows = document.querySelectorAll("#speciesTable tbody tr");

    rows.forEach(function(row) {
        var species = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
        if (species.includes(searchValue)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
});