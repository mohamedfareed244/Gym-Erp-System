<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />                
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />       
        <link rel="icon" type="image/x-icon" href="images/dfav.png" />

        
        <link rel="stylesheet" type="text/css" href="../public/css/index.css">

    <!-- to access font awesome cdn icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                      
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />       
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="images/dfav.png" />
  

    <title>ProFit Gym</title>

</head>

<body>
    <?php include ("../partials/header.php") ?>
    <script>
  
  jQuery(function($){

      var $navbar=$('.header');
      $(window).scroll(function(event){
          var $current=$(this).scrollTop();

          if($current >190){
              $navbar.addClass('navbar-color');
          }else{
              $navbar.removeClass('navbar-color');
          }

      });
  });

</script>

    <!-- body intro starts -->
    




    <div class="gridboxes1">
        <div class="box1" style="background-color:#dfdede;">
          <h2>WORKOUT</h2>
          <p>With our latest equipments and efficient coaches.</p>
        </div>
        <div class="box2" style="background-color:#cb3737;">
          <h2 style="color: azure;">NUTRITION</h2>
          <p style="color: azure;">A meal plan designed to suit you and your goal.</p>
        </div>
      </div>






</body>





<script src="/js/index.js">

</script>
<?php include ('../partials/footer.php') ?>

</html>