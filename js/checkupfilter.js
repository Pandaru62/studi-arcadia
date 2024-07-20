document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('searchForm');
    const checkupsTbody = document.getElementById('checkups');
    const searchFeedback = document.getElementById('searchFeedback');
    const AtoZbutton = document.getElementById('animalAtoZ');
    const ZtoAbutton = document.getElementById('animalZtoA');
    const dateFromRecent = document.getElementById('dateFromRecent');
    const dateFromOld = document.getElementById('dateFromOld');
    let currentFilteredCheckups = allCheckups; // Store current filtered results
  
    form.addEventListener('submit', (event) => {
      event.preventDefault();
      const animalId = document.getElementById('searchAnimal').value;
      const searchDate = document.getElementById('searchDate').value;
      const specieId = document.getElementById('searchSpecies').value;
  
      // Normalize searchDate if provided
      const normalizedSearchDate = searchDate ? new Date(searchDate).toISOString() : null;
  
      // Filter the checkups using JavaScript
      currentFilteredCheckups = allCheckups.filter(checkup => { 
      // Create Date object for checkup.date and normalize
        const checkupDate = new Date(checkup.date);
        const normalizedCheckupDate = checkupDate.toISOString();

      return ((checkup.animal_id == animalId || animalId === '') && (normalizedSearchDate ? normalizedCheckupDate === normalizedSearchDate : true) && (checkup.species_id == specieId || specieId === ''));

      });

      displayCheckups(currentFilteredCheckups);
    });
  
    AtoZbutton.addEventListener('click', () => {
      const sortedCheckups = [...currentFilteredCheckups].sort((a, b) => {
        if (a.animalFirstName < b.animalFirstName) return -1;
        if (a.animalFirstName > b.animalFirstName) return 1;
        return 0;
      });
  
      displayCheckups(sortedCheckups);
    });

    ZtoAbutton.addEventListener('click', () => {
        const sortedCheckups = [...currentFilteredCheckups].sort((a, b) => {
          if (a.animalFirstName < b.animalFirstName) return 1;
          if (a.animalFirstName > b.animalFirstName) return -1;
          return 0;
        });
    
        displayCheckups(sortedCheckups);
      });

      dateFromRecent.addEventListener('click', () => {
        const sortedCheckups = [...currentFilteredCheckups].sort((a, b) => {
          return new Date(b.date) - new Date(a.date);
        });
    
        displayCheckups(sortedCheckups);
      });
    
      dateFromOld.addEventListener('click', () => {
        const sortedCheckups = [...currentFilteredCheckups].sort((a, b) => {
          return new Date(a.date) - new Date(b.date);
        });
    
        displayCheckups(sortedCheckups);
      });
    
  
    function displayCheckups(checkups) {
      checkupsTbody.innerHTML = ''; // Clear previous results
      if (checkups.length > 0) {
        searchFeedback.innerText = `Votre recherche a donné ${checkups.length} résultat(s).`;
  
        checkups.forEach(checkup => {
          const checkupRow = document.createElement('tr');
  
          // Format date into French
          const date = new Date(checkup.date);
          const formattedDate = date.toLocaleDateString('fr-FR', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
          });
  
          checkupRow.innerHTML = `
            <th scope="column">${checkup.animalFirstName} (${checkup.speciesName})</th>
            <td>${formattedDate}</td>
            <td>${checkup.health}</td>
            <td>${checkup.food} (${checkup.food_quantity} gr.)</td>
            <td>${checkup.userFirstName} ${checkup.userLastName}</td>
            <td>${checkup.opinion}</td>
          `;
  
          checkupsTbody.appendChild(checkupRow);
        });
      } else {
        searchFeedback.innerText = 'Votre recherche n\'a donné aucun résultat. Veuillez réessayer.';
      }
    }
  });
  