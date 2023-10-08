<?php
session_start();
require_once('db_connection.php'); // Database connection 

// Initialize $view_count to 0
$view_count = 0;

// Check if the page has a unique identifier (e.g., page_id)
$page_id = 'index'; // unique identifier for each page

// Check if a session variable exists to prevent multiple counts in the same session
if (!isset($_SESSION['viewed_pages'])) {
    $_SESSION['viewed_pages'] = array();
}

if (!in_array($page_id, $_SESSION['viewed_pages'])) {
    
    $_SESSION['viewed_pages'][] = $page_id; // Add the page to the viewed pages array

    // Query the database to retrieve the current view count
    $query = "SELECT view_count FROM page_views WHERE page_id = '$page_id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $view_count = $row['view_count'];
        $view_count++; // Increment the view count
    } else {
        // IF Page was not found in the database, initialize view count to 1
        $view_count = 1;
    }

    // Update the database with the new view count
    $update_query = "UPDATE page_views SET view_count = $view_count WHERE page_id = '$page_id'";
    mysqli_query($conn, $update_query);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'header.php'; ?>
  <link rel="stylesheet" href="CSS/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVEvFN5CtUbn15IovzgexT_8w0zuMWCos&callback=initMap" async defer></script>
  <script>
    function initMap() {
        var mapOptions = {
            center: { lat: 43.2473611, lng: -107.0351111 }, // Set the initial map center
            zoom: 5, // Set the zoom level
        };

        // Create a map object
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        // Defining the array of marker positions
        var markerPositions = [
            { lat: 46.8797778, lng: -121.7268889, title: "Mount Rainier" },
            { lat: 38.4748889, lng: -78.4509722, title: "Shenandoah National Park" },
            { lat: 43.8554167, lng: -102.3411111, title: "Badlands National Park" },
            { lat: 43.5737778, lng: -114.7004167, title: "Sawtooth National Recreation Area, Idahoy" },
            
        ];

        // Create an array to store marker objects
        var markers = [];

        // Loop through the marker positions and create markers
        for (var i = 0; i < markerPositions.length; i++) {
            var marker = new google.maps.Marker({
                position: markerPositions[i],
                map: map,
                title: "Marker " + (i + 1), // Marker title
            });

            // Add the marker to the markers array
            markers.push(marker);
        }
    }
</script>
</head>
<body>
  <?php include 'navbar.php'; ?>

  <section class="background-section">
    <div class="overlay"></div>
    <div class="container">
      <h1>Welcome to Global Wild Swimming and Camping</h1>
      <p>We offer various fun programs to give you the better experience.</p>
    </div>
  </section>

  <section id="about" class="about-section">
  
  <div class="container">
  <h2>About Us</h2>
    <p>

Global Wild Swimming and Camping (GWSC) is an emerging player in the outdoor adventure industry, poised to extend its reach far beyond the local community. With a passion for exploring the untamed beauty of nature, GWSC has embarked on a mission to provide enthusiasts of camping and wild swimming with unforgettable experiences.<br><br>

At GWSC, we believe in the transformative power of nature. Our team is dedicated to curating extraordinary outdoor experiences that nurture the spirit of exploration and foster a deep connection with the natural world. Whether you're an avid camper or a wild swimming enthusiast, GWSC invites you to embark on a journey of discovery, where breathtaking landscapes and unforgettable memories await. Join us as we venture beyond the ordinary, embracing the wild, and savoring the beauty of the great outdoors. Your next adventure begins with GWSC.<br><br>

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
                <img src="ASSETS/camping/shenandoah.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="ASSETS/camping/sawtooth.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="ASSETS/camping/national-park-montana.jpg" class="d-block w-100" alt="...">
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
  

  

<section class="map">
    <div class="container">
      <div id="map" style="width: 100%; height: 450px;"></div>
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
