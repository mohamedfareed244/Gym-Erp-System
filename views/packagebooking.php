<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/usersidebar.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/memberships.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/packagebooking.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/userprofile.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://kit.fontawesome.com/3472d45ca0.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.come/a076d05399.js"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
    #success,
    #fail,
    #alreadyExists1,
    #alreadyExists2 {
        color: red;
        font-size: 16px;
        margin-left:30px;
    }

    .row {
        display: grid;
        grid-template-columns: repeat(2, minmax(270px, 1fr));
    }

    .col {
        width: 70%;
        box-sizing: border-box;
        padding: 5px;
    }
    </style>

</head>

<body>
    <!-- usersidebar start -->
    <?php 
    session_start();
    include("partials/usersidebar.php");?>
    <?php include_once "../Models/PackageModel.php";
    $package = new Package();
    $packages = $package->getAllPackagesforClient();?>
    <div class="container py-5">
        <h2 style=" font-size: 26px;
    font-weight: bolder;
    text-transform: uppercase;
    color: rgb(176, 37, 37);
    letter-spacing: -1px;
    margin-bottom:3%;">Types:</h2>

        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">

            <?php foreach ($packages as $package): ?>
            <form method="post" autocomplete="off" id="addMembershipForm"
                action="../Controllers/MembershipsController.php">
                <input type="hidden" name="action" value="addMembership">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $package['Title']; ?></h5>
                                <input type="text" value="<?php echo $package['ID'];?>" name="PackageID"
                                    style="display:none;">
                                <h6 class="card-text" id="visits"><i
                                        class="fa-regular fa-circle-check"></i><?php echo $package['isVisitsLimited']. " Visits"; ?>
                                </h6>
                                <?php if ($package['isVisitsLimited'] == 'limited') { ?>
                                <h6 class="card-text" id="visitsnum"><i
                                        class="fa-regular fa-circle-check"></i><?php echo $package['VisitsLimit']. " Visits"; ?>
                                </h6>
                                <?php } ?>
                                <h6 class="card-text" id="invitations"><i
                                        class="fa-regular fa-circle-check"></i><?php echo $package['NumOfInvitations']." Invitations" ?>
                                </h6>
                                <h6 class="card-text" id="inbody"><i
                                        class="fa-regular fa-circle-check"></i><?php echo $package['NumOfInbodySessions']. " Inbody Sessions" ?>
                                </h6>
                                <h6 class="card-text" id="ptsessions"><i class="fa-regular fa-circle-check"></i><?php echo $package['NumOfPrivateTrainingSessions'] . " Private
                                Training Sessions"?></h6>
                                <h5 class="card-text" id="price"><?php echo "for L.E " . $package['Price'] ?></h5>
                        </div>
                        <div class="d-flex justify-content-around mb-5">
                            <input type="submit" value="Request" id="add-btn" class="btn btn-primary">
                            <div style ="padding:10px;">
                                <span id="success" style="color: green;">
                                    <?php echo isset($_SESSION["membershipsuccess"][$package['ID']]) ? $_SESSION["membershipsuccess"][$package['ID']] : ''; ?>
                                </span>
                                <span id="alreadyExists1">
                                    <?php echo isset($_SESSION["alreadyThisMembershipExists"][$package['ID']]) ? $_SESSION["alreadyThisMembershipExists"][$package['ID']] : ''; ?>
                                </span>
                                <span id="alreadyExists2">
                                    <?php echo isset($_SESSION["alreadyAnotherMembershipExists"][$package['ID']]) ? $_SESSION["alreadyAnotherMembershipExists"][$package['ID']] : ''; ?>
                                </span>
                                <span id="fail">
                                    <?php echo isset($_SESSION["fail"][$package['ID']]) ? $_SESSION["fail"][$package['ID']] : ''; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php endforeach; ?>

            <?php
// Clear session variables after displaying messages for all packages
unset($_SESSION["membershipsuccess"], $_SESSION["alreadyThisMembershipExists"], $_SESSION["alreadyAnotherMembershipExists"], $_SESSION["fail"]);
?>

        </div>

    </div>

</body>



</body>
<?php include("partials/footer.php") ?>





</html>