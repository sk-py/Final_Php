<?php
session_start();
require('../SSS/connection.php');

if (isset($_POST['reg_btn'])) {
    $number = $_POST['number'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $imgpath = random_int(0, 99999) . $_FILES['profile']['name'];
    $temploc = $_FILES['profile']['tmp_name'];


    $chq_query = "SELECT `email`,`number` FROM `users` WHERE `email`='$email' OR `number`='$number'";
    $rquery = mysqli_query($conn, $chq_query);

    if (mysqli_num_rows($rquery) > 0) {
        echo "<center style='margin:20rem'><h2>Record Already Exists</h2><br><br><br><br><a href='login.php'><h4>Click Here To Login <h4></a></center>";
    } else {
        $query = "INSERT INTO `users`(`number`, `name`, `email`, `password`,`user_pp`) VALUES ('$number','$name','$email','$password','$imgpath')";

        $rquery = mysqli_query($conn, $query);

        if ($rquery) {
            move_uploaded_file($temploc, IMG_PATH . $imgpath);
            header("Location:../Php/header.php");
        } else {
            echo "Unknow Error Occurred While Uploading Data Into Database";
        }

    }
}

if (isset($_POST['log_btn'])) {
    $email = $_POST['semail'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM `student_data` WHERE email= ? AND password= ? ");
    $query->bind_param("ss", $email, $password);
    $query->execute();
    $response = $query->get_result()->fetch_all(MYSQLI_ASSOC);

    if ($response == true) {
        foreach ($response as $resp) {
            echo $_SESSION['roll'] = $resp['roll'];
            $_SESSION['sname'] = $resp['name'];
            $_SESSION['semail'] = $resp['email'];
        }
        $_SESSION['logged_in'] = "Logged In Succesfully";
        header("Location:../Php/home.php");
    } else {
        echo "Wrong Password";
    }
}


?>