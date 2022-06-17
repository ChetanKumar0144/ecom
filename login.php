<?php
session_start();
$msg = " ";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<!-- register section -->
    <section class="register" id="register">
        <h1>Register</h1>
        <form action="./php_actions/code.php" method="POST">
            <div class="input-container">
                <input type="text" name="name" id="" placeholder="Full Name" required>
            </div>
            <div class="input-container">
                <input type="email" name="email" id="" placeholder="Email Address" required>
            </div>
            <div class="input-container">
                <input type="tel" name="phone" id="" placeholder="Phone Number" required>
            </div>
            <div class="input-container">
                <input type="password" name="password" id="" placeholder="Create Password"required>
            </div>
            <div class="input-container">
                <input type="password" name="cpassword" id="" placeholder="Confirm Password" required>
            </div>
            <hr>
            <div class="button">
                <button class="btn-submit" name="submit" type="submit">Submit</button>
            </div>
            <div class="extra">
                <p>have an account? <span class="pointer" onclick="document.getElementById('login').style.display='block'; document.getElementById('register').style.display='none';">Login here</span></p>
            </div>
        </form>
    </section>

    <!-- login section -->
    <section class="login" id="login" >
        <h1>Login</h1>
        <form action="./php_actions/code.php" method="POST">
            <div class="input-container">
                <input type="email" name="email" id="login" placeholder="Email Address" required>
            </div>
            <div class="input-container">
                <input type="password" name="password" id="" placeholder="Password" required>
            </div>
            <div class="extra">
                <input type="checkbox" required><a href="">Accept terms and Conditions</a>
            </div>
            <hr>
                <?php echo $msg; ?>

            <div class="button">
                <button class="btn-submit" name="login" type="submit">Submit</button>
            </div>
            <div class="extra">
                <p>Don't have an account? <span class="pointer" onclick="document.getElementById('register').style.display='block'; document.getElementById('login').style.display='none';">Register Now</span></p>
            </div>
        </form>
    </section>
</body>
</html>