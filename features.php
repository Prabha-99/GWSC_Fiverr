<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="CSS/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campsite Details</title>
</head>
<body class="features-body">
    <?php include 'navbar.php'; ?><br><br><br>

    <div class="container">
        <?php
        require_once 'db_connection.php';

        // Check if the 'site_id' parameter is set in the URL
        if (isset($_GET['site_id'])) {
            $siteId = $_GET['site_id'];

            $query = "SELECT * FROM local_attractions WHERE id = $siteId";

            // Execute the query
            $result = mysqli_query($conn, $query);

            
            if ($result && mysqli_num_rows($result) > 0) {
                $campsite = mysqli_fetch_assoc($result);

                
                echo '<h1 class="mt-5">' . $campsite['alt'] . '</h1>';
                echo '<div class="row">';
                echo '<div class="col-md-6">';
                echo '<img src="' . $campsite['image'] . '" class="img-fluid" alt="' . $campsite['alt'] . '">';
                echo '</div>';
                echo '<div class="col-md-6">';
                echo '<h4 class="mt-4">Description</h4>';
                echo '<p>' . $campsite['description'] . '</p>';
                echo '<h4>Number of Car Parks</h4>';
                echo '<p>' . $campsite['car_parks'] . '</p>';
                echo '<h4>Showers</h4>';
                echo '<p>' . $campsite['showers'] . '</p>';
                echo '<h4>Internet Access</h4>';
                echo '<p>' . $campsite['internet_access'] . '</p>';
                echo '<h4>Amenities and Rules</h4>';
                echo '<p>' . $campsite['amenities_rules'] . '</p>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<p>Campsite not found.</p>';
            }

            mysqli_close($conn);
        } else {
            echo '<p>Site ID not provided.</p>';
        }
        ?>
    </div>

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
