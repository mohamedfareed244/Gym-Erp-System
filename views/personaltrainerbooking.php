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

    $ptpackage = new ptPackages();
    $ptmemberships = new ptMemberships();

    $packages = $ptpackage->getAllPtPackagesforClient(); ?>



    <div class="container py-5">
        <h2 style=" font-size: 26px;
    font-weight: bolder;
    text-transform: uppercase;
    color: rgb(176, 37, 37);
    letter-spacing: -1px;
    margin-bottom:3%;">Coaches:</h2>
        <div class="card-container">

        <?php foreach ($ptmemberships as $ptmembership): ?>

            <div class="card">
                <img src="../public/Images/coach3.jpg" class="imgslides">
                <h3><?php echo $ptmembership->getCoachNames()?></h3>
            </div>

           
        </div>

        <div class="all-avail-times" id="all-avail-times">
            <h2 class="avail-times" style=" font-size: 26px;
    font-weight: bolder;
    text-transform: uppercase;
    color: rgb(176, 37, 37);
    letter-spacing: -1px;
    margin-bottom:3%;">Available Times:</h2>
            <div class="slider">
                <div class="available-times">
                <div class="day" style="height:10%;">Wednesday, 25th of October 2023</div>
                    <div class="dates">
                        <div class="date">
                            <p>From:</p>
                            <div class="time">9:30 p.m</div>
                        </div>
                        <div class="date">
                            <p>To:</p>
                            <div class="end-date">11:00 p.m</div>
                        </div>
                        <button id="trainer-booking">Book Now</button>
                    </div>
                    <div class="dates">
                        <div class="date">
                            <p>From:</p>
                            <div class="time">1:30 p.m</div>
                        </div>
                        <div class="date">
                            <p>To:</p>
                            <div class="end-date">3:00 p.m</div>
                        </div>
                        <button id="trainer-booking">Book Now</button>
                    </div>
                    <div class="dates">
                        <div class="date">
                            <p>From:</p>
                            <div class="time">5:30 p.m</div>
                        </div>
                        <div class="date">
                            <p>To:</p>
                            <div class="end-date">7:00 p.m</div>
                        </div>
                        <button id="trainer-booking">Book Now</button>
                    </div>
                </div>
                <div class="available-times">
                <div class="day" style="height:10%;">Sunday, 29th of October 2023</div>
                    <div class="dates">
                        <div class="date">
                            <p>From:</p>
                            <div class="time">9:30 p.m</div>
                        </div>
                        <div class="date">
                            <p>To:</p>
                            <div class="end-date">11:00 p.m</div>
                        </div>
                        <button id="trainer-booking">Book Now</button>
                    </div>
                    <div class="dates">
                        <div class="date">
                            <p>From:</p>
                            <div class="time">1:30 p.m</div>
                        </div>
                        <div class="date">
                            <p>To:</p>
                            <div class="end-date">3:00 p.m</div>
                        </div>
                        <button id="trainer-booking">Book Now</button>
                    </div>
                    <div class="dates">
                        <div class="date">
                            <p>From:</p>
                            <div class="time">5:30 p.m</div>
                        </div>
                        <div class="date">
                            <p>To:</p>
                            <div class="end-date">7:00 p.m</div>
                        </div>
                        <button id="trainer-booking">Book Now</button>
                    </div>
                </div>
            </div>
            <div class="slider-controls">
        <button class="prev-slide">&#8249;</button>
        <button class="next-slide">&#8250;</button>
    </div>
        </div>


        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close-popup">&times;</span>
                <p id="confirmation-text"></p>
                <button id="confirm-free-button">Free</button>
                <button id="confirm-package-button">Package</button>
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