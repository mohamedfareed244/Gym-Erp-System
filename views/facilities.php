<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilites</title>

    <!--css/icons/boostrap/jquery/fonts/images start-->
    <link rel="stylesheet" type="text/css" href="../public/CSS/header.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/usersidebar.css">
    <link rel="stylesheet" type="text/css" href="../public/CSS/facilites.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!--css/icons/boostrap/jquery/fonts/images end-->

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        ol,ul{
    padding-left: 0;
}
        </style>

</head>

<body>
    <!-- navbar -->
    <?php include("../partials/usersidebar.php") ?>
    <?php include("../partials/header.php") ?>
    <!-- add image -->
    <section id="welcome-image">
        <img src="../public/Images/bckgrnd2.jpg" alt="Home Image" class="main-img">
        <div class="img-text">
            <!-- title over image -->
            <h1>Facilites</h1>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xl-4 facimgs col align-self-center">
                <img src="../public/Images/spa.jpeg" alt="" class="imgs">
            </div>
            <div class="col-lg-8 py-5">
                <p class="facilites-desc">Indulge in the ultimate relaxation and wellness experience in our sauna and steam room. Step into the dry heat of the sauna or the soothing, moist environment of the steam room, and let the stress melt away. These luxurious facilities promote muscle relaxation, improve circulation, and provide a serene escape from the demands of daily life</p>
            </div>
            <hr>
            <div class="col-lg-8 py-5">
                <p class="facilites-desc">Our state-of-the-art treadmills offer a versatile and effective way to improve cardiovascular fitness. With adjustable speed and incline settings, you can customize your workout to match your fitness level and goals. Whether you're walking, jogging, or sprinting, our treadmills provide a cushioned surface that reduces impact on your joints, ensuring a comfortable and safe workout experience.</p>
            </div>

            <div class="col-lg-4 col-xl-4 facimgs col align-self-center">
                <img src="../public/Images/equipments.jpeg" alt="" class="imgs">
            </div>
            <hr>
            <div class="col-lg-4 col-xl-4 facimgs col align-self-center">
                <img src="../public/Images/lockers.jpeg" alt="" class="imgs">
            </div>
            <div class="col-lg-8 py-5">
                <p class="facilites-desc">Our spacious and well-appointed locker rooms provide the perfect space to freshen up and store your belongings. Featuring private changing areas,
                    showers, and secure lockers, you can transition seamlessly from your workout to the rest of your day. Complete with convenient amenities like hairdryers, toiletries,
                    and grooming stations, our locker rooms are designed to ensure your comfort and convenience.</p>
            </div>
            <hr>
            <div class="col-lg-8 py-5">
                <p class="facilites-desc">Step into our state-of-the-art Cardio Area, where you'll find an array of cutting-edge equipment designed to elevate
                    your cardiovascular fitness. Our treadmills, stationary bikes, elliptical trainers, and rowing machines provide the
                    perfect platform to improve endurance, burn calories, and reach your fitness goals. With spacious surroundings and a vibrant atmosphere,
                    you'll be motivated to push your limits and achieve new levels of cardiovascular health.</p>
            </div>


            <div class="col-lg-4 col-xl-4 facimgs col align-self-center">
                <img src="../public/Images/cardio_area.jpeg" alt="" class="imgs">
            </div>
            <hr>
            <div class="col-lg-4 col-xl-4 facimgs col align-self-center">
                <img src="../public/Images/free_weight.webp" alt="" class="imgs">
            </div>
            <div class="col-lg-8 py-5">
                <p class="facilites-desc">Unleash your inner strength in our well-equipped Weightlifting Area. Whether you're a
                    seasoned lifter or just starting out, our comprehensive selection of free weights,
                    weight machines, and barbells offers endless opportunities for strength training.
                    From classic exercises like bench presses and squats to targeted muscle workouts, you'll
                    find the tools you need to build lean muscle, increase strength, and sculpt your ideal physique..</p>
            </div>
        </div>
    </div>

    <?php include("../partials/footer.php") ?>

</body>

</html>