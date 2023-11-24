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
    <!--css/icons/boostrap/jquery/fonts/images end-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>
    #failFree,#failNotFree,#alreadyExistsFree,#alreadyExistsNotFree {
        color: red;
        font-size: 16px;
    }
</style>

</head>
 
<body>
    <!-- usersidebar start -->
    <?php session_start();
    include("partials/usersidebar.php") ?>

    <div class="container py-5" style="padding-bottom:300px;">
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
            <form method="post"  autocomplete="off" id="reserveForm" action="../Controllers/ClassController.php">
            <input type="hidden" name="action" value="reserveClass">
            <input type="text" name="coachid" value="<?php echo $classDetail['CoachID']?>"  style="display:none;">
            <input type="text" name="assignedclassid" value="<?php echo $classDetail['assignedclassID']?>"  style="display:none;">
            <div class="card">
            <img src="../<?php echo $classDetail['imgPath']; ?>" style="width:310px; height:240px;">
                <h3><?php echo $classDetail['Name'] ?></h3>
                <p class="coachname"><strong>Coach Name:</strong> <?php echo $classDetail['employeeName']?></p>
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
                            <input type=text  name="price" value= "<?php echo $classDetail['Price']?>" id="price" style="display:none;">
                            <input type="submit" value="Reserve Class" id="add-btn" class="reserve-class" >
                            <span id="successFree" style="color: green;"><?php echo isset($_SESSION["successFree"][$classDetail['assignedclassID']]) ? $_SESSION["successFree"][$classDetail['assignedclassID']] : ''; ?></span>
                            <span id="failFree"><?php echo isset($_SESSION["failToReserveFree"][$classDetail['assignedclassID']]) ? $_SESSION["failToReserveFree"][$classDetail['assignedclassID']] : ''; ?></span>
                            <span id="alreadyExistsFree"><?php echo isset($_SESSION["alreadyExistsFree"][$classDetail['assignedclassID']]) ? $_SESSION["alreadyExistsFree"][$classDetail['assignedclassID']] : ''; ?></span>
                            <span id="successNotFree" style="color: green;"><?php echo isset($_SESSION["successNotFree"][$classDetail['assignedclassID']]) ? $_SESSION["successNotFree"][$classDetail['assignedclassID']] : ''; ?></span>
                            <span id="failFree"><?php echo isset($_SESSION["failToReserveNotFree"][$classDetail['assignedclassID']]) ? $_SESSION["failToReserveNotFree"][$classDetail['assignedclassID']] : ''; ?></span>
                            <span id="alreadyExistsNotFree"><?php echo isset($_SESSION["alreadyExistsNotFree"][$classDetail['assignedclassID']]) ? $_SESSION["alreadyExistsNotFree"][$classDetail['assignedclassID']] : ''; ?></span>

                        </div>
                    </div>
                </section>
            </div>
                        </form>
                        <?php
            unset(
    $_SESSION["alreadyExistsFree"][$classDetail['assignedclassID']],
    $_SESSION["failToReserveFree"][$classDetail['assignedclassID']],
    $_SESSION["successFree"][$classDetail['assignedclassID']],
    $_SESSION["alreadyExistsNotFree"][$classDetail['assignedclassID']],
    $_SESSION["failToReserveNotFree"][$classDetail['assignedclassID']],
    $_SESSION["successNotFree"][$classDetail['assignedclassID']]

);
?>
            <?php endforeach;?>

        </div>

    </div>
</body>


<!-- <script>
function submitForm() {
    const form = document.getElementById('reserveForm');
    const formData = new FormData(form);

    fetch('../Controllers/ClassController.php', {
        method: 'POST',
        body: formData,
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then(response => response.text())
    .then(data => {

        // Change the URL without reloading the page
        history.pushState({}, '', 'classbooking?reserveClass');
    })
    .catch(error => {
        // Handle errors if any
        console.error('Error:', error);
    });
}

</script> -->


<?php include("partials/footer.php") ?>


</html>