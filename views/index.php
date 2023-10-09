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

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->

    <title>ProFit Gym</title>
</head>

<body>
    <!-- navbar start -->
    <?php include("../partials/header.php") ?>
    <!-- header image -->
    <section id="welcome-image">
        <img src="../public/Images/bckgrnd.png" alt="Home Image" class="main-img">
    </section>
    <!-- navbar end -->

    <!-- main content starts -->
    <div class="gridboxes1">
        <div class="box1">
            <h2 style="color: azure;">RECOVERY</h2>
            <p style="color: azure;">Relax and rejuvenate in our recovery facilities.</p>
        </div>
        <div class="box2">
            <h2 style="color: azure;">NUTRITION</h2>
            <p style="color: azure;">A meal plan designed to suit you and your goal.</p>
        </div>

        <div class="box3">
            <h2>WORKOUT</h2>
            <p>With our latest equipments and efficient coaches.</p>
        </div>

    </div>



    <div class="italic-line">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#24262b" fill-opacity="1" d="M0,192L1440,96L1440,320L0,320Z"></path>
        </svg>
        </svg>
    </div>


    <div class="italic-line-data">
        <h1>🙶</h1>
        <p> The hard part isn’t getting your body in shape. The hard part is getting your mind in shape. </p>
    </div>



    <!-- main content end -->


    <!-- info starts -->

    <section id="info">
        <div class="info-content">
            <div class="info-text">
                <h1 class="infoh1">8 YEARS EXPERIENCE</h1>
                <p class="infop">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor aliquam nisi,
                    eu
                    tincidunt ligula bibendum sit amet. Vivamus hendrerit euismod tristique. Nullam in ipsum id orci
                    porta dapibus. Pellentesque feugiat vel nulla eu tempus. Duis non risus vel ligula volutpat
                    suscipit.</p>
            </div>
            <div class="info-image">
                <img src="../public/Images/infopic2.jpg" alt="Image info" class="none-resp-img">
                <img src="../public/Images/infopic.jpg" alt="Image info" class="resp-img">

            </div>
        </div>
    </section>
    
    <!-- include footer -->
    <?php include('../partials/footer.php') ?>

</body>

<script src="/js/index.js"></script>



</html>