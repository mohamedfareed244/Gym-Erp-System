<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../public/CSS/header.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addMenu.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->

    <title>ProFit Gym</title>
</head>

<body>

    <!-- include header -->
    <?php include("partials/header.php") ?>

    <?php
    require_once("../Controllers/Controller.php");
    require_once("../Models/NavbarModel.php");
    require_once("../Controllers/NavbarController.php");
    ?>
    <div class="contact-container">
        <img src="img/shape.png" class="square" alt="" />
        <div class="contact-form1">
            <div class="contact-info">
                <h3 class="contact-title">Menu item list</h3>
</div>
            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form method="POST" action="../Controllers/NavbarController.php" autocomplete="off">
                    <h3 class="contact-title">Add a menu option</h3>
                    <div class="contact-input-container">
                        <input type="text" name="menu_name" class="contact-input" />
                        <label for="" class="contact-lbl">Menu item title</label>
                        <span>Menu item title</span>
                    </div>
                    <div class="contact-input-container">
                        <input type="text" name="menu_icon" class="contact-input" />
                        <label class="contact-lbl" for="">Menu item icon</label>
                        <span>Menu item icon</span>
                    </div>
                   
                    <input name="menu_submit" type="submit" value="Add" class="contact-btn" />
                </form>
            </div>
        </div>
    </div>
    <script src="../public/js/contactus.js"></script>

    <!-- include footer -->
    <?php include("partials/footer.php") ?>
</body>

</html>