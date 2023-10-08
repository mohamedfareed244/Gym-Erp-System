<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />                
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />       
        <link rel="icon" type="image/x-icon" href="../public/Images/dfav.png" />

        
        <link rel="stylesheet" type="text/css" href="../public/CSS/index.css">
        <link rel="stylesheet" type="text/css" href="../public/CSS/login.css">
        <link rel="stylesheet" type="text/css" href="../public/CSS/register.css">

    <!-- to access font awesome cdn icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                      
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />       
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="../public/Images/dfav.png" />
  

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ProFit Gym</title>

</head>

<body style="background-color:rgb(31, 31, 31);">
    <!-- include header -->
<?php include ("../partials/header.php") ?>

<div id="main-wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="mb-5">
                                    <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                </div>

                                <h6 class="h5 mb-0" style="color:white;">Welcome!</h6>
                                <p class="text-muted mt-2 mb-5" style="color:white;">Create an Account.</p>

                                <form style="width:100%;">
                                    <div class="form-group mb-5">
                                        <label for="Fname" style="color:white;">First Name</label>
                                        <input type="text" class="form-control" id="exampleInputFname" required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="Lname" style="color:white;">Last Name</label>
                                        <input type="text" class="form-control" id="exampleInputLname" required>
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
                                        <input type="number" class="form-control" id="exampleInputAge" required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="Weight" style="color:white;">Weight <span class="notreq">(Not Required)</span></label>
                                        <input type="number" class="form-control" id="exampleInputWeight" step="any">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="Height" style="color:white;">Height<span class="notreq">(Not Required)</span></label>
                                        <input type="number" class="form-control" id="exampleInputHeight" step="any">
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="Email" style="color:white;">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail" required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="Password" style="color:white;">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword" required>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label for="ConfPassword" style="color:white;">Confirm Password</label>
                                        <input type="password" class="form-control" id="exampleInputConfPassword" required>
                                    </div>
                                    <button type="submit" class="btn-theme">SIGN UP</button>
                                </form>
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

            <p class="register">Already have an account? <a href="login.php" class="text-primary ml-1">Login</a></p>

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>




</body>

<!-- include footer -->
<?php include ("../partials/footer.php") ?>



<script src="../js/index.js">

</script>



</html>