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
    include("partials/usersidebar.php");
    include_once "../Models/ptPackageModel.php";
    include_once "../Models/EmployeeModel.php";


    $ptpackages = new ptPackages();
    $ptpacks = $ptpackages->getAllPtPackagesforClient();
    $Employee = new Employee();
    $coaches = $Employee->getAllCoaches();

    if (isset($_GET['CoachID'])) {
        $CoachID = $_GET['CoachID'];
    }
    $CoachName=$Employee->getCoachNameByID($CoachID);
    ?>


    <div class="profile">

         <div class="greeting">
            <p class="class">Personal Trainer:</p>
            <div class="class-title"><?php echo $CoachName; ?></p></div>
        </div> 

        <div class="reminders">
    <?php foreach ($ptpacks as $ptpackage): ?>
                    <div class="reminder">
                        <div class="class-title"><?php echo $ptpackage['Name']; ?></div>

                        <div class="rem-info">
                            <p>Number Of Sessions:</p>
                            <p class="actual-rem"><?php echo $ptpackage['NumOfSessions']; ?></p>

                            <p>PT Fees:</p>
                            <p class="actual-rem"><?php echo "For L.E " . $ptpackage['Price'] ?></p>
                        </div>
                        <div class="d-flex justify-content-around mb-5">
                                <input type="submit" value="Request" id="trainer-booking" class="btn btn-primary">
                                <div style ="padding:10px;">
                                    <span id="success" style="color: green;">
                                        <?php echo isset($_SESSION["membershipsuccess"][$ptpackage['ID']]) ? $_SESSION["membershipsuccess"][$ptpackage['ID']] : ''; ?>
                                    </span>
                                    <span id="alreadyExists1">
                                        <?php echo isset($_SESSION["alreadyThisMembershipExists"][$ptpackage['ID']]) ? $_SESSION["alreadyThisMembershipExists"][$ptpackage['ID']] : ''; ?>
                                    </span>
                                    <span id="alreadyExists2">
                                        <?php echo isset($_SESSION["alreadyAnotherMembershipExists"][$ptpackage['ID']]) ? $_SESSION["alreadyAnotherMembershipExists"][$ptpackage['ID']] : ''; ?>
                                    </span>
                                    <span id="fail">
                                        <?php echo isset($_SESSION["fail"][$ptpackage['ID']]) ? $_SESSION["fail"][$ptpackage['ID']] : ''; ?>
                                    </span>
                                </div>
                            </div>
                        <!-- <button id="trainer-booking">Request</button> -->
                    </div>
                    <br>
    <?php endforeach; ?>
    <?php
    // Clear session variables after displaying messages for all packages
    unset($_SESSION["membershipsuccess"], $_SESSION["alreadyThisMembershipExists"], $_SESSION["alreadyAnotherMembershipExists"], $_SESSION["fail"]);
    ?>

</div>

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