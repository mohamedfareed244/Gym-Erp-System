<!-- <style>
    ::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: rgb(224, 224, 224);
}

::-webkit-scrollbar-thumb {
  background-color: rgb(31, 31, 31);
}

</style> -->


<div class="sidebar close">


    <div class="logo-details">
        <i class='bx bx-user-circle'></i>
        <span class="logo-name" style="font-weight:300">Admin</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="#">
                <i class='bx bxs-grid-alt'></i>
                <span class="link-name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link-name" href="#">Dashboard</a></li>
            </ul>
        </li>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class='fas fa-user-friends'></i>
                    <span class="link-name">Clients</span>
                </a>
                <i class='bx bx-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link-name" href="../views/clientdetails.php">Clients</a></li>
                <li><a href="../views/addclient.php">Add</a></li>
                <li><a href="../views/editclient.php">Edit</a></li>
                <li><a href="../views/clientdetails.php">Details</a></li>
                <li><a href="../views/clientin.php">Check in </a></li>
            </ul>
        </li>

        </li>

        <li>
            <div class="icon-link">
                <a href="../views/coachesadmin.php">
                    <i class='fas fa-id-badge'></i>
                    <span class="link-name">Coaches</span>
                </a>
                <i class='bx bx-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link-name" href="../views/coachesadmin.php">Coaches</a></li>
                <li><a href="../views/coachesadmin.php"> View Coaches </a></li>
                <li><a href="../views/ptsessions.php">View Pt Clients </a></li>
                <li><a href="../views/myptclients.php">My Pt Clients </a></li>
                <li><a href="../views/admin-classes.php">View Classes</a></li>
                <li><a href="../views/myclasses.php">My Classes</a></li>
            </ul>
        </li>

        <li>
            <div class="icon-link">
                <a href="#">
                    <i class='fa fa-building'></i>
                    <span class="link-name">HR</span>
                </a>
                <i class='bx bx-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link-name" href="#">HR </a></li>
                <li><a href="../views/employeesadmin.php">View Employees</a></li>
                <li><a href="../views/attendance.php">Attendance</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class='fas fa-id-badge'></i>
                    <span class="link-name">Admin</span>
                </a>
                <i class='bx bx-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link-name" href="#">Admin </a></li>
                <li><a href="../views/addadmin.php">Add Admin</a></li>
                <li><a href="../views/removeadmin.php">Remove Admin</a></li>
                <li><a href="../views/salesreport.php">Sales Report</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class='fas fa-cog'></i>
                    <span class="link-name">Packages</span>
                </a>
                <i class='bx bx-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link-name" href="#">Packages</a></li>
                <li><a href="../views/viewpackagesadmin.php">View Packages </a></li>
                <li><a href="../views/addPackageadmin.php">Add Package </a></li>
                <li><a href="../views/viewptadmin.php">View Private Sessions </a></li>
                <li><a href="../views/addptadmin.php">Add Private Sessions </a></li>
            </ul>
        </li>

        <li>
            <div class="icon-link">
                <a href="../views/profile.php">
                    <i class='far fa-user-circle'></i>
                    <span class="link-name">Account</span>
                </a>
            </div>
            <ul class="sub-menu blank">
                <li><a class="link-name" href="../views/profile.php">Account</a></li>
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
                <li><a class="link-name" href="../views/index.php">Logout</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class='bx bx-home'></i>
                    <span class="link-name">Return to Homepage</span>
                </a>
            </div>
            <ul class="sub-menu blank">
                <li><a class="link-name" href="../views/index.php">Return to Homepage</a></li>
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
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement;
            arrowParent.classList.toggle("showMenu");

            console.log(arrowParent);

        });
    }

    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });
</script>