<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/usersidebar.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/userprofile.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/bookptpackage.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://kit.fontawesome.com/3472d45ca0.js" crossorigin="anonymous"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



</head>

<body>
    <!-- usersidebar start -->
    <?php
    session_start();
     include("partials/usersidebar.php") ?>
         <?php include_once "../Models/ptMembershipsModel.php";
    include_once "../Models/ptPackageModel.php";

    $ptpackage = new ptPackages();
    $ptmemberships = new ptMemberships();

    $packages = $ptpackage->getAllPtPackagesforClient(); 
    
    ?>



    <div class="profile">

        <div class="greeting">
            <p class="class">Personal Trainer:</p>
            <div class="class-title">Sara Maged</div>
        </div>

        <div class="reminders">
            <div class="reminder">
                <div class="class-title">1 Months, 15 Sessions</div>


                <div class="rem-info">
                    <p>Working Days:</p>
                    <p class="actual-rem"> Sat, Mon, Wed, Fri</p>

                    <p>Working Hours:</p>
                    <p class="actual-rem"> 10 AM - 5 PM</p>

                    <p>PT Fees:</p>
                    <p class="actual-rem"> 1500 L.E.</p>
                </div>
                <button id="trainer-booking">Book Now</button>
            </div>



            <div class="reminder">
                <div class="class-title">2 Months, 30 Sessions</div>


                <div class="rem-info">
                    <p>Working Days:</p>
                    <p class="actual-rem"> Sat, Mon, Wed, Fri</p>

                    <p>Working Hours:</p>
                    <p class="actual-rem"> 10 AM - 5 PM</p>

                    <p>PT Fees:</p>
                    <p class="actual-rem"> 3500 L.E.</p>
                </div>
                <button id="trainer-booking">Book Now</button>
            </div>





            <div class="reminder">
                <div class="class-title">4 Months, 40 Sessions</div>


                <div class="rem-info">
                    <p>Working Days:</p>
                    <p class="actual-rem"> Sat, Mon, Wed, Fri</p>

                    <p>Working Hours:</p>
                    <p class="actual-rem"> 10 AM - 5 PM</p>

                    <p>PT Fees:</p>
                    <p class="actual-rem"> 4500 L.E.</p>
                </div>
                <button id="trainer-booking">Book Now</button>
            </div>

        </div>

        <div id="myPopup" class="popup">
            <div class="popup-content">
                <span class="popup-close">&times;</span>
                <p id="popup-confirm"></p>
                <button id="popup-confirm-button">Yes</button>
                <button id="popup-cancel-button">Cancel</button>
                <p id="popup-message"></p>

            </div>
        </div>

    </div>


</body>
<?php include("partials/footer.php") ?>


<script>
const bookBtns = document.querySelectorAll('#trainer-booking');

const popup = document.getElementById("myPopup");
const popupconfirm = document.getElementById("popup-confirm");
const popupconfirmButton = document.getElementById("popup-confirm-button");
const popupcancelButton = document.getElementById("popup-cancel-button");
const popupclose = document.querySelector(".popup-close");
const popupMessage = document.getElementById("popup-message");

function showpopup(message) {
    popupconfirm.textContent = message;
    popup.style.display = "block";
    popupconfirmButton.style.display = "block";
    popupcancelButton.style.display = "block";
    popupMessage.style.display="none";
}

function resetpopup() {
    popup.style.display = "none";
    popupconfirm.textContent = '';
    popupconfirmButton.style.display = "none";
    popupcancelButton.style.display = "none";
}

bookBtns.forEach((bookBtn) => {
    bookBtn.addEventListener('click', () => {
        showpopup("Are you sure you want to book this personal trainer package?");
    });

    popupclose.addEventListener('click', () => {
        resetpopup();
    });

    popupconfirmButton.addEventListener('click', () => {
        resetpopup();
        popupMessage.style.display="block";
        popupMessage.textContent = "Booking personal trainer package successful";
    });

    popupcancelButton.addEventListener("click", () => {
        resetpopup();
    });
});
</script>


</html>