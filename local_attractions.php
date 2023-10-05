<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Attractions</title>
    <link rel="stylesheet" href="CSS/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h1 class="mt-5">Local Attractions</h1>

        <div class="row mt-4">
            <?php
            // Include your database connection file
            require_once 'db_connection.php';

            // Define a query to retrieve local attractions data
            $query = "SELECT * FROM local_attractions";

            // Execute the query
            $result = mysqli_query($conn, $query);

            // Check if there are results
            if (mysqli_num_rows($result) > 0) {
                // Loop through the results and generate cards
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card local-attractions-card">';
                    echo '<img src="' . $row['image'] . '" class="card-img-top" alt="' . $row['alt'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['alt'] . '</h5>';
                    echo '<p class="card-text">' . $row['description'] . '</p>';
                    echo '<a href="#" class="btn btn-primary">Learn More</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No local attractions found.</p>';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery (for Bootstrap) if needed -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
