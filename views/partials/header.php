<?php
require_once "../Controllers/NavBarController.php";

$menuController = new MenuController();
$menuHtml = $menuController->displayMenu();
?>

<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  transition: .5 ease;

backdrop-filter: blur(20px);
    background-color: rgba(255, 255, 255, .15);
  z-index: 1;
}

.dropdown-content a {
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}


.dropdown:hover .dropdown-content {display: block;
}

</style>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top mask-custom shadow-0">
    <div class="navbar container">
        <a class="navbar-brand" style="color: rgb(231, 55, 55);" href="../views/index.php">Profit Gym</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
            </ul>
            <ul class="navbar-nav d-flex">
                <?php echo $menuHtml; ?>

                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="../views/login.php">
                        <i class="ri-account-circle-line"></i>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
