<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginprocss.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>register</title>
</head>

<body>
    <div class="blur-overlay2">
        <div class="wrapper">
            <form action="../SSS/auth.php" method="post">
                <h1> Register </h1>
                <div class="input-box">
                    <input type="text" name="name" placeholder="Enter your name" required>
                    <i style="color: white;font-size: 2rem;" class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="phone" placeholder="Enter phone no" required>
                    <i style="color: white;font-size: 2rem;" class='bx bxs-phone'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="@email" required>
                    <i style="color: white;font-size: 2rem;" class='bx bxl-gmail'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i style="color: white;font-size: 2rem;" class='bx bxs-lock-alt'></i>
                </div>
                <input class="btn" type="submit" name="regbtn" value="Register">
                <div class="register-link">
                    <p>Already have an account ?
                        <a href="./loginpro.php">Login</a>
                    </p>
                </div>
        </div>
        </form>
    </div>




</body>

</html>