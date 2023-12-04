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
    require_once 'sessionusercheck.php';
    include("partials/usersidebar.php") ?>

    <div class="profile">

        <div class="greeting">
            <p class="hello-fz"><i class="fas fa-cog"></i> Profile Settings</p>
        </div>



        <div class="reminders">
            <div class="profile-settings">
                <h2>Edit Your Profile Settings</h2>
                <form id="profile-settings-form" method="POST" action="../Controllers/ClientController.php">
                <input type="hidden" name="action" id="action" value="update">
                    <div class="form-group">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" placeholder="First Name"
                            value="<?php echo isset( $_SESSION["FName"] ) ?  $_SESSION["FName"]  : ''; ?>">
                    </div>
                    <span id="fname-error"><?php echo isset($_SESSION["fnameErr"]) ? $_SESSION["fnameErr"] : ''; ?></span>
                    <div class="form-group">
                        <label for="lastname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Last Name"
                            value="<?php echo isset( $_SESSION["LName"] ) ?  $_SESSION["LName"]  : ''; ?>">
                    </div>
                    <span id="lname-error"><?php echo isset($_SESSION["lnameErr"]) ? $_SESSION["lnameErr"] : ''; ?></span>
                    <div class="form-group">
                        <label for="phoneno">Last Name:</label>
                        <input type="text" id="phone" name="phone" placeholder="Phone Number"
                            value="<?php echo isset( $_SESSION["Phone"] ) ?  $_SESSION["Phone"]  : ''; ?>">
                    </div>
                    <span id="phoneno-error"><?php echo isset($_SESSION["phonenoErr"]) ? $_SESSION["phonenoErr"] : ''; ?></span>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="user@gmail.com"
                        value="<?php echo isset( $_SESSION["Email"] ) ?  $_SESSION["Email"]  : ''; ?>">
                    </div>
                    <span id="email-error"><?php echo isset($_SESSION["emailErr"]) ? $_SESSION["emailErr"] : ''; ?></span>
                    <div class="form-group">
                        <label for="password">New Password:</label>
                        <input type="password" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm New Password:</label>
                        <input type="password" id="confirm-password" name="confirm-password">
                    </div>
                    <span id="all-error"><?php echo isset($_SESSION["allErr"]) ? $_SESSION["allErr"] : ''; ?></span> 
                    <span id="success"><?php echo isset($_SESSION["succ"]) ? $_SESSION["succ"] : ''; ?></span> 
                    <div>
                    <button id="update-profile-button" id="update-button" type="submit">Update Profile</button>
                    <button id="delete-account-button">Delete Account</button>
                    </div>

                </form>
                <?php
                // Unset specific session variables for errors
                unset($_SESSION["fnameErr"]);
                unset($_SESSION["lnameErr"]);
                unset($_SESSION["phonenoErr"]);
                unset($_SESSION["emailErr"]);
                unset($_SESSION["allErr"]);
                unset($_SESSION["succ"]);
                ?>

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
const deleteButton = document.getElementById("delete-account-button");
const actionInput = document.getElementById("action");

updateButton.addEventListener("click", function (event) {
    actionInput.value = "update";
});

deleteButton.addEventListener("click", function (event) {
    actionInput.value = "delete";
});
// const updateButton = document.getElementById("update-profile-button");


// const modal = document.getElementById("myModal");
// const confirmationText = document.getElementById("confirmation-text");

// function showpopup(message) {
//     confirmationText.textContent = message;
//     modal.style.display = "block";
// }

// function resetpopup() {
//     modal.style.display = "none";
//     confirmationText.textContent = '';
// }

// updateButton.addEventListener("click", function() {
//     resetpopup();
//     modal.style.display = "block";
//     confirmationText.style.display = "block";
//     confirmationText.textContent = "Updated Successfully";

//     // Set a timer to hide the modal after 2 seconds (2000 milliseconds)
//     setTimeout(function() {
//         modal.style.display = "none";
//         confirmationText.style.display = "none";
//     }, 2000); // 2 seconds


// });
</script>



<script src="../public/js/index.js"></script>
<script src="../public/js/userprofsettings.js"></script>





</html>