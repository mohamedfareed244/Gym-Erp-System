<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/usersidebar.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/userprofile.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://kit.fontawesome.com/3472d45ca0.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.come/a076d05399.js"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



</head>

<body>
    <!-- usersidebar start -->
    <?php include("partials/usersidebar.php") ?>


    <div class="profile">

        <div class="greeting">
            <p class="hello-fz"><i class="fas fa-lock"></i> Request to Freeze</p>
        </div>

        <div class="reminders">
            <div class="reminder">
                <p class="class">Package:</p>
                <div class="class-title">2 Months</div>

                <div class="dates">
                    <div class="date">
                        <p>Start Date:</p>
                        <div class="start-date">21-06-2023</div>
                    </div>
                    <div class="date">
                        <p>End Date:</p>
                        <div class="end-date">21-08-2023</div>
                    </div>
                </div>

                <div class="rem-info">
                    <p>Remaining Freeze Attempts:</p>
                    <p class="actual-rem">5 Weeks Out of 5 Left</p>
                </div>

                <div class="freeze-request">
                    <p class="rem-info">Weeks to be Frozen:</p>
                    <input type="number" id="freeze-weeks" min="1" max="5" placeholder="Weeks">
                    <button id="freeze-button">Submit Request</button>
                    <p id="error-message" class="error-message">Please enter a number between 1 and 5.</p>

                </div>
            </div>




            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close-popup">&times;</span>
                    <p id="confirmation-text"></p>
                    <button id="confirm-button">Yes</button>
                    <button id="cancel-button">Cancel</button>
                    <p id="modal-message"></p>

                </div>
            </div>


        </div>
    </div>




    <script src="../public/js/slider.js"></script>
    <script>
    const freezeButton = document.getElementById("freeze-button");
    const freezeWeeksInput = document.getElementById("freeze-weeks");
    const remainingFreezeAttempts = 5; // To be fetched from the database later on

    const modal = document.getElementById("myModal");
    const confirmationText = document.getElementById("confirmation-text");
    const confirmButton = document.getElementById("confirm-button");
    const cancelButton = document.getElementById("cancel-button");
    const closeBtn = document.querySelector(".close-popup");
    const errorMessage = document.getElementById("error-message");
    const modalMessage = document.getElementById("modal-message");

    function showmodal(message) {
        confirmationText.textContent = message;
        modal.style.display = "block";
        confirmButton.style.display = "block";
        cancelButton.style.display = "block";
        closeBtn.style.display = "block";
        modalMessage.style.display = "none";
    }

    function resetmodal() {
        modal.style.display = "none";
        confirmationText.textContent = '';
        confirmButton.style.display = "none";
        cancelButton.style.display = "none";
        closeBtn.style.display = "none";
        modalMessage.style.display = "none";
    }

    let isFrozen = false; // Track if the freeze button is already pressed

    freezeButton.addEventListener("click", function() {
        const freezeWeeks = freezeWeeksInput.value;
        if (isFrozen) {
            // Show modal message instead of the whole modal
            showmodal("Your request is submitted, and you will receive a confirmation email.");
            confirmButton.style.display = "none";
        cancelButton.style.display = "none";
        } else if (freezeWeeks !== '' && parseInt(freezeWeeks) >= 1 && parseInt(freezeWeeks) <=
            remainingFreezeAttempts) {
            showmodal(`Are you sure you want to freeze ${freezeWeeks} weeks?`);
            isFrozen = true; // Set the freeze button state to pressed
        } else {
            errorMessage.style.display = "block";
            modal.style.display = "none";
        }
    });


    closeBtn.addEventListener("click", function() {
        resetmodal();
    });

    confirmButton.addEventListener("click", function() {
        if (confirmationText.textContent) {
            resetmodal();

            modal.style.display = "block";
            modalMessage.style.display = "block";
            modalMessage.textContent = "Your request is submitted, and you will receive a confirmation email.";

            // Set a timer to hide the modal after 2 seconds (2000 milliseconds)
            setTimeout(function() {
                modal.style.display = "none";
                modalMessage.style.display = "none";
            }, 2000); // 2 seconds


        }

    });

    cancelButton.addEventListener("click", function() {
        if (confirmationText.textContent) {
            resetmodal();

            modal.style.display = "block";
            modalMessage.style.display = "block";
            modalMessage.textContent = "No request submitted.";

            // Set a timer to hide the modal after 2 seconds (2000 milliseconds)
            setTimeout(function() {
                modal.style.display = "none";
                modalMessage.style.display = "none";
            }, 2000); // 2 seconds


        }
    });
    </script>



</body>
<?php include("partials/footer.php") ?>


<script src="../public/js/index.js"></script>



</html>