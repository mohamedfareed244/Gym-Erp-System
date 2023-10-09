<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/header.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/register.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->

    <title>ProFit Gym</title>

</head>

<body style="background-color:rgb(31, 31, 31);">
    <!-- include header -->
    <?php
    include("../partials/header.php");
    ?>

    <div id="main-wrapper" class="registercontainer">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Register</h3>
                                    </div>

                                    <h6 class="h5 mb-0" style="color:white;">Welcome!</h6>
                                    <p class="text-muted mt-2 mb-5" style="color:white;">Create an Account.</p>

                                    <form style="width:100%;" action="" method="post">
                                        <div class="form-group mb-5">
                                            <label for="Fname" style="color:white;">First Name</label>
                                            <input type="text" class="form-control" id="exampleInputFname" name="Fname" required>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="Lname" style="color:white;">Last Name</label>
                                            <input type="text" class="form-control" id="exampleInputLname" name="Lname" required>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="Gender" style="color:white;">Gender</label><br>
                                            <input type="radio" id="male" name="gender" value="male">
                                            <label for="male" class="gender">Male</label><br>
                                            <input type="radio" id="female" name="gender" value="female">
                                            <label for="female" class="gender">Female</label><br>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="Age" style="color:white;">Age</label>
                                            <input type="number" class="form-control" id="exampleInputAge" name="Age" required>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="Weight" style="color:white;">Weight <span class="notreq">(Not Required)</span></label>
                                            <input type="number" class="form-control" id="exampleInputWeight" name="Weight" step="any">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="Height" style="color:white;">Height<span class="notreq">(Not Required)</span></label>
                                            <input type="number" class="form-control" id="exampleInputHeight" name="Height" step="any">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="Email" style="color:white;">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail" name="Email" required>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="Password" style="color:white;">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword" name="Password" required>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="ConfPassword" style="color:white;">Confirm Password</label>
                                            <input type="password" class="form-control" id="exampleInputConfPassword" name="ConfPassword" required>
                                        </div>
                                        <button type="submit" class="btn-theme">SIGN UP</button>
                                    </form>
                                    <p class="h7 mt-3 mb-1" style="color:white">Already have an account? <a href="login.php" class="text-primary ml-1">Login</a></p>
                                        
                                </div>
                            </div>

                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <p class="lead text-white">"Push harder than yesterday when you want a different tommorow."</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->


                <!-- end row -->

            </div>
            <!-- end col -->
        </div>
        <!-- Row -->
    </div>

    <?php

    //grap data from user if form was submitted 

    if ($_SERVER["REQUEST_METHOD"] == "POST") { //check if form was submitted
        $Fname = htmlspecialchars($_POST["Fname"]);
        $Lname = htmlspecialchars($_POST["Lname"]);
        $Age = htmlspecialchars($_POST["Age"]);
        $Weight = htmlspecialchars($_POST["Weight"]);
        $Height = htmlspecialchars($_POST["Height"]);
        $Email = htmlspecialchars($_POST["Email"]);
        $Password = htmlspecialchars($_POST["Password"]);
        $ConfPassword = htmlspecialchars($_POST["ConfPassword"]);

        if (isset($_POST["gender"])) {
            $Gender = $_POST["gender"];
        }

        //insert it to database 
        $sql = "insert into users(Fname,Lname,Gender,Age,Weight,Height,Email,Password) 
	values('$Fname','$Lname','$Gender','$Age','$Weight','$Height','$Email','$Password')";
        $result = mysqli_query($conn, $sql);

        echo ($result);
        //redirect the user back to index.php 
        if ($result) {
            header("Location:login.php");
        }
    }

    ?>

</body>

<!-- include footer -->
<?php include("../partials/footer.php") ?>

<script src="../js/index.js"></script>

</html>