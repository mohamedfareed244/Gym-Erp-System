<?php
require_once "../Controllers/NavBarController.php";

$menuController = new MenuController();
$menuHtml = $menuController->displayMenu();
?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top mask-custom shadow-0">
    <div class="navbar container">
        <a class="navbar-brand" style="color: rgb(231, 55, 55);" href="../views/index.php">Profit Gym</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <?php echo $menuHtml; ?>

                <!-- stop here -->
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="../views/login.php">
                        <i class="ri-account-circle-line"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-w5pCm1vxiUcLvNzHZmsCjOWzIbY4hOaQ50zGCA2N0cE=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var dropdowns = document.querySelectorAll('.navbar-nav .dropdown');

        dropdowns.forEach(function (dropdown) {
            dropdown.addEventListener('click', function (event) {
                event.stopPropagation();
                dropdown.classList.toggle('show');
            });
        });

        document.addEventListener('click', function () {
            dropdowns.forEach(function (dropdown) {
                dropdown.classList.remove('show');
            });
        });
    });
</script>
