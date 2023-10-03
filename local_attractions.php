<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Attractions</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your custom CSS for the Local Attractions page -->
    <link rel="stylesheet" href="CSS/local_attractions.css">
</head>
<body>
<?php include 'navbar.php'; ?>
<br><br><br>
    <div class="container">
        <h1 class="mt-5">Local Attractions</h1>

        <div class="row mt-4">
            <!-- Local Attraction Card 1 -->
            <div class="col-md-4">
                <div class="card local-attractions-card">
                    <img src="images/attraction1.jpg" class="card-img-top" alt="Attraction 1">
                    <div class="card-body">
                        <h5 class="card-title">Attraction 1</h5>
                        <p class="card-text">Description of Attraction 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Local Attraction Card 2 -->
            <div class="col-md-4">
                <div class="card local-attractions-card">
                    <img src="images/attraction2.jpg" class="card-img-top" alt="Attraction 2">
                    <div class="card-body">
                        <h5 class="card-title">Attraction 2</h5>
                        <p class="card-text">Description of Attraction 2. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Local Attraction Card 3 -->
            <div class="col-md-4">
                <div class="card local-attractions-card">
                    <img src="images/attraction3.jpg" class="card-img-top" alt="Attraction 3">
                    <div class="card-body">
                        <h5 class="card-title">Attraction 3</h5>
                        <p class="card-text">Description of Attraction 3. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery (for Bootstrap) if needed -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
