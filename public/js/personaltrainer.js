
    // Get references to the card elements
    const cards = document.querySelectorAll('.card');

    const booktrainers = document.querySelectorAll("#trainer-booking");
    console.log(booktrainers);

    console.log("i am in");

    const modal = document.getElementById("myModal");
    const confirmationText = document.getElementById("confirmation-text");
    const confirmFreeButton = document.getElementById("confirm-free-button");
    const confirmPackageButton = document.getElementById("confirm-package-button");
    const closeBtn = document.querySelector(".close-popup");
    const modalMessage = document.getElementById("modal-message");

    // Get reference to the details section
    const detailsSection = document.querySelector('#all-avail-times');
    console.log(detailsSection.style.display);

    // Add a click event listener to each card
    cards.forEach((card) => {
      card.addEventListener('click', () => {
        // Toggle the visibility of the details section
        if (detailsSection.style.display == 'none') {
          detailsSection.style.display = 'block';


          console.log("i am in");

          booktrainers.forEach((booktrainer) => {
        booktrainer.addEventListener('click', () => {
            console.log("i am in");
            confirmationText.textContent = `Do you want to book session from your free personal trainer session or book a whole package?`;
            modal.style.display = "block";
        

        closeBtn.addEventListener('click', () => {
            modal.style.display = "none";
        });

        confirmFreeButton.addEventListener('click', () => {
        if (confirmationText.textContent) {
            
            modal.style.display = "none";
            confirmationText.textContent='';
            confirmFreeButton.style.display="none";
            confirmPackageButton.style.display="none";
            cancelButton.style.display="none";

            window.location.href = "freepersonaltrainersession.php"; 


        }

    });

        confirmPackageButton.addEventListener('click', () => {
        if (confirmationText.textContent) {
            
            modal.style.display = "none";
            confirmationText.textContent='';
            confirmFreeButton.style.display="none";
            confirmPackageButton.style.display="none";
            cancelButton.style.display="none";

            window.location.href = "personaltrainerpackage.php"; 


        }

        });

    });
});
        } 
        
        else {
          detailsSection.style.display = 'none';
        }
      });
    });



    