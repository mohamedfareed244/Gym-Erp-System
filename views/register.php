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
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script> -->
    <!--css/icons/boostrap/jquery/fonts/images end-->

    <title>ProFit Gym</title>



</head>

<body>
    <!-- include header -->
    <?php include("../partials/header.php") ?>
    <div class="signup-container">
        <div class="signup-form1">
            <form action="post" autocomplete="off" id="signup-form">
                <h3 class="signup-title">Create An Account</h3>
                <div class="signup-input-container">
                    <input type="text" name="fname" id="fname" class="signup-input"  />
                    <label class="signup-lbl" for="">First Name</label>
                    <span>First Name</span>
                </div>
                <span class="fname-error"></span>
                <div class="signup-input-container">
                    <input type="text" name="lname" id="lname" class="signup-input"  />
                    <label class="signup-lbl" for="">Last Name</label>
                    <span>Last Name</span>
                </div>
                <span class="lname-error"></span>
                <div class="signup-input-container">
                    <input type="number" name="age" id="age" class="signup-input"  min="16" max="100"  />
                    <label class="signup-lbl" for="">Age</label>
                    <span>Age</span>
                </div>
                <span class="age-error"></span>
                <div class="signup-input-container">
                    <label class="signup-lbl" for="">Gender</label>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male" class="gender-lbl">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female" class="gender-lbl">Female</label><br>

                </div>
                <span class="gender-error"></span>
                <div class="signup-input-container">
                    <input type="number" name="weight" id="weight" class="signup-input"  min="40" max="250" />
                    <label class="signup-lbl" for="">Weight</label>
                    <span>Weight</span>
                </div>
                <div class="signup-input-container">
                    <input type="number" name="height" id="height" class="signup-input" min="140" max="250" />
                    <label class="signup-lbl" for="">Height</label>
                    <span>Height</span>
                </div>
                <div class="signup-input-container">
                    <input type="email" name="email" id="email" class="signup-input"  />
                    <label class="signup-lbl" for="">Email</label>
                    <span>Email</span>
                </div>
                <span class="email-error"></span>
                <div class="signup-input-container">
                    <input type="password" name="password" id="password" class="signup-input" />
                    <label class="signup-lbl" for="">Password</label>
                    <span>Password</span>
                </div>
                <span class="password-error"></span>
                <input type="submit" name="submit" value="Create Account" class="signup-btn" />
            </form>
        </div>

    </div>


     <!-- Include necessary JavaScript/jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
     <script>
    $(document).ready(function () {
        $("#signup-form").submit(function (event) {
            event.preventDefault(); // Prevent the default form submission

            // Create a JavaScript object to store the form data
            var formData = {
                fname: $("#fname").val(),
                lname: $("#lname").val(),
                age: $("#age").val(),
                gender: $("input[name='gender']:checked").val(),
                email: $("#email").val(),
                password: $("#password").val()
            };

            // Send an AJAX request to the server
            $.ajax({
                type: "POST",
                url: "signup_validation.php", // Replace with the actual path to your PHP script
                data: formData,
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        // Check if the form validation was successful
                        if (response.insertion_success) {
                            // Form validation and database insertion are successful
                            // You can redirect to a success page or perform other actions
                            window.location.href = "success.php"; // Replace with your success page URL
                        } else {
                            // Handle the case when database insertion fails
                            alert("Database insertion failed. Please try again.");
                        }
                    } else {
                        // Display form validation errors
                        $(".fname-error").text(response.errors.fname);
                        $(".lname-error").text(response.errors.lname);
                        $(".age-error").text(response.errors.age);
                        $(".gender-error").text(response.errors.gender);
                        $(".email-error").text(response.errors.email);
                        $(".password-error").text(response.errors.password);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Request Error:", status, error);
                    console.log("XHR Object:", xhr);
                    alert("An error occurred during the request. Please try again.");
                }
            });
        });
    });
</script>


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