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
            
            <div class="col-md-6">
                <img src="ASSETS/login." alt="Login Image" class="img-fluid">
            </div>
            
            
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
                    <div id="countdown-container" class="mt-2">
                        Retry in: <span id="countdown"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


<div class="modal fade" id="loginErrorModal" tabindex="-1" aria-labelledby="loginErrorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginErrorModalLabel">Login Error</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div id="loginErrorMessage"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>



    <script>
        $(document).ready(function() {
            // Function to update the countdown timer
            function updateCountdown(seconds) {
                const minutes = Math.floor(seconds / 60);
                const remainingSeconds = seconds % 60;
                const countdownElement = document.getElementById('countdown');
                countdownElement.innerHTML = `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
            }

            // Function to lock and unlock the form
            function toggleFormLock(locked) {
                const emailInput = document.getElementById('email');
                const passwordInput = document.getElementById('password');
                const loginButton = document.querySelector('button[type="submit"]');

                emailInput.disabled = locked;
                passwordInput.disabled = locked;
                loginButton.disabled = locked;
            }

            // Check if the URL has an error parameter
            const urlParams = new URLSearchParams(window.location.search);
            const errorParam = urlParams.get('error');

            // Check if the errorParam is not null and show the modal with the corresponding error message
        if (errorParam === 'user_not_found') {
            
            document.getElementById('loginErrorMessage').innerHTML = 'User not found. Please check your email.';
            $('#loginErrorModal').modal('show');
        } else if (errorParam === 'account_locked') {
            
            document.getElementById('loginErrorMessage').innerHTML = 'Your account is locked. Please try again 10 minutes.';
            $('#loginErrorModal').modal('show');
        } else if (errorParam === 'invalid_password') {
            
            document.getElementById('loginErrorMessage').innerHTML = 'Invalid password. Please try again.';
            $('#loginErrorModal').modal('show');
        }

            if (errorParam === 'account_locked') {
                const lockoutTime = 600; // 10 minutes
                let remainingTime = lockoutTime;

                toggleFormLock(true);

                // Start the countdown
                const countdownInterval = setInterval(function() {
                    if (remainingTime > 0) {
                        updateCountdown(remainingTime);
                        remainingTime--;
                    } else {
                        toggleFormLock(false);
                        clearInterval(countdownInterval);
                        document.getElementById('countdown-container').style.display = 'none';
                    }
                }, 1000);
            } else {
                document.getElementById('countdown-container').style.display = 'none';
            }
        });
    </script>


<script src=”https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js”></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="SCRIPTS/scroll.js"></script>

</body>
</html>
