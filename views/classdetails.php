<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/header.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3472d45ca0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js">
    <script src="https://kit.fontawesome.come/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->

    <title>ProFit Gym</title>
</head>

<body>
    <!-- navbar start -->
    <?php include("../partials/header.php") ?>
    <!-- header image -->
    <section id="welcome-image">
        <img src="../public/Images/bckgrnd2.jpg" alt="Home Image" class="main-img">
    </section>
    <!-- navbar end -->


<!-- class details -->
<section class="class-details">
    <div class="class-item">
        <div class="class-image">
            <img src="../public/Images/Gym-Images.jpg" alt="Class Image">
        </div>
        <div class="class-info">
            <h2 class="class-name">Yoga Class</h2>
            <p class="class-instructor"><strong>Instructor:</strong> Malouka</p>
            <p class="class-time"><strong>Time:</strong> 7:00 AM - 8:30 AM</p>
            <p class="class-date"><strong>Date:</strong> Every Monday and Wednesday</p>
            <p class="class-participants"><strong>Limit of Participants:</strong> 20</p>
            <p class="class-level"><strong>Level:</strong> Moderate</p>

        </div>
    </div>
</section>



    <!-- include footer -->
    <?php include('../partials/footer.php') ?>

</body>

<script src="../public/js/index.js"></script>



</html>