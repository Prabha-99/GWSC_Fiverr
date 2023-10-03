<?php
session_start();
require_once('db_connection.php'); // Include your database connection file

// Initialize $view_count to 0
$view_count = 0;

// Check if the page has a unique identifier (e.g., page_id)
$page_id = 'index'; // You can set a unique identifier for each page

// Check if a session variable exists to prevent multiple counts in the same session
if (!isset($_SESSION['viewed_pages'])) {
    $_SESSION['viewed_pages'] = array();
}

if (!in_array($page_id, $_SESSION['viewed_pages'])) {
    // Page hasn't been viewed in this session
    $_SESSION['viewed_pages'][] = $page_id; // Add the page to the viewed pages array

    // Query the database to retrieve the current view count
    $query = "SELECT view_count FROM page_views WHERE page_id = '$page_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $view_count = $row['view_count'];
        $view_count++; // Increment the view count
    } else {
        // Page not found in the database, initialize view count to 1
        $view_count = 1;
    }

    // Update the database with the new view count
    $update_query = "UPDATE page_views SET view_count = $view_count WHERE page_id = '$page_id'";
    mysqli_query($conn, $update_query);
}

// Rest of your HTML content
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'header.php'; ?>
  <link rel="stylesheet" href="CSS/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <style>
    /* Customize the about section */
    .about-section {
      background-color: #f9f9f9;
      padding: 40px;
    }

    .about-section h2 {
      font-size: 28px;
      color: #333;
    }

    .about-section p {
      font-size: 16px;
      color: #666;
    }

    /* Customize the why choose section */
    .why-choose-section {
      background-color: #fff;
      padding: 40px;
    }

    .why-choose-section h2 {
      font-size: 28px;
      color: #333;
    }

    .why-choose-section ul {
      list-style-type: disc;
      padding-left: 20px;
      font-size: 16px;
      color: #666;
    }
  </style>
</head>
<body>
  <?php include 'navbar.php'; ?>

  <section class="background-section">
    <div class="overlay"></div>
    <div class="container">
      <!-- Your content here -->
      <h1>Welcome to Global Wild Swimming and Camping</h1>
      <p>We offer various programs to enhance your skills.</p>
    </div>
  </section>

  <section id="about" class="about-section">
  <div class="container">
    <h2>About Us</h2>
    <p>Sipraw Institution is a leading educational establishment dedicated to shaping the future through excellence in education and innovation. With a rich history spanning over two decades, Sipraw Institution has consistently remained committed to providing high-quality education and fostering an environment that nurtures students' intellectual growth and personal development.

Our Mission:
At Sipraw Institution, our mission is to empower and inspire students to realize their full potential by offering a diverse range of academic programs, cutting-edge research opportunities, and a supportive learning community. We aim to cultivate well-rounded individuals who possess critical thinking skills, global perspectives, and a strong sense of social responsibility.<br><br>

</p>
  </div>
  </section class="carousel" id="carousel">
      <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="ASSETS/c3.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="ASSETS/c2.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="ASSETS/Camping.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
      </div>
  <section>


  </section>

  <div class="container">
    <h3>Number of Visitors: <?php echo $view_count; ?></h3>
  </div>
  

  
  <section id="programs" class="programs-section">
  <div class="container">
    <h2>Programs Offered</h2><br>
    <div class="row">

    <div class="col-md-4">
        <a href="CS.php" class="card-link">
          <div class="card">
            <img src="assets/CS.png" class="card-img-top" alt="Program 1">
            <div class="card-body">
              <h5 class="card-title">Computer Science</h5>
              <p class="card-text">Explore the world of technology and innovation.</p>
            </div>
          </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="HRM.php" class="card-link">
          <div class="card">
            <img src="assets/main.jpg" class="card-img-top" alt="Program 1">
            <div class="card-body">
              <h5 class="card-title">Human Resource Management</h5>
              <p class="card-text">Learn how to manage the Most valuable asset of any Organization. </p>
            </div>
          </div>
        </a>
    </div>
      
    <div class="col-md-4">
        <a href="CP.php" class="card-link">
          <div class="card">
            <img src="assets/programming.jpg" class="card-img-top" alt="Program 1">
            <div class="card-body">
              <h5 class="card-title">Computer Programming</h5>
              <p class="card-text">Learn fundametals of Computer Programming</p>
            </div>
          </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="BM.php" class="card-link">
          <div class="card">
            <img src="assets/BM.jpg" class="card-img-top" alt="Program 1">
            <div class="card-body">
              <h5 class="card-title">Business Management</h5>
              <p class="card-text">Learn how to improve and develop your own business</p>
            </div>
          </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="BS.php" class="card-link" >
          <div class="card">
            <img src="assets/BS.png" class="card-img-top" alt="Program 1">
            <div class="card-body">
              <h5 class="card-title">Business Studies</h5>
              <p class="card-text">Explore the World of Business</p>
            </div>
          </div>
        </a>
    </div>

    </div>
  </div>
</section>

<section class="map">
    <div class="container">
      <iframe
          width="100%"
          height="450"
          frameborder="0"
          style="border:0"
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3965.4072929433436!2d80.0840627!3d6.9752471!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae4487f3f7d11a5%3A0x66b2f60c7d9e67a8!2sYour%20Location%20Here!5e0!3m2!1sen!2sus!4v1608086093656!5m2!1sen!2sus"
          allowfullscreen=""
          aria-hidden="false"
          tabindex="0">
      </iframe>
    </div>
</section>

<section class="footer">
    <?php include 'footer.php'; ?>
</section>
  


<script src=”https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js”></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="SCRIPTS/scroll.js"></script>

</body>
</html>
