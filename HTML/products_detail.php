<?Php
session_start();
include '../SSS/connection.php';
?>

<?Php

if (isset($_GET['prod_view_btn'])) {
    $pid = $_GET['prod_view_btn'];
    $query = "SELECT * FROM `product_table` WHERE `id`=$pid";
    $result = mysqli_query($conn, $query);



    $recentlyViewed = isset($_COOKIE['recently_viewed']) ? json_decode($_COOKIE['recently_viewed']) : [];
    if (!in_array($pid, $recentlyViewed)) {
        array_unshift($recentlyViewed, $pid);
        setcookie('recently_viewed', json_encode($recentlyViewed), time() + 3600 * 24 * 7, '/');
    }



    while ($p_details = mysqli_fetch_assoc($result)) {
        $pid = $p_details['id'];
        $description = $p_details['description'];
        $product_name = $p_details['product_name'];
        $price = $p_details['price'];
        $email = $p_details['posted_by'];
        $image = $p_details['image'];
        $uploaded = $p_details['posted_by_name'];
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                <?Php echo $product_name ?> : Details
            </title>
            <link rel="stylesheet" href="../styles/pcard.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
                integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>

        <body>





            <div id="p_details_page">
                <div id="pd_img_div">
                    <a href="<?Php echo FETCH_PATH . $image ?>"><img src="<?Php echo FETCH_PATH . $image ?>" alt=""></a>
                </div>
                <div id="pd_content_box">
                    <span id="cont_span">
                        <h2>
                            <?Php echo $product_name ?>
                        </h2>

                        <svg xmlns="http://www.w3.org/2000/svg" height="28" viewBox="0 -960 960 960" width="28"
                            style="fill:darkblue;cursor: pointer;" id="copyButton">
                            <path
                                d="M720-80q-50 0-85-35t-35-85q0-7 1-14.5t3-13.5L322-392q-17 15-38 23.5t-44 8.5q-50 0-85-35t-35-85q0-50 35-85t85-35q23 0 44 8.5t38 23.5l282-164q-2-6-3-13.5t-1-14.5q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35q-23 0-44-8.5T638-672L356-508q2 6 3 13.5t1 14.5q0 7-1 14.5t-3 13.5l282 164q17-15 38-23.5t44-8.5q50 0 85 35t35 85q0 50-35 85t-85 35Zm0-640q17 0 28.5-11.5T760-760q0-17-11.5-28.5T720-800q-17 0-28.5 11.5T680-760q0 17 11.5 28.5T720-720ZM240-440q17 0 28.5-11.5T280-480q0-17-11.5-28.5T240-520q-17 0-28.5 11.5T200-480q0 17 11.5 28.5T240-440Zm480 280q17 0 28.5-11.5T760-200q0-17-11.5-28.5T720-240q-17 0-28.5 11.5T680-200q0 17 11.5 28.5T720-160Zm0-600ZM240-480Zm480 280Z" />

                        </svg>
                    </span>
                    <div id="cont_span3">
                        <p style="font-size: 1.5rem;padding:1rem;text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);">
                            Price :
                            &#8377
                            <?Php echo $price ?>
                        </p>
                        <p style="padding-inline: 1rem;padding-top: 1rem;">
                            Last updated :<br>
                            <?Php echo $p_details['last_updated'] ?>
                        </p>
                    </div>
                    <div id="cont_span2">
                        <label for="desc" style="font-weight: bold;font-size:1.7rem;">Description -</label><br>
                        <h4 id="desc">
                            <?Php echo $description ?>
                        </h4>
                    </div>
                    <div id="cont_span0">
                        <label for="posted_by" style="font-weight:400;font-size:1.5rem;">Uploaded by
                            -
                            <?Php echo $uploaded ?>
                        </label>

                        <img src="<?Php
                        $query = "SELECT `user_pp` FROM `users` WHERE `email`='$email'";
                        $res = mysqli_query($conn, $query);
                        foreach ($res as $uimg) {
                            echo "../user_img/" . $uimg['user_pp'];
                        } ?>" alt="" style="width: 45px;border-radius: 50%;height: 45px;object-fit:cover;">

                        <!-- <h4 id="desc">
                            
                        </h4> -->
                    </div>
                </div>
                <?Php if (isset($_SESSION['uemail'])) {
                    ?>
                    <a id="contact_btn" href="mailto:<?Php echo $email ?>">Contact Seller
                    </a>
                    <?php
                } else { ?>

                    <a id="contact_btn" href="../login/loginpro.php">Login to make a deal </a>

                    <?Php
                }

                ?>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var copyButton = document.getElementById('copyButton');
                    var currentURL = window.location.href;

                    copyButton.addEventListener('click', function () {
                        var tempInput = document.createElement('input');
                        tempInput.value = currentURL;
                        document.body.appendChild(tempInput);
                        tempInput.select();
                        document.execCommand('copy');
                        document.body.removeChild(tempInput);

                        alert('Link copied to clipboard: ' + currentURL);
                    });
                });
            </script>

            <?Php
    }
}

if (isset($_POST['updt_prods_btn'])) {
    $name = $_POST['p_name'];
    $pid = $_POST['updt_prods_btn'];
    $p_desc = $_POST['p_desc'];
    $price = $_POST['price'];
    if ($_FILES['prod_img']['size'] > 0) {
        $query = "SELECT `image` from `product_table` WHERE `id`='$pid'";
        $pre = mysqli_query($conn, $query);

        while ($pre_img = mysqli_fetch_assoc($pre)) {
            if (file_exists(FETCH_PATH . $pre_img['image'])) {
                unlink(FETCH_PATH . $pre_img['image']);
            }
        }


        $p_img = random_int(0, 99999) . $_FILES['prod_img']['name'];
        $temploc = $_FILES['prod_img']['tmp_name'];


        move_uploaded_file($temploc, FETCH_PATH . $p_img);
        $query = "UPDATE `product_table` SET `product_name`='$name',`description`='$p_desc',`price`='$price',`image`='$p_img',`last_updated`= NOW() WHERE `id`='$pid'";
    } else {
        $query = "UPDATE `product_table` SET `product_name`='$name',`description`='$p_desc',`price`='$price',`last_updated`= NOW() WHERE `id`='$pid'";

    }
    $response = mysqLi_query($conn, $query);

    if ($response) {

        // header('location:./my_products.php');
    } else {
        echo "An Unknown error occurred while updating details please try again";
    }
}
?>



</body>

</html>