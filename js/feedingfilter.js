document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('searchForm');
    const feedingsTbody = document.getElementById('feedings');
    const searchFeedback = document.getElementById('searchFeedback');
    const searchSpecies = document.getElementById('searchSpecies');
    const AtoZbutton = document.getElementById('animalAtoZ');
    const ZtoAbutton = document.getElementById('animalZtoA');
    const dateFromRecent = document.getElementById('dateFromRecent');
    const dateFromOld = document.getElementById('dateFromOld');
    let currentFilteredFeedings = allFeedings; // Store current filtered results

    console.log(allFeedings);
  
    form.addEventListener('submit', (event) => {
      event.preventDefault();
      const animalId = document.getElementById('searchAnimal').value;
      const searchDate = document.getElementById('searchDate').value;
      const specieId = document.getElementById('searchSpecies').value;
  
      // Normalize searchDate if it is provided
      const normalizedSearchDate = searchDate ? new Date(searchDate).toISOString().split('T')[0] : null;
  
      // Filter the feedings using JavaScript
      currentFilteredFeedings = allFeedings.filter(feeding => {
        // Create Date object for feeding.date and normalize
        const feedingDate = new Date(feeding.date);
        const normalizedfeedingDate = feedingDate.toISOString().split('T')[0];
  
        // Filter based on animalId, specieId, and optionally on searchDate
        const matchesAnimalId = feeding.animal_id == animalId || animalId === '';
        const matchesSpeciesId = feeding.species_id == specieId || specieId === '';
        const matchesDate = normalizedSearchDate ? normalizedfeedingDate === normalizedSearchDate : true;
  
        return matchesAnimalId && matchesDate && matchesSpeciesId;
      });
  
      displayFeedings(currentFilteredFeedings);
    });
  
    AtoZbutton.addEventListener('click', () => {
      const sortedFeedings = [...currentFilteredFeedings].sort((a, b) => {
        if (a.animalFirstName < b.animalFirstName) return -1;
        if (a.animalFirstName > b.animalFirstName) return 1;
        return 0;
      });
  
      displayFeedings(sortedFeedings);
    });

    ZtoAbutton.addEventListener('click', () => {
        const sortedFeedings = [...currentFilteredFeedings].sort((a, b) => {
          if (a.animalFirstName < b.animalFirstName) return 1;
          if (a.animalFirstName > b.animalFirstName) return -1;
          return 0;
        });
    
        displayFeedings(sortedFeedings);
      });

      dateFromRecent.addEventListener('click', () => {
        const sortedFeedings = [...currentFilteredFeedings].sort((a, b) => {
          return new Date(b.date) - new Date(a.date);
        });
    
        displayFeedings(sortedFeedings);
      });
    
      dateFromOld.addEventListener('click', () => {
        const sortedFeedings = [...currentFilteredFeedings].sort((a, b) => {
          return new Date(a.date) - new Date(b.date);
        });
    
        displayFeedings(sortedFeedings);
      });
    
  
    function displayFeedings(feedings) {
      feedingsTbody.innerHTML = ''; // Clear previous results
      if (feedings.length > 0) {
        searchFeedback.innerText = `Votre recherche a donné ${feedings.length} résultat(s).`;
  
        feedings.forEach(feeding => {
          const feedingRow = document.createElement('tr');
  
          // Format date into French
          const date = new Date(feeding.date); // Convert string to Date object
          const formattedDate = date.toLocaleDateString('fr-FR', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
          });
  
          feedingRow.innerHTML = `
            <th scope="column">${feeding.first_name} (${feeding.speciesName})</th>
            <td>${formattedDate}</td>
            <td>${feeding.time}</td>
            <td>${feeding.food} (${feeding.quantity} gr.)</td>
          `;
  
          feedingsTbody.appendChild(feedingRow);
        });
      } else {
        searchFeedback.innerText = 'Votre recherche n\'a donné aucun résultat. Veuillez réessayer.';
      }
    }
  });
  