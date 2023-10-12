<div class="sidebar close">
        <div class="logo-details">
        <i class='bx bx-user-circle'></i>
        <span class="logo-name">Welcome Back</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">
                <i class='bx bxs-grid-alt'></i>
                <span class="link-name">Profile</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a  class="link-name" href="#">Profile</a></li>
                </ul>
            </li>
            </li>
            <li>
                <div class="icon-link">
                   <a href="#">
                   <i class='bx bxs-book-add'></i>
                   <span class="link-name">Booking</span>
                   </a>
                   <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a  class="link-name" href="#">Booking</a></li>
                    <li><a href="#">Package</a></li>
                    <li><a href="#">Class</a></li>
                    <li><a href="#">Personal Trainer</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                <a href="#">
                <i class='bx bxs-message-alt-detail'></i>
                <span class="link-name">Details</span>
                </a>
                <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a  class="link-name" href="#">Details</a></li>
                    <li><a href="#">Package</a></li>
                    <li><a href="#">Class</a></li>
                    <li><a href="#">Personal Training</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                <a href="#">
                <i class='bx bxs-leaf'></i>
                <span class="link-name">Diet Plan</span>
                </a>
                <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a  class="link-name" href="#">Diet Plan</a></li>
                    <li><a href="#">View</a></li>
                    <li><a href="#">Book</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                <a href="#">
                <i class='bx bxs-lock-alt'></i>
                <span class="link-name">Freeze</span>
                </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a  class="link-name" href="#">Freeze</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                <a href="#">
                <i class='bx bxs-cog'></i>
                <span class="link-name">Account</span>
                </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a  class="link-name" href="#">Account</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                <a href="#">
                <i class='bx bx-log-out'></i>
                <span class="link-name">Logout</span>
                </a>
                </div>
                <ul class="sub-menu blank">
                    <li><a  class="link-name" href="#">Logout</a></li>
                </ul>
            </li>
            <!-- <li>
                <div class="icon-link">
                 <section class="home-section">
                    <div class="home-content">
                      <i class='bx bx-menu'></i>
                    </div>
                 </section>
                </div>
            </li> -->

        </ul> 


    </div>


    <script>
        let arrow=document.querySelectorAll(".arrow");
        for(var i=0;i<arrow.length;i++)
        {
            arrow[i].addEventListener("click",(e)=>{
                let arrowParent=e.target.parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");

                console.log(arrowParent);

            });
        }

        let sidebar=document.querySelector(".sidebar");
        let sidebarBtn=document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click",()=>{
              sidebar.classList.toggle("close");
        });
        
        </script>
    <!-- Navigation Bar Start -->
    <header class="gymheader">

        <a id="gymtitle">ProFit Gym</a>
        <input type="checkbox" id="check">
        <label for="check" class="gymicons">
            <span class="material-symbols-outlined" id="menu-icon" >
                menu
                </span>
                <span class="material-symbols-outlined" id="close-icon">
                    close
                    </span>
        </label>
        <nav class="gymnavbar">
            <a href="../views/index.php" id="home">HOME</a>
            <a href="../views/classes.php" id="classes"> CLASSES</a>
            <a href="../views/memberships.php" id="memberships">MEMBERSHIPS</a>

            <a href="../views/facilities.php" id="facilities">FACILITIES</a>
            <a href="../views/contactus.php" id="contactus">CONTACT US</a>
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

    