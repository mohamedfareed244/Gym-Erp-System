
<nav class="navbar navbar-expand-lg navbar-dark fixed-top mask-custom shadow-0">
    <div class="navbar container">
        <a class="navbar-brand" style="color: rgb(231, 55, 55);" href="../views/index.php">Profit Gym</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">

            </ul>
            <ul class="navbar-nav d-flex"">
                <li class=" nav-item me-3 me-lg-0">
                <a class="nav-link" href="../views/index.php">
                    Home
                </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="../views/classes.php">
                        Classes
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="../views/memberships.php">
                        Memberships
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="../views/facilities.php">
                        Facilities
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="../views/contactus.php">
                        Contact us
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="../views/addMenu.php">
                        Add
                    </a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="../views/login.php">
                        <i class="ri-account-circle-line"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    window.addEventListener("scroll", function() {
        var navbar = document.querySelector(".navbar");
        if (window.scrollY > 50) {
            navbar.classList.remove("navbar-dark");
            navbar.classList.add("navbar-light");
        } else {
            navbar.classList.remove("navbar-light");
            navbar.classList.add("navbar-dark");
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
