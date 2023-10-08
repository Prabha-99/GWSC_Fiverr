<?php

// Configure SMTP settings
ini_set("SMTP", "smtp.gmail.com"); // SMTP server
ini_set("smtp_port", "587"); // port
ini_set("sendmail_from", "example@gmail.com"); // email address

// variables for form input and error messages
$name = $email = $message = $successMessage = $errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    
    if (empty($name) || empty($email) || empty($message)) {
        $errorMessage = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = 'Invalid email format.';
    } else {
        // Send email 
        $to = 'example@gmail.com'; 
        $subject = 'New Contact Form Submission';
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        $mailBody = "Name: $name<br>";
        $mailBody .= "Email: $email<br><br>";
        $mailBody .= "Message:<br>$message";

        if (mail($to, $subject, $mailBody, $headers)) {
            
            $successMessage = 'Your message has been sent successfully!';
        } else {
            
            $errorMessage = 'Error sending your message. Please try again later.';
        }
    }
}
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
    <title>Contact Us</title>
</head>
<body class="contact-body">
    <?php include 'navbar.php'; ?><br><br><br>
    
    <div class="container">
        <h1 class="mt-5">Contact Us</h1>

        <!-- Display success or error message -->
        <?php
        if (!empty($successMessage)) {
            echo '<div class="alert alert-success mt-3">' . $successMessage . '</div>';
        }
        if (!empty($errorMessage)) {
            echo '<div class="alert alert-danger mt-3">' . $errorMessage . '</div>';
        }
        ?>

        <!-- Contact Form -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message:</label>
                <textarea class="form-control" name="message" id="message" rows="4" required><?php echo $message; ?></textarea>
            </div>
            <button type="submit" class="btn btn-success">Send Message</button>
        </form>
        
        <!-- Privacy Policy Link -->
        <div class="mt-4">
            <a href="privacy_policy.php">Privacy Policy</a>
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
