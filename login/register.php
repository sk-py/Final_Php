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
    <div class="wrapper">
        <form method="post">
            <h1> Register </h1>
            <div class="input-box">
                <input type="text" name="name" placeholder="Enter your name" required>
                <i style="color: white;font-size: 2rem;" class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" name="phone" placeholder="Enter phone no" required>
                <i style="color: white;font-size: 2rem;" class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="@email" required>
                <i style="color: white;font-size: 2rem;" class='bx bxl-gmail'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i style="color: white;font-size: 2rem;" class='bx bxs-lock-alt'></i>
            </div>
            <input class="btn" type="submit" name="register" value="Register">
            <div class="register-link">
                <p>Already have an account ?
                    <a href="./loginpro.php">Register</a>
                </p>
            </div>
    </div>
    </form>
    <?php
    $host = "localhost";
    $user = "root";
    $pswd = "";
    $db = "ecom_db";

    $conn = mysqLi_connect($host, $user, $pswd, $db);
    if ($conn) {
        if (isset($_POST['register'])) {
            $n = $_POST['username'];
            $e = $_POST['email'];
            $p = $_POST['password'];
            if ($n == null || $e == null || $p == null) {
                echo "feild cannot be emapty";
            } else {
                $query = "insert into shop values('$n','$e','$p')";
                $p = mysqLi_query($conn, $query);

            }
        }
    }
    ?>

</body>

</html>