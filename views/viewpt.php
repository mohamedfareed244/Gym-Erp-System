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

        <div class="greeting">
            <p class="hello-pt"><i class="fas fa-user"></i> Your Personal Trainer</p>
        </div>

        <div class="reminders">
            <div class="reminder">
                <p class="class">Personal Trainer:</p>
                <div class="class-title">Sara Maged</div>

                <p class="class">PT Package:</p>
                <div class="class-title">2 Months, 30 Sessions</div>


                <div class="rem-info">
                    <p>Remaining Sessions:</p>
                    <p class="actual-rem"> 17 Sessions of 30</p>

                    <p>Working Days:</p>
                    <p class="actual-rem"> Sat, Mon, Wed, Fri</p>

                    <p>Working Hours:</p>
                    <p class="actual-rem"> 10 AM - 5 PM</p>

                    <p>PT Fees:</p>
                    <p class="actual-rem"> 1500 L.E.</p>
                </div>
            </div>



        </div>
    </div>



    <script src="../public/js/slider.js"></script>


</body>
<?php include("../partials/footer.php") ?>


<script src="../public/js/index.js"></script>



</html>