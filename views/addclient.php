<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client | Profit </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/CSS/adminsidebar.css?v=<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/addclient.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<style>
    #emailExists,#error,#success{
        color:red;
        font-size:16px;
    }
</style>

<body>
    <?php 
    session_start();
    require("partials/adminsidebar.php");
   
    ?>

    <div id="add-body" class="addbody">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Add client</h4>
                </div>
                <hr>
                <form method="POST" action="../Controllers/ClientController.php">
                    <input type="hidden" name="action" value="addClient">
                    <div class="col-lg-4 col-md-12">
                        <label for="fname">First Name: </label>
                    </div>
                    <input type="text" name="fname" id="fname">

                    <div class="col-lg-4 col-md-12">
                        <label for="lname">Last Name: </label>
                    </div>
                    <input type="text" name="lname" id="lname">
                    <div class="col-lg-4 col-md-12">
                        <label for="lname">Phone: </label>
                    </div>
                    <input type="text" name="phone" id="phone">
                    <div class="col-lg-4 col-md-12">
                        <label for="age">Age: </label>
                    </div>
                    <input type="text" name="age" id="age">

                    <div class="col-lg-4 col-md-12">
                        <label for="gender">Gender: </label>
                    </div>
                    <input type="text" name="gender" id="gender">

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
                    <br>
                    <div class="col-lg-9 col-md-12">
                        <input type="submit" value="Add client" id="add-btn" style="margin-top:30px; margin-bottom:20px">
                    </div>
                    <span id="emailExists"><?php echo isset ($_SESSION["EmailExist"]) ? ($_SESSION["EmailExist"]) : ''; ?></span>
                    <span id="success"><?php echo isset ($_SESSION["AddedSuccess"]) ? ($_SESSION["AddedSuccess"]) : ''; ?></span>
                    <span id="error"><?php echo isset ($_SESSION["Error"]) ? ($_SESSION["Error"]) : ''; ?></span>

                </form>
                <?php unset($_SESSION["AddedSuccess"]); ?>
                <?php unset($_SESSION["EmailExist"]); ?>
                <?php unset($_SESSION["Error"]); ?>

            </div>
        </div>
    </div>




</body>

</html>