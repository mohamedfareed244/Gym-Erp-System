<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/usersidebar.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/userprofile.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/userprofsettings.css">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://kit.fontawesome.com/3472d45ca0.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.come/a076d05399.js"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>



</head>

<body>

<?php
session_start();
?>

    <!-- usersidebar start -->
    <?php include("partials/usersidebar.php") ?>

    <div class="profile">

        <div class="greeting">
            <p class="hello-fz"><i class="fas fa-cog"></i> Profile Settings</p>
        </div>



        <div class="reminders">
            <div class="profile-settings">
                <h2>Edit Your Profile Settings</h2>
                <form id="profile-settings-form" method="POST" action="../Controllers/ClientController.php">
                <input type="hidden" name="action" value="update">
                    <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" placeholder="First Name"
                            value="<?php echo isset( $_SESSION["FName"] ) ?  $_SESSION["FName"]  : ''; ?>">
                        <span class="error" id="firstname-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Last Name"
                            value="<?php echo isset( $_SESSION["LName"] ) ?  $_SESSION["LName"]  : ''; ?>">
                        <span class="error" id="lastname-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="user@gmail.com"
                        value="<?php echo isset( $_SESSION["Email"] ) ?  $_SESSION["Email"]  : ''; ?>">
                        <span class="error" id="email-error"></span>
                    </div>

                    <div class="form-group">
                        <label for="password">New Password:</label>
                        <input type="password" id="password" name="password">
                        <span class="error" id="password-error"></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm New Password:</label>
                        <input type="password" id="confirm-password" name="confirm-password">
                        <span class="error" id="confirm-password-error"></span>
                    </div>
                    <button id="update-profile-button" id="update-button" type="submit">Update Profile</button>
                    <button id="delete-account-button">Delete Account</button>

                </form>
            </div>

            <div id="myModal" class="modal">
                <div class="modal-content">
                    <p id="confirmation-text"></p>
                </div>
            </div>

        </div>
    </div>



</body>
<?php include("partials/footer.php") ?>

<script>
const updateButton = document.getElementById("update-profile-button");


const modal = document.getElementById("myModal");
const confirmationText = document.getElementById("confirmation-text");

function showpopup(message) {
    confirmationText.textContent = message;
    modal.style.display = "block";
}

function resetpopup() {
    modal.style.display = "none";
    confirmationText.textContent = '';
}

updateButton.addEventListener("click", function() {
    resetpopup();
    modal.style.display = "block";
    confirmationText.style.display = "block";
    confirmationText.textContent = "Updated Successfully";

    // Set a timer to hide the modal after 2 seconds (2000 milliseconds)
    setTimeout(function() {
        modal.style.display = "none";
        confirmationText.style.display = "none";
    }, 2000); // 2 seconds


});
</script>



<script src="../public/js/index.js"></script>
<script src="../public/js/userprofsettings.js"></script>





</html>