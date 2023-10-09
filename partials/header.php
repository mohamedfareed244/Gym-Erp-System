
    <!-- Navigation Bar Start -->
    <header class="header">
        <a id="gym-title">ProFit Gym</a>
        <input type="checkbox" id="check">
        <label for="check" class="icons">
            <span class="material-symbols-outlined" id="menu-icon" >
                menu
                </span>
                <span class="material-symbols-outlined" id="close-icon">
                    close
                    </span>
        </label>
        <nav class="navbar">
            <a href="../views/index.php" id="home">HOME</a>
            <a href="../views/classes.php" id="classes"> CLASSES</a>
            <a href="../views/memberships.php" id="memberships">MEMBERSHIPS</a>

            <a href="../views/facilities.php" id="facilities">FACILITIES</a>
            <a href="#" id="contactus">CONTACT US</a>
            <a href="../views/login.php"><i class="ri-account-circle-line"></i></a>


            
        </nav>
    </header>
    <!-- image starts -->

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".navigation .navbar .logo-toggle-container .toggle-box").click(function () {
                $(".navigation .menu").stop().slideToggle();
            });
        });
    </script>

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


</body>
    