<?php
session_start();
require_once('db_connection.php'); // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email is already registered
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Email already exists
        header('Location: registration.php?error=email_exists');
        exit();
    } else {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $insertQuery = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$hashedPassword')";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            // Registration successful
            header('Location: login.php?success=registration_success');
            exit();
        } else {
            // Registration failed
            header('Location: registration.php?error=registration_failed');
            exit();
        }
    }
} else {
    // Invalid request method
    header('Location: registration.php');
    exit();
}
?>
