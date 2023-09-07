<?Php
session_start();
include '../SSS/connection.php';
if (!isset($_SESSION['uemail'])) {
    header('location:../login/loginpro.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../Styles/add_products.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
</head>

<body style="width:100svw;height: 100dvh;display: flex;align-items: center;justify-content: center;">
    <?Php
    if (isset($_POST['prod_update_btn'])) {
        $pid = $_POST['prod_update_btn'];

        $query = "SELECT * FROM `product_table` WHERE `id`='$pid'";
        $reslt = mysqli_query($conn, $query);

        while ($detail = mysqli_fetch_assoc($reslt)) {
            $name = $detail['product_name'];
            $p_desc = $detail['description'];
            $price = $detail['price'];
            $category = $detail['category'];
            $p_img = $detail['image'];
            $pid = $_POST['prod_update_btn'];
            ?>





            <div class="col-md-4 offset-md-0 mt-5 p-2 border shadow rounded-4">
                <form accept-charset="UTF-8" action="./products_detail.php" method="POST" enctype="multipart/form-data"
                    class="d-flex align-items-center justify-content-center flex-column">
                    <h3>Product Details</h3>
                    <div class="form-group w-75">
                        <div class="form-group w-75">
                            <label for="exampleFormControlSelect1" class="fs-5 p-1">Select Category</label>

                            <input type="text" name="" class="form-control" id="exampleInputName"
                                placeholder="Enter product name  " required="required" value="<?Php echo $category ?>" readonly>
                        </div><br>
                    </div><br>
                    <div class="form-group w-75">
                        <label for="exampleInputName" class="fs-5 p-1">Product Name</label>
                        <input type="text" name="p_name" class="form-control" id="exampleInputName"
                            placeholder="Enter product name  " required="required" value="<?Php echo $name ?>">
                    </div><br>
                    <div class="form-group w-75">
                        <label for="exampleInputEmail1" required="required" class="fs-5 p-1">Description</label>
                        <input type="text" name="p_desc" class="form-control" value="<?Php echo $p_desc ?>"
                            placeholder="Enter a brief description of product ">
                        <sub class="fw-semibold">Include Keywords which describes the best about your product to enhance search
                            visibility</sub>
                    </div><br>
                    <div class="form-group w-75">
                        <label for="exampleInputEmail1" required="required" class="fs-5 p-1">Price</label>
                        <input type="number" name="price" class="form-control" value="<?Php echo $price ?>"
                            placeholder="Enter Price in &#8377;">
                    </div>
                    <hr>
                    <div class="form-group mt-3 w-75">
                        <label class="mr-2 fs-5 p-1">Upload image of product:</label>
                        <input type="file" name="prod_img" class="prod_img"><br>
                        <small class="">
                            <?Php echo $p_img ?> - Current Image
                        </small>
                        <small class="error text-danger"></small>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary" name="updt_prods_btn"
                        value="<?Php echo $pid ?>">Submit</button>
                </form>

                <?Php
        }
    }

    if (isset($_POST['prod_dltBtn'])) {
        $pid = $_POST['prod_dltBtn'];
        $query = "DELETE FROM `product_table` WHERE `id`='$pid'";
        $response = mysqLi_query($conn, $query);

        if ($response) {
            // header('location:./my_products.php');
            $dquery = "SELECT `image` FROM `product_table` WHERE `id`='$pid'";
            $dresponse = mysqLi_query($conn, $dquery);
            while ($img_add = mysqli_fetch_assoc($dresponse)) {
                unlink(FETCH_PATH . $img_add);
            }
        }
    }
    ?>
        <script>
            $('.prod_img').on('change', function () {
                var maxFileSize = 2048000;
                var fileSize = this.files[0].size;

                if (fileSize > maxFileSize) {
                    $('.error').html('File size is too large. Maximum size is 2 MB.<br> <a href="https://www.reduceimages.com/" target="_blank">Reduce image size from here</a>');
                    this.value = '';
                } else {
                    $('.error').text('');
                }
            });
        </script>
    </div>




</body>

</html>