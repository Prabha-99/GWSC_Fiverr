<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="CSS/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    
</head>
<body class="registration-body">
    <div class="container-fluid">
        <div class="row">
            <!-- Left Column with Image -->
            <div class="col-md-6">
                <img src="ASSETS/reg.jpg" alt="Registration Image" class="img-fluid">
            </div>
            
            <!-- Right Column with Registration Form -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="container">
                    <h1 class="mt-5">Registration</h1>
                    <form action="register_process.php" method="POST">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                        </div>

                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-success">Register</button>
                    </form>
                    <div class="mt-4">
                        Already have an account..?<a href="login.php">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src=”https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js”></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="SCRIPTS/scroll.js"></script>
</body>
</html>
