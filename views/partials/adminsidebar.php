<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require "../Controllers/EmployeeController.php";
$model = new Employee();
$emp = new EmployeeController($model);
$result = $emp->get_emp_auth(3);

?>
<div class="sidebar close">

    <div class="logo-details">
        <i class='bx bx-user-circle'></i>
        <span class="logo-name" style="font-weight:300">Admin</span>
    </div>
    <ul class="nav-links">
        <?php
        foreach ($result as $res) {
            if ($res["Header"] === 'Dashboard') {
                echo "  <li>
            <a href=" . $res["LinkAddress"] . ">
                <i class='bx bxs-grid-alt'></i>
                <span class='link-name'>" . $res["FriendlyName"] . "</span>
            </a>
            <ul class='sub-menu blank'>
            <li><a class='link-name' href='" . $res["FriendlyName"] . "'>" . $res["FriendlyName"] . "</a></li>
            </ul>
        </li>";
            }
        }
        ?>

        <?php
        $clientsSectionOutput = false;
        $clientsLinks = [];

        foreach ($result as $res) {
            if ($res["Header"] === 'Clients') {
                if (!$clientsSectionOutput) {
                    echo "<li>
                <div class='icon-link'>
                    <a href='#'>
                        <i class='fas fa-user-friends'></i>
                        <span class='link-name'>Clients</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class='sub-menu'>
                <li><a class='link-name' href=''>" . $res["Header"] . "</a></li>";
                    $clientsSectionOutput = true;
                }

                $clientsLinks[] = "<li><a href='" . $res["LinkAddress"] . "'>" . $res["FriendlyName"] . "</a></li>";
            }
        }

        if ($clientsSectionOutput) {
            echo implode("", $clientsLinks);
            echo "</ul></li>";
        }
        ?>


        <?php
        $coachesSectionOutput = false;
        $coachesLinks = [];

        foreach ($result as $res) {
            if ($res["Header"] === 'Coaches') {
                if (!$coachesSectionOutput) {
                    echo "<li>
                <div class='icon-link'>
                    <a href='#'>
                        <i class='fas fa-id-badge'></i>
                        <span class='link-name'>Coaches</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class='sub-menu'>
                <li><a class='link-name' href=''>" . $res["Header"] . "</a></li>";
                    $coachesSectionOutput = true;
                }

                $coachesLinks[] = "<li><a href='" . $res["LinkAddress"] . "'>" . $res["FriendlyName"] . "</a></li>";
            }
        }

        if ($coachesSectionOutput) {
            echo implode("", $coachesLinks);
            echo "</ul></li>";
        }
        ?>

        <?php
        $hrSectionOutput = false;
        $hrLinks = [];

        foreach ($result as $res) {
            if ($res["Header"] === 'HR') {
                if (!$hrSectionOutput) {
                    echo "<li>
                <div class='icon-link'>
                    <a href='#'>
                        <i class='fa fa-building'></i>
                        <span class='link-name'>HR</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class='sub-menu'>
                    <li><a class='link-name' href=''>" . $res["Header"] . "</a></li>";
                    $hrSectionOutput = true;
                }

                $hrLinks[] = "<li><a href='" . $res["LinkAddress"] . "'>" . $res["FriendlyName"] . "</a></li>";
            }
        }

        if ($hrSectionOutput) {
            echo implode("", $hrLinks);
            echo "</ul></li>";
        }
        ?>


        <?php
        $adminSectionOutput = false;
        $adminLinks = [];

        foreach ($result as $res) {
            if ($res["Header"] === 'Admin') {
                if (!$adminSectionOutput) {
                    echo "<li>
                <div class='icon-link'>
                    <a href='#'>
                        <i class='fas fa-id-badge'></i>
                        <span class='link-name'>Admin</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class='sub-menu'>
                    <li><a class='link-name' href=''>" . $res["Header"] . "</a></li>";
                    $adminSectionOutput = true;
                }

                $adminLinks[] = "<li><a href='" . $res["LinkAddress"] . "'>" . $res["FriendlyName"] . "</a></li>";
            }
        }

        if ($adminSectionOutput) {
            echo implode("", $adminLinks);
            echo "</ul></li>";
        }
        ?>
        <?php
        $packagesSectionOutput = false;
        $packagesLinks = [];

        foreach ($result as $res) {
            if ($res["Header"] === 'Packages') {
                if (!$packagesSectionOutput) {
                    echo "<li>
                <div class='icon-link'>
                    <a href='#'>
                        <i class='bx bx-dumbbell' style='font-size:24px;'></i>
                        <span class='link-name'>Packages</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class='sub-menu'>
                    <li><a class='link-name' href=''>" . $res["Header"] . "</a></li>";
                    $packagesSectionOutput = true;
                }

                $packagesLinks[] = "<li><a href='" . $res["LinkAddress"] . "'>" . $res["FriendlyName"] . "</a></li>";
            }
        }

        if ($packagesSectionOutput) {
            echo implode("", $packagesLinks);
            echo "</ul></li>";
        }
        ?>



        <?php
        foreach ($result as $res) {
            if ($res["Header"] === 'Requests') {
                echo "  <li>
            <a href=" . $res["LinkAddress"] . ">
                <i class='bx bx-info-circle' style='font-size:24px;' ></i>
                <span class='link-name'>" . $res["FriendlyName"] . "</span>
            </a>
            <ul class='sub-menu blank'>
            <li><a class='link-name' href='" . $res["FriendlyName"] . "'>" . $res["FriendlyName"] . "</a></li>
            </ul>
        </li>";
            }
        }
        ?>

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