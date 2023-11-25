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
   
   include_once "../Models/membershipsModel.php";
   
   // Call the getClientMembershipInfo function
   $memberships = Memberships::getClientMembershipInfo();
   
   
   include("partials/usersidebar.php");
   ?>
   <?php
 if (is_array($memberships) && !empty($memberships)) {
 foreach ($memberships as $membership): ?>
    <div class="profile">
        
        <div class="greeting">
        <p class="hello-pack"><i class="fas fa-box"></i> Your Package Details</p>
        </div>
        <div class="membership-details">
            <p class="currpackage">Current Package</p>
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

            <div class="rem-info">
                <p>Remaining Invitations:</p>
                <p class="actual-rem"><?php echo $membership['InvitationsCount'] . " Out of " . $membership['NumOfInvitations'] . " Invitations Left"; ?></p>
                <p>Remaining Inbodies:</p>
                <p class="actual-rem"> <?php echo $membership['InbodyCount'] . " Out of " . $membership['NumOfInbodySessions'] . " Inbody Sessions Left"; ?></p>
                <p>Remaining PT Sessions: </p>
                <p class="actual-rem"><?php echo $membership['PrivateTrainingSessionsCount'] . " Out of " . $membership['NumOfPrivateTrainingSessions'] . " Private Training Sessions Left"; ?></p>
                <p>Remaining Freeze Attempts: </p>
                <p class="actual-rem"><?php echo $membership['FreezeCount'] . " Days Out of " . $membership['FreezeLimit'] . " Left" ?></p>



            </div>
        </div>
        <h2 class="reminder-title" style="padding-top: 50px">Package Summary:</h2>
        <p class="pack-sum"> <?= "You're currently subscribed to the " . $membership['NumOfMonths'] . " Months membership package for " . $membership['Price'] . " L.E. You have full access to the gym facilities as you desire anytime. 
        You're also free to attend as many classes as you'd prefer. Please, make sure to reserve first to secure your spot."; ?>
        </p>

    </div>
    <?php endforeach; ?>
    <?php } else{ ?>
        <div class="no-package" style="height:1000px; margin-left:200px;">
            <p class="nopackage" style="font-size:24px;">You aren't subscribed to any package still.</p>
        </div>
    <?php } ?>


</body>
<?php include("partials/footer.php") ?>


<script src="../public/js/index.js"></script>



</html>