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
</head>

<body>
    <!-- usersidebar start -->
    <?php
    require_once 'sessionusercheck.php';
    include("partials/usersidebar.php");

    include_once "../Models/CoachesModel.php";
    $Coach = new Coach();
    $coaches = $Coach->getAllCoaches(); 
    ?>

    <div class="container py-5">
        <h2 style="font-size: 26px;
        font-weight: bolder;
        text-transform: uppercase;
        color: rgb(176, 37, 37);
        letter-spacing: -1px;
        margin-bottom: 3%;">Coaches:</h2>
        <form method="get" action="bookptpackage.php">
            <div class="card-container">
                <?php foreach ($coaches as $coach): ?>
                <button type="submit" name="CoachID" value="<?php echo $coach['CoachID']; ?>" class="card-button">
                    <div class="card">
                        <?php if (isset($coach)): ?>
                        <img src="<?php echo $coach['Img']; ?>" class="imgslides"style= "width:200px;">
                        <h3><?php echo $coach['Name']; ?></h3>
                        <?php endif; ?>
                    </div>
                </button>
                <?php endforeach; ?>
            </div>
        </form>
    </div>

    <?php include("partials/footer.php") ?>
    <script src="../public/js/personaltrainer.js"></script>
</body>

</html>