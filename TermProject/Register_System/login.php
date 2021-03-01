<?php
    session_start();
    include('server.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="header">
        <h2>Login</h2>
    </div>

    <form action="login_db.php" method="post">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" name="login_user" class="btn">Login</button>
        </div>
        <div class="text-center">
            <a href="/mainpage.html" class="btn btn-outline-success btn-lg active" role="button"
            aria-pressed="true">Get Started</a>
            <br><br>
            <a href="/Admin/main.html" class="btn btn-outline-success btn-lg active" role="button"
            aria-pressed="true">Admin</a>
            <br><br>
        </div>
        
        <p>Not yet a member? <a href="register.php">Sign Up</a></p>
    </form>

</body>
</html>