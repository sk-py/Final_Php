<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <Link Rel="Stylesheet" href="./loginprocss.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Register</title>
</head>

<body>
    <div class="blur-overlay1">
        <div class="wrapper">
            <form method="Post" action="../SSS/auth.php">
                <h1>
                    Login </h1>
                <div class="input-box">
                    <input type="text" name="email" placeholder="Enter Email" required>
                    <i style="font-size: 1.6rem;" class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Enter Password" required>
                    <i style="font-size: 1.6rem;" class='bx bxs-lock-alt'></i>
                </div>

                <!-- <div class="rember-forget">
                <label><input type="checkbox"> Remember Me </label>
                <a href="register.php"> Forget password </a>
            </div> -->

                <input class="btn" type="submit" name="logbtn" value="Login">

                <div class="register-link">
                    <p>Don't have an account ?
                        <a href="./register.php">Register</a>
                    </p>
                </div>
            </form>
        </div>
</body>

</html>