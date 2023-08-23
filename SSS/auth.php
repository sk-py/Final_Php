<?php
include 'connection.php';

if (isset($_POST['page'])) {

    $page = $_POST['page'];
    $recordsPerPage = 10;
    $startIndex = $page * $recordsPerPage;
    $query = "SELECT * FROM `demo_data` LIMIT $startIndex, $recordsPerPage";


    $data = mysqli_query($conn, $query);

    foreach ($data as $row) {
        echo <<<Data
            <span style="border: 2px solid black;margin-top: 10px;display: flex;">
                &nbsp;&nbsp;
                <h5 style="min-width:20px;">
                     $row[id] 
                </h5>&nbsp;&nbsp;&nbsp;
                <h4 style="min-width:20px;display: flex;flex-direction: row;">
                     $row[name]
                </h4>&nbsp;&nbsp;
            </span>
        Data;
    }
}

if (isset($_POST['add_prods_btn'])) {
    $pname = $_POST["p_name"];
    $pdesc = $_POST["p_desc"];
    $price = $_POST["price"];
    $pcategory = $_POST["category"];

    $imgpath = random_int(0, 99999) . $_FILES['prod_img']['name'];
    $temploc = $_FILES['prod_img']['tmp_name'];



    $query = mysqli_query($conn, "INSERT INTO `product_table`(`product_name`, `category`, `description`, `price`, `image`) VALUES ('$pname','$pcategory','$pdesc','$price','$imgpath')");

    if ($query) {
        move_uploaded_file($temploc, IMG_PATH . $imgpath);
        echo "FILES AND DATA UPLOADED";
    } else {
        echo "UNKNOWN ERROR OCCURED";
    }
}




?>