<?php
session_start();
$host = "localhost";
$user = "root";
$pswd = "";
$db = "ecom_db";

$conn = mysqli_connect($host, $user, $pswd, $db);
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $r1 = mysqLi_query($conn, "select * from users where email='$email' && password='$password'");
    $r2 = mysqli_fetch_assoc($r1);
    if (mysqli_num_rows($r1) > 0) {
        $_SESSION['uemail'] = $_POST['email'];
        $_SESSION['authorized'] = true;
        header("location:../HTML/header.php");


    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <Link Rel="Stylesheet" href="loginprocss.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Register</title>
</head>

<body>
    <div class="wrapper">
        <form method="post">
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

            <input class="btn" type="submit" name="submit" value="Login">

            <div class="register-link">
                <p>Don't have an account ?
                    <a href="./register.php">Register</a>
                </p>
            </div>
        </form>
</body>

</html>