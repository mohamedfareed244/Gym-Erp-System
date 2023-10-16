
    // Get references to the card elements
    const cards = document.querySelectorAll('.card');

    const booktrainers = document.querySelectorAll("#trainer-booking");

    console.log("i am in");

    const modal = document.getElementById("myModal");
    const confirmationText = document.getElementById("confirmation-text");
    const confirmFreeButton = document.getElementById("confirm-free-button");
    const confirmPackageButton = document.getElementById("confirm-package-button");
    const closeBtn = document.querySelector(".close-popup");
    const modalMessage = document.getElementById("modal-message");

    const popup = document.getElementById("myPopup");
    const popupconfirm = document.getElementById("popup-confirm");
    const popupconfirmButton = document.getElementById("popup-confirm-button");
    const popupcancelButton = document.getElementById("popup-cancel-button");
    const popupclose = document.querySelector(".popup-close");
    const popupMessage = document.getElementById("popup-message");



    // Get reference to the details section
    const detailsSection = document.querySelector('#all-avail-times');

    // Add a click event listener to each card
    cards.forEach((card) => {
      card.addEventListener('click', () => {
        // Toggle the visibility of the details section


            detailsSection.style.display="block";
            console.log("i am in");
            confirmationText.textContent = "Do you want to book session from your free personal trainer sessions or book a whole package?";
            modal.style.display = "block";
            console.log("i am in");
           
        

        closeBtn.addEventListener('click', () => {
            modal.style.display = "none";
        });

        confirmFreeButton.addEventListener('click', () => {
        if (confirmationText.textContent) {
            
            modal.style.display = "none";
            modalMessage.textContent ="";
            confirmationText.textContent='';

            detailsSection.style.display = 'block';


            booktrainers.forEach((booktrainer) => {
                booktrainer.addEventListener('click', () => {
                    popupconfirm.textContent = `Are you sure you want to book one of your personal trainer sessions?`;
                    popup.style.display = "block";


                    popupclose.addEventListener('click', () => {
                        popup.style.display = "none";
                    });

                    popupconfirmButton.addEventListener('click', () => {
                        if (popupconfirm.textContent) {
                            
                            popup.style.display = "none";
                            popupMessage.textContent= "Booking successful and details will also be sent by mail soon.";
                            popup.style.display = "block";
                            popupconfirm.textContent='';
                            popupconfirmButton.style.display="none";
                            popupcancelButton.style.display="none";
                        }
                    });

                    popupcancelButton.addEventListener("click", () => {
                        if (popupconfirm.textContent) {
                            popup.style.display = "none";
                
                            popupMessage.textContent = "no booking";
                            popup.style.display = "block";
                            popupconfirm.textContent='';
                            popup.style.display = "block";
                            popupconfirmButton.style.display="none";
                            popupcancelButton.style.display="none";
                
                        }
                    });


                    
                });
            });


        }

    });

        confirmPackageButton.addEventListener('click', () => {
        if (confirmationText.textContent) {
            
            modal.style.display = "none";
            confirmationText.textContent='';
            confirmFreeButton.style.display="none";
            confirmPackageButton.style.display="none";

            window.location.href = "bookptpackage.php"; 

        }
        

        });

    });
});


        




    



    