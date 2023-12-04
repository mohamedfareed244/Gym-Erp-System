<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/usersidebar.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/userprofile.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/memberships.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/bookptpackage.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/packagebooking.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://kit.fontawesome.com/3472d45ca0.js" crossorigin="anonymous"></script>
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
    require_once 'sessionusercheck.php';
    include("partials/usersidebar.php");
    include_once "../Models/ptPackageModel.php";
    include_once "../Models/EmployeeModel.php";


    $ptpackages = new ptPackages();
    $ptpacks = $ptpackages->getAllPtPackagesforClient();
    $Employee = new Employee();
    $coaches = $Employee->getAllCoaches();

    if (isset($_GET['CoachID'])) {
        $CoachID = $_GET['CoachID'];
    }
    $CoachName=$Employee->getCoachNameByID($CoachID);
    ?>


<div class="container py-5">

        <div class="greeting" style=" font-size: 26px;
    font-weight: bolder;
    letter-spacing: -1px;
    margin-bottom:3%;
    margin-left:-120px;">
            <p class="class">Personal Trainer:</p>
            <div class="class-title"><?php echo $CoachName; ?></div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
            <?php foreach ($ptpacks as $ptpackage): ?>
            <form method="post" autocomplete="off" id="addPtMembershipForm"
                action="../Controllers/ptMembershipsController.php">
                <input type="hidden" name="action" value="addPtMembership">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <input value="<?php echo $CoachID; ?>" name="CoachID" style="display:none;">
                            <input value="<?php echo $ptpackage['ID'];?>" name="ptPackageID" style="display:none;">
                            <input value="<?php echo $ptpackage['NumOfSessions'];?>" name="ptPackageSessions"
                                style="display:none;">
                            <input value="<?php echo $ptpackage['MinPackageMonths'];?>" name="PackageMinMonths"
                                style="display:none;">

                            <h4 class="card-title"><?php echo $ptpackage['Name']; ?></h4>

                            <h4 class="card-text">
                                <p>Minimum Membership Months: </p>
                                <p class="actual-rem"><?php echo $ptpackage['MinPackageMonths'];?></p>

                                <p>Number Of Sessions:</p>
                                <p class="actual-rem"><?php echo $ptpackage['NumOfSessions']; ?></p>

                                <p>PT Fees:</p>
                                <p class="actual-rem"><?php echo "For L.E " . $ptpackage['Price'] ?></p>
                            </h6>
                        </div>
                        <div class="d-flex justify-content-around mb-5">
                            <input type="submit" value="Request" id="trainer-booking" class="btn btn-primary" >
                            <div>
                                <span id="success" style="color: green;">
                                    <?php echo isset($_SESSION["ptmembershipsuccess"][$ptpackage['ID']]) ? $_SESSION["ptmembershipsuccess"][$ptpackage['ID']] : ''; ?>
                                </span>
                                <span id="alreadyExists1">
                                    <?php echo isset($_SESSION["alreadyThisptMembershipExists"][$ptpackage['ID']]) ? $_SESSION["alreadyThisptMembershipExists"][$ptpackage['ID']] : ''; ?>
                                </span>
                                <span id="alreadyExists2">
                                    <?php echo isset($_SESSION["alreadyAnotherptMembershipExists"][$ptpackage['ID']]) ? $_SESSION["alreadyAnotherptMembershipExists"][$ptpackage['ID']] : ''; ?>
                                </span>
                                <span id="fail">
                                    <?php echo isset($_SESSION["ptfail"][$ptpackage['ID']]) ? $_SESSION["ptfail"][$ptpackage['ID']] : ''; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </form>
            <?php endforeach; ?>
            <?php
    // Clear session variables after displaying messages for all packages
    unset($_SESSION["ptmembershipsuccess"], $_SESSION["alreadyThisptMembershipExists"], $_SESSION["alreadyAnotherptMembershipExists"], $_SESSION["ptfail"]);
    ?>

        </div>

    </div>


</body>
<?php include("partials/footer.php") ?>


</html>