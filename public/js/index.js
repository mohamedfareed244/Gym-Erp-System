window.addEventListener("scroll", function () {
  var navbar = document.querySelector(".navbar");
  if (window.scrollY > 50) {
    navbar.classList.remove("navbar-dark");
    navbar.classList.add("navbar-light");
  } else {
    navbar.classList.remove("navbar-light");
    navbar.classList.add("navbar-dark");
  }
});
