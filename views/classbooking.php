<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/usersidebar.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/classes.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/classbooking.css">
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

    <div class="container py-5">
        <h2 style=" font-size: 26px;
    font-weight: bolder;
    text-transform: uppercase;
    color: rgb(176, 37, 37);
    letter-spacing: -1px;
    margin-bottom:3%;">Types:</h2>
        <div class="card-container">
            <?php include_once "../Models/ClassesModel.php";
            $class = new Classes();
            $classDetails = $class->getClassDetails();?>
       
            <?php foreach($classDetails as $classDetail): ?>
            <div class="card">
            <img src="../<?php echo $classDetail['imgPath']; ?>" style="width:310px; height:240px;">
                <h3><?php echo $classDetail['Name'] ?></h3>
                <section class="class-details">
                    <div class="class-item">
                        <div class="class-info">
                            <p class="class-time"><strong>Time:</strong> <?php 
                            $startTime = new DateTime($classDetail['StartTime']);
                            $endTime = new DateTime($classDetail['EndTime']);
                            
                            // Format the DateTime object as "H:i" (24-hour format)
                            $startformattedDate = $startTime->format("H:i");
                            $endformattedDate = $endTime->format("H:i");

                            echo $startformattedDate . " - " .  $endformattedDate?></p>
                            <p class="class-date"><strong>Date:</strong> <?php echo $classDetail['Date'] ?></p>
                            <p class="class-participants"><strong>Limit of Participants:</strong> <?php echo $classDetail['NumOfAttendants']?></p>
                            <p class="class-price"><strong>Price :</strong> <?php 
                            if($classDetail['Price'] == 0){
                                 echo "FREE";
                            }
                            else{
                                echo $classDetail['Price'];
                            }?></p>
                            <!-- <div class="class-availability">
                                <p class="availspaces" id="availability-text"><strong>Availability:</strong>
                                    <span id="availability-count">10</span> Places Left
                                </p>
                            </div> -->

                            <button class="reserve-class">Reserve Now</button>

                        </div>
                    </div>
                </section>
            </div>
            <?php endforeach; ?>

        </div>

    </div>
</body>

<script src="../public/js/slider.js"></script>


</body>
<?php include("partials/footer.php") ?>


</html>