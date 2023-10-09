<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--css/icons/boostrap/jquery/fonts/images start-->
  <link rel="stylesheet" type="text/css" href="../public/CSS/header.css">
  <link rel="stylesheet" type="text/css" href="../public/CSS/footer.css">
  <link rel="stylesheet" type="text/css" href="../public/CSS/memberships.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <!--css/icons/boostrap/jquery/fonts/images end-->

  <title>ProFit Gym</title>

</head>

<body>
  <!-- include header -->
  <?php include("../partials/header.php") ?>
  <!-- add image -->
  <section id="welcome-image">
    <img src="../public/Images/bckgrnd2.jpg" alt="Home Image" class="main-img">
    <div class="img-text">
      <!-- title over image -->
      <h1>Memberships</h1>
    </div>
  </section>

  <div class="container py-5">

    <div class="row row-cols-1 row-cols-md-3 g-4 py-5">

      <!-- first membership -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">1 MONTH</h5>
              <h6 class="card-text" id="visits"><i class="fa-regular fa-circle-check"></i>Limited Visits</h6>
              <h6 class="card-text" id="invitations"><i class="fa-regular fa-circle-check"></i>2 Invitations</h6>
              <h6 class="card-text" id="inbody"><i class="fa-regular fa-circle-check"></i>1 Inbody</h6>
              <h6 class="card-text" id="ptsessions"><i class="fa-regular fa-circle-check"></i>1 Private Training Session</h6>
              <h5 class="card-text" id="price">for L.E 1,000</h5>
          </div>
          <div class="d-flex justify-content-around mb-5">
            <button class="btn btn-primary">SUBSCRIBE NOW</button>
          </div>
        </div>
      </div>

      <!-- second membership -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">2 MONTHS</h5>
              <h6 class="card-text" id="visits"><i class="fa-regular fa-circle-check"></i>Limited Visits</h6>
              <h6 class="card-text" id="invitations"><i class="fa-regular fa-circle-check"></i>4 Invitations</h6>
              <h6 class="card-text" id="inbody"><i class="fa-regular fa-circle-check"></i>2 Inbody</h6>
              <h6 class="card-text" id="ptsessions"><i class="fa-regular fa-circle-check"></i>2 Private Training Session</h6>
              <h5 class="card-text" id="price">for L.E 2,500</h5>
          </div>
          <div class="d-flex justify-content-around mb-5">
            <button class="btn btn-primary">SUBSCRIBE NOW</button>
          </div>
        </div>
      </div>

      <!-- third membership -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">3 MONTHS</h5>
              <h6 class="card-text" id="visits"><i class="fa-regular fa-circle-check"></i>Unlimited Visits</h6>
              <h6 class="card-text" id="invitations"><i class="fa-regular fa-circle-check"></i>5 Invitations</h6>
              <h6 class="card-text" id="inbody"><i class="fa-regular fa-circle-check"></i>3 Inbody</h6>
              <h6 class="card-text" id="ptsessions"><i class="fa-regular fa-circle-check"></i>3 Private Training Session</h6>
              <h5 class="card-text" id="price">for L.E 3,500</h5>
          </div>
          <div class="d-flex justify-content-around mb-5">
            <button class="btn btn-primary">SUBSCRIBE NOW</button>
          </div>
        </div>
      </div>

      <!-- fourth membership -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">4 MONTHS + 2 MONTHS FREE</h5>
              <h6 class="card-text" id="visits"><i class="fa-regular fa-circle-check"></i>Unlimited Visits</h6>
              <h6 class="card-text" id="invitations"><i class="fa-regular fa-circle-check"></i>6 Invitations</h6>
              <h6 class="card-text" id="inbody"><i class="fa-regular fa-circle-check"></i>5 Inbody</h6>
              <h6 class="card-text" id="ptsessions"><i class="fa-regular fa-circle-check"></i>5 Private Training Session</h6>
              <h5 class="card-text" id="price">for L.E 5,500</h5>
          </div>
          <div class="d-flex justify-content-around mb-5">
            <button class="btn btn-primary">SUBSCRIBE NOW</button>
          </div>
        </div>
      </div>

      <!-- fifth membership -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">6 MONTHS + 3 MONTHS</h5>
              <h6 class="card-text" id="visits"><i class="fa-regular fa-circle-check"></i>Unlimited Visits</h6>
              <h6 class="card-text" id="invitations"><i class="fa-regular fa-circle-check"></i>8 Invitations</h6>
              <h6 class="card-text" id="inbody"><i class="fa-regular fa-circle-check"></i>7 Inbody</h6>
              <h6 class="card-text" id="ptsessions"><i class="fa-regular fa-circle-check"></i>7 Private Training Session</h6>
              <h5 class="card-text" id="price">for L.E 7,500</h5>
          </div>
          <div class="d-flex justify-content-around mb-5">
            <button class="btn btn-primary">SUBSCRIBE NOW</button>
          </div>
        </div>
      </div>

      <!-- sixth membership -->
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">8 MONTHS + 4 MONTHS FREE</h5>
              <h6 class="card-text" id="visits"><i class="fa-regular fa-circle-check"></i>Unlimited Visits</h6>
              <h6 class="card-text" id="invitations"><i class="fa-regular fa-circle-check"></i>10 Invitations</h6>
              <h6 class="card-text" id="inbody"><i class="fa-regular fa-circle-check"></i>9 Inbody</h6>
              <h6 class="card-text" id="ptsessions"><i class="fa-regular fa-circle-check"></i>9 Private Training Session</h6>
              <h5 class="card-text" id="price">for L.E 9,000</h5>
          </div>
          <div class="d-flex justify-content-around mb-5">
            <button class="btn btn-primary">SUBSCRIBE NOW</button>
          </div>
        </div>
      </div>

    </div>

  </div>


  <!-- script for bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

<!-- include footer -->
<?php include("../partials/footer.php") ?>



<script src="../js/index.js">

</script>



</html>