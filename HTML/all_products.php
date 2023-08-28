<?Php include '../SSS/connection.php' ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="../Styles/header.css"> -->
    <link rel="stylesheet" href="../Styles/pcard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Fira+Sans:wght@200;
        400&family=Jost:wght@300;400;600&family=Manrope:wght@200;300;400;500;600;700;800&family=Montserrat:wght@200;300;400;800&family=Varela+Round&display=swap"
        rel="stylesheet">

</head>

<body>




    <div class="wrapper-div">
        <div class="banner-latest">

        </div>
        <div class="latest_products_section">
            <?Php
            $query = "SELECT * FROM `product_table`";
            $result = mysqli_query($conn, $query);

            while ($fetch = mysqli_fetch_assoc($result)) {
                $pid = $fetch['id'];
                $description = $fetch['description'];
                $product_name = $fetch['product_name'];
                $price = $fetch['price'];
                $image = $fetch['image'];

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
                        <?Php echo $fetch['last_updated'] ?>
                    </sub>
                </div>

                <?Php

            }
            ?>
        </div>