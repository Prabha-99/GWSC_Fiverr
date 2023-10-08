<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body class="login-body">
    <?php $page_id = 'login'; ?>

    <div class="container">
        <div class="row">
            <!-- Left Column with Image -->
            <div class="col-md-6">
                <img src="ASSETS/login." alt="Login Image" class="img-fluid">
            </div>
            
            <!-- Right Column with Login Form -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div>
                    <h1 class="mb-4">Login</h1>
                    <form action="login_process.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="row">
                            <div class="g-recaptcha" data-sitekey="6Lc2dXooAAAAAIAfUNT0DOVxbAGilMNK4Spr6Df_"></div>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Login</button>
                    </form>
                    <div class="mt-4">
                        Don't have account..?<a href="registration.php">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

<!-- Add this code at the end of your login.php file -->
<div class="modal fade" id="loginErrorModal" tabindex="-1" aria-labelledby="loginErrorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginErrorModalLabel">Login Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- This div will contain the error message -->
                <div id="loginErrorMessage"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Check if the URL has an error parameter (e.g., ?error=user_not_found)
    const urlParams = new URLSearchParams(window.location.search);
    const errorParam = urlParams.get('error');

    // Check if the errorParam is not null and show the modal with the corresponding error message
    if (errorParam === 'user_not_found') {
        // User not found error message
        document.getElementById('loginErrorMessage').innerHTML = 'User not found. Please check your email.';
        $('#loginErrorModal').modal('show');
    } else if (errorParam === 'account_locked') {
        // Account locked error message
        document.getElementById('loginErrorMessage').innerHTML = 'Your account is locked. Please try again later.';
        $('#loginErrorModal').modal('show');
    } else if (errorParam === 'invalid_password') {
        // Invalid password error message
        document.getElementById('loginErrorMessage').innerHTML = 'Invalid password. Please try again.';
        $('#loginErrorModal').modal('show');
    }
</script>
<!-- Add Bootstrap JS and jQuery (for Bootstrap) if needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
