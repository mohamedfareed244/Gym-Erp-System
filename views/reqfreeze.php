<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/usersidebar.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/userprofile.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://kit.fontawesome.com/3472d45ca0.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.come/a076d05399.js"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="../public/js/reqfreeze.js"></script>


</head>

<body>
    <!-- usersidebar start -->
    <?php session_start();

    include("partials/usersidebar.php") ?>


    <div class="profile">

        <div class="greeting">
            <p class="hello-fz"><i class="fas fa-lock"></i> Request to Freeze</p>
        </div>

        <div class="reminders">
            <div class="reminder">
                <?php include_once "../Models/membershipsModel.php";
                include_once "../Models/ClientModel.php";
                include_once "../Models/PackageModel.php";
                include_once "../Models/PackageModel.php";

                $membership = new Memberships();
                $clientId = $_SESSION["ID"];

                $membershipdetails = $membership->getMembership($clientId);
                ?>

            <script>
            var currentDate = new Date();
            var maxDate = new Date(currentDate);
            maxDate.setMonth(currentDate.getMonth() + 3);
          </script>
                <?php foreach ($membershipdetails as $membership): ?>
                    <p class="class">Package:</p>
                    <div class="class-title"><?php echo $membership['Title']; ?></div>

                    <div class="dates">
                        <div class="date">
                            <p>Start Date:</p>
                            <div class="start-date"><?php echo $membership['startDate']; ?></div>
                        </div>
                        <div class="date">
                            <p>End Date:</p>
                            <div class="end-date"><?php echo $membership['endDate']; ?></div>
                        </div>
                    </div>

                    <div class="rem-info">
                        <p>Remaining Freeze Attempts:</p>
                        <p class="actual-rem" id="actual-rem">
                            <?php echo $membership['freezeCount'] . " Days Out of " . $membership['freezeLimit']; ?> Left
                        </p>
                    </div>

                    <div class="freeze-request">
                        <p class="rem-info">Weeks to be Frozen:</p>
                        <input type="number" id="freeze-weeks" min="1"                       
                      max="<?php echo $membership['freezeCount']->$remainingFreezeAttempts; ?>" placeholder="Weeks">
                       <?php echo '<td><button id="freezeBtn-' . $membership->ID . '" class="btn btn-freeze" onclick="showDatePickerModal()">Freeze</button></td>               
                    '; ?>

                            <div class="modal" id="datePickerModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <span class="close-btn" onclick="hideDatePickerModal()">&times;</span>
                                                <div>
                                                    <label for="datepicker">Choose a Date:</label>
                                             <input type="date" id="datepicker" min="<?= date('Y-m-d', strtotime('+1 week')); ?>"
                                            max="<?= date('Y-m-d', strtotime('+3 months')); ?>">
                                        </div>

                        <button id="freeze-button" onclick="freezeMembership(<?php echo $membership->ID ?>)">Submit Request</button>
                        <p id="error-message" class="error-message">Please enter the number of weeks to be frozen.</p>

                    </div>
                <?php endforeach ?> 
            </div>




            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close-popup">&times;</span>
                    <p id="confirmation-text"></p>
                    <button id="confirm-button">Yes</button>
                    <button id="cancel-button">Cancel</button>
                    <p id="modal-message"></p>

                </div>
            </div>


        </div>
    </div>




    <script src="../public/js/slider.js"></script>
    <script src="../public/js/reqfreeze.js"></script>

    <script>
    document.getElementById("freeze-button").addEventListener("click", function() {
        const freezeWeeks = document.getElementById("freeze-weeks").value;

        sendFreezeRequest(freezeWeeks);
    });
    </script>



</body>
<?php include("partials/footer.php") ?>


<script src="../public/js/index.js"></script>



</html>