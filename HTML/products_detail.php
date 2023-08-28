<?Php
include '../SSS/connection.php';
?>

<?Php

if (isset($_POST['prod_view_btn'])) {
    $pid = $_POST['prod_view_btn'];
    $query = "SELECT * FROM `product_table` WHERE `id`=$pid";
    $result = mysqli_query($conn, $query);
    while ($p_details = mysqli_fetch_assoc($result)) {
        $pid = $p_details['id'];
        $description = $p_details['description'];
        $product_name = $p_details['product_name'];
        $price = $p_details['price'];
        $image = $p_details['image'];
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>
                <?Php echo $product_name ?> : Details
            </title>





        </head>

        <body>

            <div class="product_card">
                <span id="prod_img_span">
                    <img src="<?Php echo FETCH_PATH . $image ?>" alt="">
                </span>
                <div class="content-div">
                    <h4>
                        <?Php echo $product_name ?>
                    </h4>
                    -- <h5 id="trunc_desc">
                        <?Php echo $truncatedDescription ?>
                    </h5> ->
                    <p>
                        <?Php echo $price ?> &#8377;
                    </p>

                </div>

                <sub style="font-size:0.8rem;padding: 0.2rem;">
                    Last updated -
                    <?Php echo $p_details['last_updated'] ?>
                </sub>
            </div>












            <?Php
    }
}


?>
</body>

</html>