<?php
session_start();
require_once('db_connection.php'); // Include your database connection file

// Check if the user is already locked out
if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 3 && time() - $_SESSION['lockout_start'] < 600) {
    header('Location: login.php?error=account_locked');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to check if the user exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password (you should use password_hash() when registering users)
        if (password_verify($password, $user['password'])) {
            // Authentication successful
            $_SESSION['user_id'] = $user['uid'];
            $_SESSION['user_firstname'] = $user['firstname'];
            $_SESSION['user_lastname'] = $user['lastname'];

            // Reset login attempts
            unset($_SESSION['login_attempts']);
            unset($_SESSION['lockout_start']);

            // Redirect to a protected page
            header('Location: index.php');
            exit();
        } else {
            // Invalid password
            incrementLoginAttempts();
            header('Location: login.php?error=invalid_password');
            exit();
        }
    } else {
        // User not found
        incrementLoginAttempts();
        header('Location: login.php?error=user_not_found');
        exit();
    }
} else {
    // Invalid request method
    header('Location: login.php');
    exit();
}

function incrementLoginAttempts() {
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 1;
        $_SESSION['lockout_start'] = time();
    } else {
        $_SESSION['login_attempts']++;
        if ($_SESSION['login_attempts'] >= 3) {
            $_SESSION['lockout_start'] = time();
        }
    }
}
?>
