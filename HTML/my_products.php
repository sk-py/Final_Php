<?Php
session_start();
include '../SSS/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/pcard.css">
</head>

<body>



    <div class="wrapper-div">
        <div class="banner-latest">
            <h2>Your Products</h2>
        </div>
        <div class="latest_products_section">
            <?Php
            $uemail = $_SESSION['uemail'];
            $query = "SELECT * FROM `product_table` where `posted_by`='$uemail'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {

                while ($fetch = mysqli_fetch_assoc($result)) {
                    $pid = $fetch['id'];
                    $description = $fetch['description'];
                    $product_name = $fetch['product_name'];
                    $price = $fetch['price'];
                    $image = $fetch['image'];

                    $truncatedDescription = strlen($description) > 80 ? substr($description, 0, 80) . "..." : $description;
                    ?>
                    <div class="product_card2">
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
                        <form action="./prod_update.php" method="POST">
                            <button type="submit" value="<?Php echo $pid ?>" name="prod_update_btn" id="prod_view_btn">Update
                                item
                            </button>
                            <button type="submit" value="<?Php echo $pid ?>" name="prod_dltBtn" id="prod_dltBtn">Delete
                                item
                            </button>
                        </form>
                        <sub style="font-size:0.8rem;padding: 0.2rem;">
                            Last updated -
                            <?Php echo $fetch['last_updated'] ?>
                        </sub>
                    </div>

                    <?Php

                }
            } else {
                ?>
            </div>
            <center>
                <span style="width: 100vw;text-align: center;margin: auto;">
                    <h2>You hav not added any products</h2><br>
                    <h3>You can add from <a href="./add_products.php" style="text-decoration: none;">HERE</a></h3>
                </span>
            </center>
        </div>

        <?Php
            }
            ?>

    </div>
    </div>

</body>

</html>