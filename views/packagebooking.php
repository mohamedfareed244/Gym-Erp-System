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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://kit.fontawesome.com/3472d45ca0.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.come/a076d05399.js"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



</head>

<body>
    <!-- usersidebar start -->
    <?php include("partials/usersidebar.php") ?>
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
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $package['Title']; ?></h5>
                            <h6 class="card-text" id="visits"><i class="fa-regular fa-circle-check"></i><?php echo $package['isVisitsLimited']. " Visits"; ?>
                            </h6>
                            <?php if ($package['isVisitsLimited'] == 'limited') { ?>
                            <h6 class="card-text" id="visitsnum"><i class="fa-regular fa-circle-check"></i><?php echo $package['VisitsLimit']. " Visits"; ?>
                            </h6>
                            <?php } ?>
                            <h6 class="card-text" id="invitations"><i class="fa-regular fa-circle-check"></i><?php echo $package['NumOfInvitations']." Invitations" ?>
                                </h6>
                            <h6 class="card-text" id="inbody"><i class="fa-regular fa-circle-check"></i><?php echo $package['NumOfInbodySessions']. " Inbody Sessions" ?></h6>
                            <h6 class="card-text" id="ptsessions"><i class="fa-regular fa-circle-check"></i><?php echo $package['NumOfPrivateTrainingSessions'] . " Private
                                Training Sessions"?></h6>
                            <h5 class="card-text" id="price"><?php echo "for L.E " . $package['Price'] ?></h5>
                    </div>
                    <div class="d-flex justify-content-around mb-5">
                        <button class="btn btn-primary">REQUEST SUBSCRIPTION</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            

        </div>

    </div>

</body>

<script src="../public/js/slider.js"></script>


</body>
<?php include("partials/footer.php") ?>





</html>