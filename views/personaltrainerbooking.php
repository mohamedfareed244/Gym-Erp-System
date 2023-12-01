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


    <style>

#confirm-package-button {
    transform: translateX(-85px);
}
        </style>
</head>

<body>
    <!-- usersidebar start -->
    <?php
    session_start();
    include("partials/usersidebar.php");
    ?>
    <?php
    include_once "../Models/ptMembershipsModel.php";
    include_once "../Models/ptPackageModel.php";
    include_once "../Models/EmployeeModel.php";

    $ptpackage = new ptPackages();
    $ptmemberships = ptMemberships::getAllPtMemberships();
    $Employee = new Employee();
    $coaches = $Employee->getAllCoaches(); 
    $ptMembershipsInstance = new ptMemberships();
    $packages = $ptpackage->getAllPtPackagesforClient();
    ?>

    <div class="container py-5">
        <h2 style="font-size: 26px;
    font-weight: bolder;
    text-transform: uppercase;
    color: rgb(176, 37, 37);
    letter-spacing: -1px;
    margin-bottom:3%;">Coaches:</h2>
        <div class="card-container">
            <?php foreach ($coaches as $coachID => $coachName): ?>
                <div class="card">
                    <img src="../public/Images/coach3.jpg" class="imgslides">
                    <?php if (isset($coachName['Name'])): ?>
                        <h3><?php echo $coachName['Name']; ?></h3>
                    <?php else: ?>
                        <h3>Coach Name Not Available</h3>
                    <?php endif; ?>

                    <form method="post" action="bookptpack.php?coachID=<?php echo $coachID; ?>">
                        <!-- <input type="hidden" name="selectedTrainerID" value="<?php echo $coachID; ?>"> -->
                        <button type="submit" id="confirm-package-button">Request</button>
                    </form>

                </div>
            <?php endforeach; ?>
        </div>

        <p id="modal-message"></p>

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

    <?php include("partials/footer.php") ?>
    <script src="../public/js/personaltrainer.js"></script>
    <script>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedTrainerID'])) {
        echo 'window.location.href = "bookptpackage.php?coachID=' . $_POST['selectedTrainerID'] . '";';
    }
    ?>
</script>
</body>

</html>
