<?php
session_start();
include 'connection.php';


if (isset($_GET['page'])) {

    $page = $_GET['page'];
    $recordsPerPage = 8;
    $startIndex = $page * $recordsPerPage;
    $query = "SELECT * FROM `product_table` LIMIT $startIndex, $recordsPerPage";


    $data = mysqli_query($conn, $query);

    foreach ($data as $row) {
        $pid = $row['id'];
        $description = $row['description'];
        $product_name = $row['product_name'];
        $price = $row['price'];
        $image = $row['image'];

        $truncatedDescription = strlen($description) > 80 ? substr($description, 0, 80) . "..." : $description;
        ?>


        <div class="product_card">
            <span id="prod_img_span">
                <img src="<?Php echo FETCH_PATH . $image ?>" alt="">
            </span>
            <div class="content-div">
                <h4>
                    <?Php echo $product_name ?>
                </h4>
                <h5 id="trunc_desc">
                    <?Php echo $truncatedDescription ?>
                </h5>
                <p>
                    <?Php echo $price ?> &#8377;
                </p>

            </div>
            <form action="products_detail.php" method="Get">
                <button type="submit" value="<?Php echo $pid ?>" name="prod_view_btn" id="prod_view_btn">Detailed
                    View
                </button>
            </form>
            <sub style="font-size:0.8rem;padding: 0.2rem;">
                Last updated -

                <?Php echo $row['last_updated'] ?>
            </sub>
        </div>
        <?Php

    }
}

if (isset($_POST['add_prods_btn'])) {
    $pname = $_POST["p_name"];
    $pdesc = $_POST["p_desc"];
    $price = $_POST["price"];
    $pcategory = $_POST["category"];
    $posted_by = $_SESSION['uemail'];
    $posted_by_name = $_SESSION['name'];
    $imgpath = random_int(0, 99999) . $_FILES['prod_img']['name'];
    $temploc = $_FILES['prod_img']['tmp_name'];

    $clean_desc = mysqli_escape_string($conn, $pdesc);

    $q = "INSERT INTO `product_table`(`product_name`, `category`, `description`, `price`, `image`,`last_updated`,`posted_by`,`posted_by_name`) VALUES ('$pname','$pcategory','$clean_desc','$price','$imgpath', NOW(),'$posted_by','$posted_by_name')";
    $query = mysqli_query($conn, $q);

    if ($query) {
        move_uploaded_file($temploc, IMG_PATH . $imgpath);
        header("location:../HTML/header.php");
        echo "FILES AND DATA UPLOADED";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}



if (isset($_POST['regbtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pswd = $_POST['password'];
    $user_pp = "default_img.png";

    $query = "INSERT INTO users (`name`,`email`,`password`,`phone`,`user_pp`) Values ('$name','$email','$pswd','$phone','$user_pp')";
    $response = mysqLi_query($conn, $query);

    if ($response) {
        $_SESSION['uemail'] = $email;
        $_SESSION['name'] = $name;
        $_SESSION['user_img'] = $user_pp;
        // $_SESSION['authorized'] = true;
        header('location:../HTML/header.php');
    } else {
        echo "<center><h3>An unknown error occurred while signing you up <br> Please try again  </h3></center>";
    }


}






if (isset($_POST['logbtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $res1 = mysqLi_query($conn, "select * from users where email='$email' && password='$password'");
    foreach ($res1 as $nres) {
        $_SESSION['name'] = $nres['name'];
        $_SESSION['user_img'] = $nres['user_pp'];

    }

    if (mysqli_num_rows($res1) > 0) {
        $_SESSION['uemail'] = $email;
        // $_SESSION['authorized'] = true;
        header("location:../HTML/header.php");
    } else {
        echo "<center><h3>Incorrect Password or Email Entered <br> Please try again  </h3></center>";
    }
}


if (isset($_GET['logoutbtn'])) {
    session_destroy();
    header('location:../login/loginpro.php');
}


if (isset($_POST['email'])) {
    $em = $_POST['email'];
    $query = "SELECT * FROM `users` WHERE email='$em'";
    $response = mysqLi_query($conn, $query);

    if (mysqli_num_rows($response) > 0)
        echo "A User With This Email Already Exists..! Please Try Using Different Email.";
}


if (isset($_POST['scbtn'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $pswd = $_POST['pswd'];

    if ($_FILES['image']['size'] > 0) {
        $user_pp = random_int(0, 99999) . $_FILES['image']['name'];
        $temploc = $_FILES['image']['tmp_name'];

        if (file_exists(USER_IMG_PATH . $_SESSION['user_img'])) {
            unlink(USER_IMG_PATH . $_SESSION['user_img']);
        }

        move_uploaded_file($temploc, USER_IMG_PATH . $user_pp);
        $user_img = $user_pp;

        $query = "UPDATE `users` SET `name`='$name',`password`='$pswd',`phone`='$phone',`user_pp`='$user_img' WHERE `email`='$_SESSION[uemail]'";
        $pquery = "UPDATE `product_table` SET `posted_by_name`='$name' WHERE `posted_by`='$_SESSION[uemail]'";
    } else {
        $pquery = "UPDATE `product_table` SET `posted_by_name`='$name' WHERE `posted_by`='$_SESSION[uemail]'";
        $query = "UPDATE `users` SET `name`='$name',`password`='$pswd',`phone`='$phone' WHERE `email`='$_SESSION[uemail]'";
    }

    $response = mysqli_query($conn, $query);

    if ($response) {
        mysqli_query($conn, $pquery);
        header("location:../HTML/user_profile/profile_page.php");
    } else {
        echo "<center><h3>An unknown error occurred while updating your data. Please try again.</h3></center>";
    }
}



if (isset($_POST['dltBtn'])) {
    $email = $_POST['email'];
    $query = "DELETE FROM `users` WHERE `email`='$email'";
    $response = mysqLi_query($conn, $query);

    if ($response) {
        $query = "DELETE FROM `product_table` WHERE `posted_by`='$email'";
        $response = mysqLi_query($conn, $query);
        session_destroy();
        header('location:../login/loginpro.php');
    }
}


?>