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
                        <i class="fa-regular fa-share-from-square"
                            style="color: darkblue;padding: 0.5rem;font-size: 2rem;cursor: pointer;" id="copyButton"></i>
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
                </div>
                <a id="contact_btn" href="mailto:shaikh56742@gmail.com">Contact Seller
                </a>
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










            <!-- 
            <div class="product_card">
                <span id="prod_img_span">
                    <img src="<?Php echo FETCH_PATH . $image ?>" alt="">
                </span>
                <div class="content-div">
                    <h4>
                        <?Php echo $product_name ?>
                    </h4>
                    -- <h5 id="trunc_desc">
                        <?Php echo $description ?>
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


 -->









            <?Php
    }
}


?>
</body>

</html>