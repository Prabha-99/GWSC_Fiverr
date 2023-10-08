<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="CSS/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Attractions</title>
    
</head>
<body class="arractionAttraction-body">
    <?php include 'navbar.php'; ?><br><br><br>

    <div class="container">
        <h1 class="mt-5">Local Attractions</h1>

        <div class="row mt-4">
            <?php
            require_once 'db_connection.php';
            $query = "SELECT * FROM local_attractions";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                // Loop through the results and generate cards
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card local-attractions-card">';
                    echo '<img src="' . $row['image'] . '" class="card-img-top" alt="' . $row['alt'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['alt'] . '</h5>';
                    echo '<p class="card-text">' . $row['description'] . '</p>';
                    echo '<a href="#" class="btn btn-success">Learn More</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No local attractions found.</p>';
            }
            mysqli_close($conn);
            ?>
        </div>
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
