<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="CSS/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body class="pitchAvailability-body">
    <?php include 'navbar.php'; ?><br><br><br><br>
    <div class="container">
        <h1 class="mt-5">Pitch Types and Availability</h1>

        <!-- Form Searching pitchs  -->
        <form method="GET">
            <div class="mb-3">
                <label for="pitch_type" class="form-label">Select Pitch Type:</label>
                <select class="form-select" name="pitch_type" id="pitch_type">
                    <option value="tent">Tent Pitch</option>
                    <option value="caravan">Touring Caravan Pitch</option>
                    <option value="motorhome">Motorhome Pitch</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="arrival_date" class="form-label">Arrival Date:</label>
                <input type="date" class="form-control" name="arrival_date" id="arrival_date" required>
            </div>
            <div class="mb-3">
                <label for="departure_date" class="form-label">Departure Date:</label>
                <input type="date" class="form-control" name="departure_date" id="departure_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Search Availability</button>
        </form>

        <!-- Display Search Results -->
        <?php

            require_once('db_connection.php'); 

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                // Check if the 'pitch_type' parameter is set in the URL
                if (isset($_GET['pitch_type'])) {
                   
                    $pitchType = $_GET['pitch_type'];
                    $arrivalDate = $_GET['arrival_date'];
                    $departureDate = $_GET['departure_date'];

                    
                    $sql = "SELECT pitch_number, is_available FROM availability
                            WHERE pitch_type = '$pitchType'
                            AND arrival_date >= '$arrivalDate'
                            AND departure_date <= '$departureDate'";

                   
                    $queryResults = [];
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            $queryResults[] = $row;
                        }

                      
                        echo '<h2 class="mt-4">Search Results:</h2>';
                        echo '<table class="table">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th scope="col">Pitch Number</th>';
                        echo '<th scope="col">Availability</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        foreach ($queryResults as $result) {
                            echo '<tr>';
                            echo '<td>' . $result['pitch_number'] . '</td>';
                            echo '<td>' . $result['is_available'] . '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        
                        echo '<p>Error executing the query: ' . mysqli_error($conn) . '</p>';
                    }

                    
                    mysqli_close($conn);
                } else {
                    
                    echo '<p>Please select a pitch type.</p>';
                }
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
