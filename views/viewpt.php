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
    require_once 'sessionusercheck.php';
    include("partials/usersidebar.php");
    include_once "../Models/ptMembershipsModel.php";
    ?>

    <?php
                $ptMemberships= new ptMemberships();
                $PtMemberships = $ptMemberships->getClientPtMembershipInfo();

                if (is_array($PtMemberships) && !empty($PtMemberships)) {
                    foreach ($PtMemberships as $membership) { 
                    if( $membership['SessionsCount'] != 0) : ?>

    <div class="greeting">
        <p class="hello-pack"><i class="fas fa-box"></i> Your PT Package Details</p>
    </div>
    <div style="height:700px;">
        <div class="reminders">
            <div class="reminder">

                <p class='class'>Cuurent PT Package</p>

                <p class='class'>Personal Trainer:</p>
                <div class='class-title'><?php echo $membership['Name']; ?></div>

                <div class='rem-info'>
                    <p>Remaining Sessions:</p>
                    <p class='actual-rem'>
                        <?php echo $membership['SessionsCount'] . " Sessions of " . $membership['NumOfSessions']; ?>
                    </p>

                    <p>PT Fees:</p>
                    <p class='actual-rem'><?php echo $membership['Price']; ?></p>
                </div>

                <?php
                endif;
                    }
                } else {
                    ?>
                <div class="no-package" style="height:700px; margin-left:200px;">
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