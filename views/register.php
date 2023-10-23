<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../public/CSS/header.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/register.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script> -->
    <!--css/icons/boostrap/jquery/fonts/images end-->

    <title>ProFit Gym</title>



</head>

<?php


include_once "../includes/dbh.inc.php";


$fnameErr = $lnameErr = $ageErr = $genderErr = $emailErr = $passwordErr = ""; // Initialize error variables

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $isValid = true;
    // Validate the "First Name" field
    if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
        $isValid = false;
    }
    else{
        $fname=$_POST['fname'];
        if(!preg_match("/^[a-zA-Z ]*$/",$fname)){
            $fnameErr="Only alphabets and white space are allowed";
            $isValid = false;
        }
    }


// Validate the "Last Name" field
    if (empty($_POST["lname"])) {
        $lnameErr = "Last Name is required";
        $isValid = false;
    }

    // Validate the "Age" field
    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
        $isValid = false;
    } elseif (!filter_var($_POST["age"], FILTER_VALIDATE_INT, array("options" => array("min_range" => 16, "max_range" => 100)))) {
        $ageErr = "Invalid age. Must be between 16 and 100.";
        $isValid = false;
    }

    // Validate the "Gender" field
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
        $isValid = false;
    }

    $email = htmlspecialchars($_POST["email"]);
    // Validate the "Email" field
    $checkEmailQuery = "SELECT * FROM client WHERE Email = '$email'";
    $result = mysqli_query($conn, $checkEmailQuery);
    
    if (mysqli_num_rows($result) > 0) {
        // Email already exists, display an error message
        $emailErr = "This email is already registered.";
        $isValid = false;
    } else if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $isValid = false;
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $isValid = false;
    }

 if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
    $isValid = false;
} elseif (strlen($_POST["password"]) < 6) {
    $passwordErr = "Password must be at least 6 characters long";
    $isValid = false;
} 


 // Check if there are no validation errors
 if ($isValid) {

    // Validation successful, save data to the database
    $Fname = htmlspecialchars($_POST["fname"]);
    $Lname = htmlspecialchars($_POST["lname"]);
    $Age = htmlspecialchars($_POST["age"]);
    $Gender = htmlspecialchars($_POST["gender"]);
    $Email = htmlspecialchars($_POST["email"]);
    $Password = htmlspecialchars($_POST["password"]);

    if (!empty($_POST["weight"])) {
        $Weight = htmlspecialchars($_POST["weight"]);
    } else {
        $Weight = '';  // Set to an empty string
    }
    
    if (!empty($_POST["height"])) {
        $Height = htmlspecialchars($_POST["height"]);
    } else {
        $Height = '';  // Set to an empty string
    }

     $sql = "insert into client(FirstName,LastName,Age,Gender,Weight,Height,Email,Password) 
    values('$Fname','$Lname','$Age','$Gender','$Weight','$Height','$Email','$Password')";
    
    $result=mysqli_query($conn,$sql);

    if ($result) {
        // Data inserted successfully
        header("Location:index.php");
        exit();
    }
}
 

}


?>

<body>
    <!-- include header -->
    <?php include("../partials/header.php") ?>
    <div class="signup-container">
        <div class="signup-form1">
            <form method="post" autocomplete="off" id="signup-form">
                <h3 class="signup-title">Create An Account</h3>
                <div class="signup-input-container">
                    <input type="text" name="fname" id="fname" class="signup-input" />
                    <label class="signup-lbl" for="">First Name</label>
                    <span>First Name</span>
                </div>
                <span id="fname-error"><?php echo $fnameErr; ?></span>
                <div class="signup-input-container">
                    <input type="text" name="lname" id="lname" class="signup-input" />
                    <label class="signup-lbl" for="">Last Name</label>
                    <span>Last Name</span>
                </div>
                <span id="lname-error"><?php echo $lnameErr; ?></span>
                <div class="signup-input-container">
                    <input type="number" name="age" id="age" class="signup-input" min="16" max="100" />
                    <label class="signup-lbl" for="">Age</label>
                    <span>Age</span>
                </div>
                <span id="age-error"></span>
                <div class="signup-input-container">
                    <label class="signup-lbl" for="">Gender</label>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male" class="gender-lbl">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female" class="gender-lbl">Female</label><br>

                </div>
                <span id="gender-error"><?php echo $genderErr; ?></span>
                <div class="signup-input-container">
                    <input type="number" name="weight" id="weight" class="signup-input" min="40" max="250" />
                    <label class="signup-lbl" for="">Weight</label>
                    <span>Weight</span>
                </div>
                <div class="signup-input-container">
                    <input type="number" name="height" id="height" class="signup-input" min="140" max="250" />
                    <label class="signup-lbl" for="">Height</label>
                    <span>Height</span>
                </div>
                <div class="signup-input-container">
                    <input type="email" name="email" id="email" class="signup-input" />
                    <label class="signup-lbl" for="">Email</label>
                    <span>Email</span>
                </div>
                <span id="email-error"><?php echo $emailErr; ?></span>
                <div class="signup-input-container">
                    <input type="password" name="password" id="password" class="signup-input" />
                    <label class="signup-lbl" for="">Password</label>
                    <span>Password</span>
                </div>
                <span id="password-error"><?php echo $passwordErr; ?></span>
                <input type="submit" name="submit" value="Create Account" class="signup-btn" />
            </form>
        </div>

    </div>


    <script src="../public/js/signup_validation.js"></script>

    <!-- include footer -->
    <?php include("../partials/footer.php") ?>


</body>



<script>
const inputs = document.querySelectorAll(".signup-input");

function focusFunc() {
    let parent = this.parentNode;
    parent.classList.add("focus");
}

function blurFunc() {
    let parent = this.parentNode;
    if (this.value == "") {
        parent.classList.remove("focus");
    }
}

inputs.forEach((input) => {
    input.addEventListener("focus", focusFunc);
    input.addEventListener("blur", blurFunc);
});
</script>

</html>