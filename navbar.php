<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<!-- Navbar starts here -->
<nav class="navbar navbar-expand-lg navbar-light px-3 bg-transparent fixed-top" id="navbar" style="color: #f77b16;">
  <div class="container-fluid">
    <a class="navbar-brand" id="brand" href="index.php" style="color: #3edd6e; font-size: 35px; font-family: consolas; font-weight: bold;">GWSC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="nav nav-pills ms-auto">
        <li class="nav-item me-5">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link" href="information.php">Information</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link" href="local_attractions.php">Attractions</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link" href="pitch_availability.php">Check_Availability</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link" href="reviews.php">Reviews</a>
        </li>
        <li class="nav-item me-5">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        
        <!-- Account dropdown  -->
        <li class="nav-item dropdown ml-auto">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person"></i> 
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="login.php">Login</a></li>
            <li><a class="dropdown-item" href="registration.php">Signup</a></li>
          </ul>
        </li>

        <!-- Search Bar -->
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="attraction-search" placeholder="Search here...">
            <button class="btn btn-success" id="search-button">Search</button>
        </div>
        <!-- Search Results -->
        <div id="search-results">
            <!-- Results will be displayed here -->
        </div>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar Ends here -->
</body>
</html>


