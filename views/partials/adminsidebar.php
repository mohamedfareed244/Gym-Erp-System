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

<?php 
session_start();
require "../Controllers/EmployeeController.php";
$model = new Employee();
$emp= new EmployeeController($model);
$result=$emp->get_emp_auth(3);
foreach($result as $res){
    echo $res["Header"];
}
?>
<div class="sidebar close">

    <div class="logo-details">
        <i class='bx bx-user-circle'></i>
        <span class="logo-name" style="font-weight:300">Admin</span>
    </div>
    <ul class="nav-links">
        <?php 
        foreach($result as $res){
          if ($res["Header"]==='Dashboard'){ 
            echo "  <li>
            <a href=".$res["LinkAddress"].">
                <i class='bx bxs-grid-alt'></i>
                <span class='link-name'>".$res["FriendlyName"]."</span>
            </a>
            <ul class='sub-menu blank'>
                <li><a class='link-name' href='../views/admindashboard.php'>".$res["LinkAddress"]."</a></li>
            </ul>
        </li>";
          }
        }
        ?>
      
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
                <?php
                foreach($result as $res){
                    if ($res["Header"]==='Clients'){
                        echo "<li><a href=".$res["LinkAddress"].">".$res["FriendlyName"]."</a></li>";
                    } 
                }
                ?>
                
            </ul>
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
                <?php
                foreach($result as $res){
                    if ($res["Header"]==='Coaches'){
                        echo "<li><a href=".$res["LinkAddress"].">".$res["FriendlyName"]."</a></li>";
                    } 
                }
                ?>
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
                <?php
                foreach($result as $res){
                    if ($res["Header"]==='HR'){
                        echo "<li><a href=".$res["LinkAddress"].">".$res["FriendlyName"]."</a></li>";
                    } 
                }
                ?>
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
               
                <?php
                foreach($result as $res){
                    if ($res["Header"]==='Admin'){
                        echo "<li><a href=".$res["LinkAddress"].">".$res["FriendlyName"]."</a></li>";
                    } 
                }
                ?>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class='bx bx-dumbbell' style="font-size:24px;" ></i>
                    <span class="link-name">Packages</span>
                </a>
                <i class='bx bx-chevron-down arrow'></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link-name" href="#">Packages</a></li>
                <?php
                foreach($result as $res){
                    if ($res["Header"]==='Packages'){
                        echo "<li><a href=".$res["LinkAddress"].">".$res["FriendlyName"]."</a></li>";
                    } 
                }
                ?>

            </ul>
        </li>

        <li>

        
            <div class="icon-link">
                <a href="../views/requests.php">
                    <i class='bx bx-info-circle' style="font-size:24px;" ></i>
                    <span class="link-name">Requests</span>
                </a>
            </div>
            <ul class="sub-menu blank">
            <?php
                foreach($result as $res){
                    if ($res["Header"]==='Requests'){
                        echo "<li><a href=".$res["LinkAddress"].">".$res["FriendlyName"]."</a></li>";
                    } 
                }
                ?>
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
                <a href="../views/index.php">
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
sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});
</script>