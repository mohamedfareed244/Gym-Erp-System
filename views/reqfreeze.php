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
    <?php include("partials/usersidebar.php") ?>


    <div class="profile">

        <div class="greeting">
            <p class="hello-fz"><i class="fas fa-lock"></i> Request to Freeze</p>
        </div>

        <div class="reminders">
            <div class="reminder">
                <p class="class">Package:</p>
                <div class="class-title">2 Months</div>

                <div class="dates">
                    <div class="date">
                        <p>Start Date:</p>
                        <div class="start-date">21-06-2023</div>
                    </div>
                    <div class="date">
                        <p>End Date:</p>
                        <div class="end-date">21-08-2023</div>
                    </div>
                </div>

                <div class="rem-info">
                    <p>Remaining Freeze Attempts:</p>
                    <p class="actual-rem" id="actual-rem"></p>
                </div>

                <div class="freeze-request">
                    <p class="rem-info">Weeks to be Frozen:</p>
                    <input type="number" id="freeze-weeks" min="1" max="5" placeholder="Weeks">
                    <button id="freeze-button">Submit Request</button>
                    <p id="error-message" class="error-message">Please enter the number of weeks to be frozen.</p>

                </div>
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