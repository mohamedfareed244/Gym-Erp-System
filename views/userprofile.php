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
    <?php include("../partials/usersidebar.php") ?>


    <div class="profile">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="numbertext">1 / 6</div>
                <img src="../public/Images/free_weight.webp" class="imgslides" style="width:700px; height:450px;">
            </div>
            <div class="mySlides fade">
                <div class="numbertext">2 / 6</div>
                <img src="../public/Images/Gym-HD-Desktop.jpg" class="imgslides" style="width:700px; height:450px;">
            </div>
            <div class="mySlides fade">
                <div class="numbertext">3 / 6</div>
                <img src="../public/Images/infopic.jpg" class="imgslides" style="width:700px; height:450px;">
            </div>
            <div class="mySlides fade">
                <div class="numbertext">4 / 6</div>
                <img src="../public/Images/lockers.jpeg" class="imgslides" style="width:700px; height:450px;">
            </div>
            <div class="mySlides fade">
                <div class="numbertext">5 / 6</div>
                <img src="../public/Images/Gym-Images.jpg" class="imgslides" style="width:700px; height:450px;">
            </div>
            <div class="mySlides fade">
                <div class="numbertext">6 / 6</div>
                <img src="../public/Images/cardio_area.jpeg" class="imgslides" style="width:700px; height:450px;">
            </div>
        </div>
        <div class="gettinginshape">
            <p class="line1">GETTING</p>
            <p class="line2">IN</p>
            <p class="line3">SHAPE</p>
        </div>
        <div class="greeting">
            <p class="hello">Hello Jana! </p>
        </div>
        <div class="membership-details">
            <p class="currpackage">Current Package:</p>
            <div class="membership-title">2 MONTHS</div>
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
        </div>
        <h2 class="reminder-title"><i class='bx bxs-bell-ring'></i>REMINDER:</h2>
        <div class="reminders">
            <div class="reminder">
                <p class="class">Class:</p>
                <div class="class-title">YOGA</div>
                <div class="dates">
                    <div class="date">
                        <p>Date:</p>
                        <div class="class-date">21-10-2023</div>
                    </div>
                    <div class="time">
                        <p>Time:</p>
                        <div class="class-time">4:30 - 6:00 p.m</div>
                    </div>
                </div>
            </div>
            <div class="reminder">
                <p class="ptsession">Private training session:</p>
                <p class="ptsession-coach">Coach:</p>
                <div class="ptsession-coachname">Sara Khaled</div>
                <div class="dates">
                    <div class="date">
                        <p>Date:</p>
                        <div class="ptsession-date">26-10-2023</div>
                    </div>
                    <div class="time">
                        <p>Time:</p>
                        <div class="ptsession-time">1:30-3:00 p.m</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="../public/js/slider.js"></script>


</body>
<?php include("../partials/footer.php") ?>


<script src="../public/js/index.js"></script>



</html>