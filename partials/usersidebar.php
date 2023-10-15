<div class="sidebar close">
        <div class="logo-details">
        <i class='bx bx-user-circle'></i>
        <span class="logo-name">Welcome Back</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../views/userprofile.php">
                <i class='bx bxs-grid-alt'></i>
                <span class="link-name">Profile</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a  class="link-name" href="../views/userprofile.php">Profile</a></li>
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
                    <li><a href="../views/packagebooking.php">Package</a></li>
                    <li><a href="../views/classbooking.php">Class</a></li>
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
                    <li><a href="../views/viewpackage.php">Package</a></li>
                    <li><a href="../views/viewclasses.php">Class</a></li>
                    <li><a href="../views/viewpt.php">Personal Training</a></li>
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
                    <li><a href="../views/bookdietplan.php">Book</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                <a href="../views/reqfreeze.php">
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
                    <li><a  class="link-name" href="../views/index.php">Logout</a></li>
                </ul>
            </li>

        </ul> 
        
</div>
        <section class="home-section">
                    <div class="home-content">
                      <i class='bx bx-menu'></i>
                    </div>
                 </section>



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