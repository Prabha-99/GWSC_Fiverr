
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div class="container">
        <h1 class="mt-5">Information</h1>

        <!-- Section: Pitch Types and Availability -->
        <section>
            <h2 class="mt-4">Pitch Types and Availability</h2>
            <!-- Add content related to pitch types and availability here -->
        </section>

        <!-- Section: Features -->
        <section>
            <h2 class="mt-4">Features</h2>
            <!-- Add content related to features here -->
        </section>

        <!-- Section: Location and Maps -->
        <section>
            <h2 class="mt-4">Location and Maps</h2>
            <!-- Add content related to location and maps here -->
        </section>

        <!-- Section: Local Attractions -->
        <section>
            <h2 class="mt-4">Local Attractions</h2>
            <!-- Add content related to local attractions here -->
        </section>
    </div>

    <script src=”https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js”></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="SCRIPTS/scroll.js"></script>
</body>
</html>
