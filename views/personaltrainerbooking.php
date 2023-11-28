<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/usersidebar.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/classes.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/personaltrainerbooking.css">
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
    include_once "../Models/employeeModel.php";


    $ptpackage = new ptPackages();
    $ptmemberships = ptMemberships::getAllPtMemberships();
    $coaches = Employee::getAllCoaches(); // Move this line here
    $ptMembershipsInstance = new ptMemberships();
    $packages = $ptpackage->getAllPtPackagesforClient();

     
        // echo $coachName . '<br>';
       
    

    ?>



    <div class="container py-5">
        <h2 style=" font-size: 26px;
    font-weight: bolder;
    text-transform: uppercase;
    color: rgb(176, 37, 37);
    letter-spacing: -1px;
    margin-bottom:3%;">Coaches:</h2>
        <div class="card-container">

      
        <?php foreach ($coaches as $coachID => $coachName): ?>
    <div class="card">
        <!-- <img src="../public/Images/coach3.jpg" class="imgslides"> -->
        <?php
        if (isset($coachName['Name'])) {
            echo '<h3>' . $coachName['Name'] . '</h3>';
            
        } else {
            echo '<h3>Coach Name Not Available</h3>';
        }
        ?>
    </div>
<?php endforeach; ?>





        </div>

        


        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close-popup">&times;</span>
                <p id="confirmation-text"></p>
                <button id="confirm-package-button">View Packages</button>
                <button id="confirm-free-button">Cancel</button>
                <p id="modal-message"></p>

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

<script src="../public/js/personaltrainer.js"></script>

</html>