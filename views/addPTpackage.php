<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Package | Profit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addPackage.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php session_start(); ?>
    <!-- <script src="../public/js/addPtPackage.js"></script> -->
    <?php require("partials/adminsidebar.php") ?>
    <div id="add-body" class="addbody">
        <div class="container">
            <h4>Add Private Training Package:</h2>
                <hr>
                <div class="pt row">
                    <form method="post" action="../Controllers/ptPackagesController.php" class="pt row" onsubmit="return validateForm()">
                        <input type="hidden" name="action" value="addPtPackage">
                        <div class="col-lg-4 col-md-12">
                            <label for="package-name"> PT Package Name : </label>
                        </div>
                        <input type="text" name="package-name" id="package-name">
                        <span id="package-name-error"><?php echo isset($_SESSION["packageNameErr"]) ? $_SESSION["packageNameErr"] : ''; ?></span>

                        <div class="col-lg-4 col-md-12">
                            <label for="session-amount">Minimum Membership Months: </label>
                        </div>

                        <input type="number" name="package-min-months" id="package-min-months">
                        <span id="package-min-months-error"><?php echo isset($_SESSION["minMonthsErr"]) ? $_SESSION["minMonthsErr"] : ''; ?></span>

                        <div class="col-lg-4 col-md-12">
                            <label for="session-amount">Number of Sessions: </label>
                        </div>

                        <input type="number" name="package-sessions" id="package-sessions">
                        <span id="package-sessions-error"><?php echo isset($_SESSION["sessionsErr"]) ? $_SESSION["sessionsErr"] : ''; ?></span>

                        <div class="col-lg-4 col-md-12">
                            <label for="package-price"> PT Package Price : </label>
                        </div>

                        <input type="number" name="session-price" id="package-price">
                        <span id="package-price-error"><?php echo isset($_SESSION["packagePriceErr"]) ? $_SESSION["packagePriceErr"] : ''; ?></span>
                        <span id="success"><?php echo isset($_SESSION["success"]) ? $_SESSION["success"] : ''; ?></span>

                        <div class="col-lg-9 col-md-12">
                            <br>
                            <input type="submit" value="Add PT Package" id="add-btn">
                        </div>
                        <br>
                        <br>
                    </form>

                </div>
        </div>
    </div>
    <?php
    unset($_SESSION["packageNameErr"]);
    unset($_SESSION["minMonthsErr"]);
    unset($_SESSION["sessionsErr"]);
    unset($_SESSION["packagePriceErr"]);
    unset($_SESSION["success"]);
    ?>
</body>

</html>