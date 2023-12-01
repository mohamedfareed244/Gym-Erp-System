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
    <?php

    session_start();

    include_once "../Models/ClassesModel.php";
    
    $Classes=new Classes();
    $classes = $Classes->getClientClassInfo();
    
    include("partials/usersidebar.php");?>

    <?php if (is_array($classes) && !empty($classes)) { ?>
    <div class="profile">

        <div class="greeting">
            <p class="hello-classes"><i class="fas fa-calendar"></i> Your Upcoming Classes</p>
        </div>
        <?php foreach ($classes as $class): ?>
        <div class="reminders">
            <div class="reminder">
                <p class="class">Class:</p>
                <div class="class-title"><?php echo $class['className']; ?></div>
                <div class="dates">
                    <div class="time">
                        <p>Time:</p>
                        <div class="class-time">
                            <?php
                            $startTime = new DateTime($class['StartTime']);
                            $endTime = new DateTime($class['EndTime']);
                            
                            // Format the DateTime object as "H:i" (24-hour format)
                            $startformattedDate = $startTime->format("H:i");
                            $endformattedDate = $endTime->format("H:i");

                            echo $startformattedDate . " - " . $endformattedDate . " p.m"; ?></div>
                    </div>

                    <div class="day">
                        <p>Day:</p>
                        <div class="class-day"><?php echo $class['Date'] ?></div>
                    </div>
                </div>

                <div class="rem-info">

                    <p>Coach:</p>
                    <p class="actual-rem"> <?php echo $class['employeeName']; ?></p>

                    <p>Class Fees:</p>
                    <p class="actual-rem"> <?php echo $class['Price'] . " L.E "; ?></p>
                </div>
            </div>
        </div>
        <?php endforeach ?>
        <?php } else{ ?>
            <div class="no-class" style="height:1000px; margin-left:200px;">
            <p class="noclass" style="font-size:24px;">You haven't reserved any classes yet.</p>
        </div>
        <?php } ?>

    </div>




    <script src="../public/js/slider.js"></script>


</body>
<?php include("partials/footer.php") ?>


<script src="../public/js/index.js"></script>



</html>