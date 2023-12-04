<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client | Profit </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<style>
#emailExists,
#success {
    color: red;
    font-size: 16px;
}

.col-lg-4 {
    width: 33.3333%;
}

.signup-lbl {
    display: block;
    margin-bottom: 5px;
}

.gender-container {
    display: flex;
    align-items: center;
}

.radio-btn {
    margin-left: 5px;
}

.gender-lbl {
    margin-right: 10px;
}

#fname-error,
#lname-error,
#age-error,
#gender-error,
#email-error,
#phoneno-error {
    color: red;
}
</style>

<body>
    <?php 
    session_start();
    require("partials/adminsidebar.php");
    ?>
    <script src="../public/js/addclient_validation.js"></script>
    <div id="add-body" class="addbody">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Add client</h4>
                </div>
                <hr>
                <form method="POST" action="../Controllers/ClientController.php" id="addclient-form">
                    <input type="hidden" name="action" value="addClient">
                    <div class="col-lg-4 col-md-12">
                        <label for="fname">First Name: </label>
                    </div>
                    <input type="text" name="fname" id="fname">
                    <span
                        id="fname-error"><?php echo isset($_SESSION["fnameErr"]) ? $_SESSION["fnameErr"] : ''; ?></span>

                    <div class="col-lg-4 col-md-12">
                        <label for="lname">Last Name: </label>
                    </div>
                    <input type="text" name="lname" id="lname">
                    <span
                        id="lname-error"><?php echo isset($_SESSION["lnameErr"]) ? $_SESSION["lnameErr"] : ''; ?></span>

                    <div class="col-lg-4 col-md-12">
                        <label for="lname">Phone: </label>
                    </div>
                    <input type="text" name="phone" id="phone">
                    <span
                        id="phoneno-error"><?php echo isset($_SESSION["phonenoErr"]) ? $_SESSION["phonenoErr"] : ''; ?></span>

                    <div class="col-lg-4 col-md-12">
                        <label for="age">Age: </label>
                    </div>
                    <input type="text" name="age" id="age">
                    <span id="age-error"><?php echo isset($_SESSION["ageErr"]) ? $_SESSION["ageErr"] : ''; ?></span>

                    <div class="col-lg-4 col-md-12">
                        <label class="signup-lbl" for="">Gender:</label>
                        <div class="gender-container">
                            <input type="radio" id="male" name="gender" value="male" class="radio-btn">
                            <label for="male" class="gender-lbl">Male</label>
                            <input type="radio" id="female" name="gender" value="female" class="radio-btn">
                            <label for="female" class="gender-lbl">Female</label>
                        </div>
                    </div>
                    <span
                        id="gender-error"><?php echo isset($_SESSION["genderErr"]) ? $_SESSION["genderErr"] : ''; ?></span>

                    <div class="col-lg-4 col-md-12">
                        <label for="weight">Weight: </label>
                    </div>
                    <input type="number" name="weight" id="weight">

                    <div class="col-lg-4 col-md-12">
                        <label for="height">Height: </label>
                    </div>
                    <input type="number" name="height" id="height">

                    <div class="col-lg-4 col-md-12">
                        <label for="email">Email: </label>
                    </div>
                    <input type="email" name="email" id="email">
                    <span
                        id="email-error"><?php echo isset($_SESSION["emailErr"]) ? $_SESSION["emailErr"] : ''; ?></span>

                    <br>
                    <div class="col-lg-9 col-md-12">
                        <input type="submit" value="Add client" id="add-btn"
                            style="margin-top:30px; margin-bottom:20px">
                    </div>
                    <span
                        id="emailExists"><?php echo isset ($_SESSION["EmailExist"]) ? ($_SESSION["EmailExist"]) : ''; ?></span>
                    <span
                        id="success"><?php echo isset ($_SESSION["AddedSuccess"]) ? ($_SESSION["AddedSuccess"]) : ''; ?></span>

                </form>
                <?php 
                unset($_SESSION["AddedSuccess"]); 
                unset($_SESSION["EmailExist"]);
                unset($_SESSION["fnameErr"]);
                unset($_SESSION["lnameErr"]);
                unset($_SESSION["ageErr"]);
                unset($_SESSION["genderErr"]);
                unset($_SESSION["phonenoErr"]);
                unset($_SESSION["emailErr"]); 
                ?>

            </div>
        </div>
    </div>




</body>

</html>