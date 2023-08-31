<?php
$host = "localhost";
$user = "root";
$pswd = "";
$db = "login";

$conn = mysqLi_connect($host, $user, $pswd, $db);
if (isset($_POST['submit'])) {
    $email = $_POST['n1'];
    $password = $_POST['p1'];
    $r1 = mysqLi_query($conn, "select * from shop where username='$email' && password='$password'");
    $r2 = mysqli_fetch_assoc($r1);
    if (mysqli_num_rows($r1) > 0) {


        $_SESSION['login'] = true;
        $_SESSION['name'] = $r2['name'];
        header("location:register.php");


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
            <h1> Login </h1>
            <div class="input-box">
                <input type="text" name="n1" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="p1" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="rember-forget">
                <label><input type="checkbox"> Remember Me </label>
                <a href="register.php"> Forget password </a>
            </div>

            <input class="btn" type="submit" name="submit" value="login">

            <div class="register-link">
                <p>Don't have an account ?
                    <a href="#">Register</a>
                </p>
            </div>
        </form>
</body>

</html>