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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--css/icons/boostrap/jquery/fonts/images end-->


    <style>
    @media (max-width: 1084px) {
        .reminders {
            flex-wrap: wrap;

            /* width:570px */
        }

        .membership-details {
            width: 300px;
        }

        .slideshow-container {
            display: none;
        }
    }
    </style>

</head>


<body>
    <!-- usersidebar start -->
    <?php 
    session_start();
   
    include_once "../Models/membershipsModel.php";
    include_once "../Models/ClassesModel.php";
    
    $memberships = Memberships::getClientMembershipInfo();
    $Classes = new Classes();
    $classes = $Classes->getClientClassInfo();

    include("partials/usersidebar.php"); ?>


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
        <div class="greeting">
            <p class="hello">Hello <?php echo $_SESSION["FName"]; ?>! </p>
        </div>
        <?php
         // Check if $memberships is an array before using foreach
        if (is_array($memberships) && !empty($memberships)) {
        foreach ($memberships as $membership):
            ?>
        <div class="membership-details">
            <p class="currpackage">Current Package:</p>
            <div class="membership-title"><?php echo $membership['Title']; ?></div>
            <div class="dates">
                <div class="date">
                    <p>Start Date:</p>
                    <div class="start-date"><?php echo $membership['StartDate']; ?></div>
                </div>
                <div class="date">
                    <p>End Date:</p>
                    <div class="end-date"><?php echo $membership['EndDate']; ?></div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php } ?>
        <?php
         // Check if $memberships is an array before using foreach
        if (is_array($classes) && !empty($classes)) { ?>
        <h2 class="reminder-title"><i class='bx bxs-bell-ring'></i>REMINDER:</h2>
        <div class="reminders">
            <?php foreach ($classes as $class): ?>
            <div class="reminder">
                <p class="class">Class:</p>
                <div class="class-title"><?php echo $class['className']; ?></div>
                <div class="dates">
                    <div class="date">
                        <p>Date:</p>
                        <div class="class-date"><?php echo $class['Date'] ?></div>
                    </div>
                    <div class="time">
                        <p>Time:</p>
                        <div class="class-time">
                            <?php
                            $startTime = new DateTime($class['StartTime']);
                            $endTime = new DateTime($class['EndTime']);
                            
                            // Format the DateTime object as "H:i" (24-hour format)
                            $startformattedDate = $startTime->format("H:i");
                            $endformattedDate = $endTime->format("H:i");

                            echo $startformattedDate . " - " . $endformattedDate . " p.m"; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php } ?>
            <!-- <div class="reminder">
                <p class="ptsession">Private training package:</p>
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
            </div> -->
        </div>
    </div>



    <script src="../public/js/slider.js"></script>


</body>
<?php include("partials/footer.php") ?>


<script src="../public/js/index.js"></script>



</html>