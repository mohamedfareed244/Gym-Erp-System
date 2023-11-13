<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/header.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/index.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/classdetails.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3472d45ca0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js">
    <script src="https://kit.fontawesome.come/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->

    <title>ProFit Gym</title>
</head>

<body>
    <!-- navbar start -->
    <?php include("partials/header.php") ?>
    <!-- header image -->
    <section id="welcome-image">
        <img src="../public/Images/yogaclass.jpg" alt="Home Image" class="main-img">
    </section>


    <!-- navbar end -->


    <section id="class-intro">
        <div class="class-name-box">

            <h2 class="class-name"> Yoga Class</h2>
        </div>
    </section>



    <!-- class details -->
    <section class="class-details">
        <div class="class-item">
            <div class="class-info">
                <p class="class-time"><strong>Time:</strong> 7:00 AM - 8:30 AM</p>
                <p class="class-date"><strong>Date:</strong> Every Monday and Wednesday</p>
                <p class="class-level"><strong>Level:</strong> Moderate</p>
                <p class="class-participants"><strong>Limit of Participants:</strong> 20</p>
                <div class="class-availability">
                    <p class="availspaces" id="availability-text"><strong>Availability:</strong>
                        <span id="availability-count">10</span> Places Left
                    </p>
                </div>

                <button class="reserve-class">Reserve Now</button>

            </div>
        </div>
    </section>



    <section id="class-snippet">
        <h3 class="class-instructor"><strong>Instructors:</strong></h3>
        <div class="instructors-container">
            <div class="instructor">
                <div class="instructor-image">
                    <img src="../public/Images/coach1.jpg" alt="Instructor 1">
                </div>
                <div class="instructor-details">
                    <h2>Instructor 1</h2>
                </div>
            </div>
            <div class="instructor">
                <div class="instructor-image">
                    <img src="../public/Images/coach2.jpg" alt="Instructor 2">
                </div>
                <div class="instructor-details">
                    <h2>Instructor 2</h2>
                </div>
            </div>
        </div>

        <p>Experience the transformative power of yoga in our serene and
            welcoming studio. Led by expert instructors, our yoga classes
            offer a holistic approach to well-being, combining physical
            postures, breathing techniques, and meditation. Suitable for
            all levels, our classes provide a perfect opportunity to enhance
            flexibility, reduce stress, and find inner balance. Reserve your
            spot and embark on a journey to a healthier mind and body. </p>

    </section>





    <script>
    const availabilityCount = 10; // testing lehad ma n connect b database
    const availabilityText = document.getElementById("availability-text");

    if (availabilityCount > 0) {
        availabilityText.classList.add("available");
    } else {
        availabilityText.classList.add("unavailable");
    }
    </script>

    <!-- include footer -->
    <?php include('../partials/footer.php') ?>

</body>

<script src="../public/js/index.js"></script>



</html>