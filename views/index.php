<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->

    <title>ProFit Gym</title>
</head>

<body>
    <!-- navbar start -->
    <?php include("../partials/header.php") ?>
    <!-- header image -->
    <section id="welcome-image">
        <img src="../public/Images/bckgrnd.jpg" alt="Home Image" class="main-img">
    </section>
    <!-- navbar end -->

    <!-- main content starts -->
    <div class="gridboxes1">
        <div class="box1" style="background-color:#dfdede;">
            <h2>WORKOUT</h2>
            <p>With our latest equipments and efficient coaches.</p>
        </div>
        <div class="box2" style="background-color:#cb3737;">
            <h2 style="color: azure;">NUTRITION</h2>
            <p style="color: azure;">A meal plan designed to suit you and your goal.</p>
        </div>
    </div>
    <!-- main content end -->

</body>

<script src="/js/index.js"></script>

<!-- include footer -->
<?php include('../partials/footer.php') ?>

</html>