<?php
require_once('db_connection.php');  // Database connection 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'];
    $reviewText = $_POST['review_text'];

    $query = "INSERT INTO reviews (username, review_text) VALUES ('$username', '$reviewText')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        
        $successMessage = 'Review submitted successfully!';
    } else {
        
        $errorMessage = 'Error submitting review: ' . mysqli_error($conn);
    }
}

// Retrieve existing reviews from the database
$query = "SELECT * FROM reviews ORDER BY review_date DESC";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="CSS/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
</head>
<body class="reviews-body">
    <?php include 'navbar.php'; ?><br><br><br><br>
    <div class="container">
        <h1 class="mt-5">Reviews</h1>

        
        <div class="row mt-4">
            <!-- Looping and display reviews -->
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-6">';
                echo '<div class="card mb-3">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['username'] . '</h5>';
                echo '<p class="card-text">' . $row['review_text'] . '</p>';
                echo '<p class="card-text"><small class="text-muted">' . $row['review_date'] . '</small></p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

        <!-- New Review Form -->
        <div class="row mt-4">
            <div class="col-md-6">
                <h2>Write a Review</h2>
                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Your Name:</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="review_text" class="form-label">Your Review:</label>
                        <textarea class="form-control" name="review_text" id="review_text" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Submit Review</button>
                </form>
                <?php
                if (isset($successMessage)) {
                    echo '<div class="alert alert-success mt-3">' . $successMessage . '</div>';
                }
                if (isset($errorMessage)) {
                    echo '<div class="alert alert-danger mt-3">' . $errorMessage . '</div>';
                }
                ?>
            </div>
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

<?php
mysqli_close($conn);
?>
