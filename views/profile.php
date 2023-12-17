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
    <style>
        div[id$="-error"] {
            color: red;
        }

        #success {
            color: green;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    require("partials/adminsidebar.php");
    ?>

    <div id="add-body" class="addbody">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Profile Settings</h4>
                    <form method="post" action="../Controllers/EmployeeController.php" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="editEmployee">

                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Name: </label>
                        </div>
                        <input type="text" id="name" name="name" placeholder="Name" value="<?php echo isset($_SESSION["Name"]) ?  $_SESSION["Name"]  : ''; ?>">
                        <div id="name-error"><?php echo isset($_SESSION["nameErr"]) ? $_SESSION["nameErr"] : ''; ?>
                        </div>

                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Job Title: </label>
                        </div>
                        <input type="text" id="jobtitle" name="jobtitle" placeholder="Job Title" value="<?php echo isset($_SESSION["JobTitle"]) ?  $_SESSION["JobTitle"]  : ''; ?>" readonly>

                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Salary: </label>
                        </div>
                        <input type="text" id="salary" name="salary" placeholder="Salary" value="<?php echo isset($_SESSION["Salary"]) ?  $_SESSION["Salary"]  : ''; ?>" readonly>

                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Image: </label>
                        </div>
                        <input type="file" name="image">
                        <div id="img-error"><?php echo isset($_SESSION["imgErr"]) ? $_SESSION["imgErr"] : ''; ?>
                        </div>

                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Phone Number: </label>
                        </div>
                        <input type="text" name="phonenumber" id="phonenumber" placeholder="Phone Number" value="<?php echo isset($_SESSION["PhoneNumber"]) ?  $_SESSION["PhoneNumber"]  : ''; ?>">
                        <div id="phoneno-error">
                            <?php echo isset($_SESSION["phonenoErr"]) ? $_SESSION["phonenoErr"] : ''; ?>
                        </div>

                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Email: </label>
                        </div>
                        <input type="email" name="email" id="email" placeholder="Email" value="<?php echo isset($_SESSION["Email"]) ?  $_SESSION["Email"]  : ''; ?>">
                        <div id="email-error">
                            <?php echo isset($_SESSION["emailErr"]) ? $_SESSION["emailErr"] : ''; ?>
                        </div>

                        <div class="col-lg-12 col-sm-12">
                            <label for="name">Address: </label>
                        </div>
                        <input type="text" name="address" id="address" name="address" placeholder="Address" 
                                value="<?php echo isset($_SESSION["Address"]) ?  $_SESSION["Address"]  : ''; ?>">
                        <div id="address-error">
                            <?php echo isset($_SESSION["addressErr"]) ? $_SESSION["addressErr"] : ''; ?>
                        </div>


                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Password: </label>
                        </div>
                        <input type="password" name="password" style="margin-bottom:20px">

                        <div class="col-lg-4 col-sm-12">
                            <label for="name">Confirm Password: </label>
                        </div>
                        <input type="password" name="confpassword" style="margin-bottom:20px">



                        <div id="success">
                            <?php echo isset($_SESSION["success"]) ? $_SESSION["success"] : ''; ?>
                            </span>
                            <br>

                            <div class="col-lg-4 col-sm-12">
                                <input type="submit" value="Update Account" id="add-btn">
                            </div>
                            <br>
                            <br>

                    </form>
                    <?php
                    // Unset specific session variables
                    unset($_SESSION["nameErr"]);
                    unset($_SESSION["imgErr"]);
                    unset($_SESSION["phonenoErr"]);
                    unset($_SESSION["emailErr"]);
                    unset($_SESSION["addressErr"]);
                    unset($_SESSION["success"]);
                    ?>
                </div>
            </div>

        </div>
    </div>

</body>

</html>