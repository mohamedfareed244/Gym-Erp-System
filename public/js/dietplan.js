


    // Get references to the card elements
    const cards = document.querySelectorAll('.card');

    // Get reference to the details section
    const detailsSection = document.querySelector('#diet-details');
    console.log(detailsSection.style.display);

    // Add a click event listener to each card
    cards.forEach((card) => {
      card.addEventListener('click', () => {
        // Toggle the visibility of the details section
        if (detailsSection.style.display == 'none') {
          detailsSection.style.display = 'block';
        } else {
          detailsSection.style.display = 'none';
        }
      });
    });



