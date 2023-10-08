var navbar = document.getElementById("navbar");
var brand =document.getElementById("brand");
  var navbarHeight = 244;

  window.onscroll = function() {
    if (window.pageYOffset > navbarHeight) {
      navbar.classList.remove("bg-transparent");
      navbar.style.backgroundColor = "#f77b16";
      // navbar.classList.add("bg-dark");
      brand.style.color="#f77b16";
      
    } else {
      navbar.classList.remove("bg-dark");
      navbar.classList.add("bg-transparent");
      brand.style.color="#f77b16";
      
    }
  };