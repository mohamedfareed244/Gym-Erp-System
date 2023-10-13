<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../public/CSS/header.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/loginform.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->

    <title>ProFit Gym</title>



</head>

<body>
    <!-- include header -->
    <?php include("../partials/header.php") ?>
    <div class="login-container">
        <div class="login-form1">
            <form action="../views/index.php" autocomplete="off">
                <h3 class="login-title">Log In</h3>
                <div class="login-input-container">
                    <input type="email" name="email" class="login-input" />
                    <label class="login-lbl" for="">Email</label>
                    <span>Email</span>
                </div>
                <div class="login-input-container">
                    <input type="password" name="password" class="login-input" />
                    <label class="login-lbl" for="">Password</label>
                    <span>Password</span>
                </div>
                <input type="submit" value="Login" class="login-btn" />
                <p class="register-text">Don't Have an Account? <a class="register-link" href="../views/register.php">Register Now</a></p>
            </form>
        </div>

    </div>
    </div>

    <!-- include footer -->
    <?php include("../partials/footer.php") ?>

</body>

<script>
    const inputs = document.querySelectorAll(".login-input");

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