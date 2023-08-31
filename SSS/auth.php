<?php
include 'connection.php';

if (isset($_POST['page'])) {

    $page = $_POST['page'];
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
            <form action="products_detail.php" method="Post">
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

    $imgpath = random_int(0, 99999) . $_FILES['prod_img']['name'];
    $temploc = $_FILES['prod_img']['tmp_name'];


    $q = "INSERT INTO `product_table`(`product_name`, `category`, `description`, `price`, `image`,`last_updated`) VALUES ('$pname','$pcategory','$pdesc','$price','$imgpath', NOW())";
    $query = mysqli_query($conn, $q);

    if ($query) {
        move_uploaded_file($temploc, IMG_PATH . $imgpath);
        header("location:../HTML/header.php");
        echo "FILES AND DATA UPLOADED";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}




?>