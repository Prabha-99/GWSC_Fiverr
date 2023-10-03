<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitch Types and Availability</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Pitch Types and Availability</h1>

        <!-- Search Form -->
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
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                // Check if the 'pitch_type' parameter is set in the URL
                if (isset($_GET['pitch_type'])) {
                    // Retrieve search parameters
                    $pitchType = $_GET['pitch_type'];
                    $arrivalDate = $_GET['arrival_date'];
                    $departureDate = $_GET['departure_date'];

                    // Perform database query using these parameters
                    // Replace this with your actual database query
                    require_once('db_connection.php'); // Include your database connection file

                    // Define the SQL query
                    $sql = "SELECT pitch_number, is_available FROM availability
                            WHERE pitch_type = '$pitchType'
                            AND arrival_date >= '$arrivalDate'
                            AND departure_date <= '$departureDate'";

                    // Execute the query
                    $queryResults = [];
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        // Fetch and store the query results
                        while ($row = mysqli_fetch_assoc($result)) {
                            $queryResults[] = $row;
                        }

                        // Display the search results
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
                            echo '<td>' . $result['availability'] . '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        // Handle query execution error
                        echo '<p>Error executing the query: ' . mysqli_error($conn) . '</p>';
                    }

                    // Close the database connection
                    mysqli_close($conn);
                } else {
                    // Display an error message if 'pitch_type' is not set
                    echo '<p>Please select a pitch type.</p>';
                }
            }
?>


    </div>

    <!-- Add Bootstrap JS and jQuery (for Bootstrap) if needed -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
