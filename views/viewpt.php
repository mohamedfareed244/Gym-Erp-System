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
    <!--css/icons/boostrap/jquery/fonts/images end-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



</head>

<body>
    <!-- usersidebar start -->
    <?php
    session_start();
    include("partials/usersidebar.php");
    include_once "../Models/ptMembershipsModel.php";
    ?>

    <?php
                $ptMemberships= new ptMemberships();
                $PtMemberships = $ptMemberships->getClientPtMembershipInfo();

                if (is_array($PtMemberships) && !empty($PtMemberships)) {
                    foreach ($PtMemberships as $membership) { ?>

                <div class="reminders">
                    <div class="reminder">

                <p class='class'>Personal Trainer:</p>
                <div class='class-title'><?php echo $membership['Name']; ?></div>

                <p class='class'>PT Package:</p>

                <div class='rem-info'>
                    <p>Remaining Sessions:</p>
                    <p class='actual-rem'>
                        <?php echo $membership['SessionsCount'] . " Sessions of " . $membership['NumOfSessions']; ?>
                    </p>

                    <p>PT Fees:</p>
                    <p class='actual-rem'><?php echo $membership['Price']; ?></p>
                </div>

                <?php
                    }
                } else {
                    ?>
                <div class="no-package" style="height:1000px; margin-left:200px;">
                    <p class="nopackage" style="font-size:24px;">No PT packages found.</p>
                </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <?php include("partials/footer.php") ?>
</body>

</html>