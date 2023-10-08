<?php
session_start();
require_once('db_connection.php'); // database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email is already registered
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        
        header('Location: registration.php?error=email_exists');
        exit();
    } else {
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        
        $insertQuery = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$hashedPassword')";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
          
            header('Location: login.php?success=registration_success');
            exit();
        } else {
            
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
