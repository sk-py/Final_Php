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
</head>
</head>

<body style="width:100svw;height: 100dvh;display: flex;align-items: center;justify-content: center;">
    <!-- <form action="" method="post" enctype="multipart/form-data"
        style="border:10px solid black;border-radius:4rem;width:50%;height:50%;padding:1rem">
        <span>
            <label for="Category">Select Category</label>
            <select name="category">
                <option value="Mobile">Mobile</option>
                <option value="Home Essentials">Home Essentials</option>
                <option value="Computers">Computers</option>
                <option value="Fashion">Fashion</option>
                <option value="Others">Others</option>
            </select>
        </span>






    </form> -->





    <div class="col-md-4 offset-md-0 mt-5 p-2 border shadow rounded-4">
        <form accept-charset="UTF-8" action="../SSS/auth.php" method="POST" enctype="multipart/form-data"
            class="d-flex align-items-center justify-content-center flex-column">
            <h3>Product Details</h3>
            <div class="form-group w-75">
                <label for="exampleFormControlSelect1" class="fs-5 p-1">Select Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category" required="required">
                    <option value="Mobile">Select below options</option>
                    <option value="Mobile">Mobile</option>
                    <option value="Home Essentials">Home Essentials</option>
                    <option value="Computers">Computers</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Others">Others</option>
                </select>
            </div><br>
            <div class="form-group w-75">
                <label for="exampleInputName" class="fs-5 p-1">Product Name</label>
                <input type="text" name="p_name" class="form-control" id="exampleInputName"
                    placeholder="Enter product name  " required="required">
            </div><br>
            <div class="form-group w-75">
                <label for="exampleInputEmail1" required="required" class="fs-5 p-1">Description</label>
                <input type="text" name="p_desc" class="form-control"
                    placeholder="Enter a brief description of product ">
                <sub class="fw-semibold">Include Keywords which describes the best about your product to enhance search
                    visibility</sub>
            </div><br>
            <div class="form-group w-75">
                <label for="exampleInputEmail1" required="required" class="fs-5 p-1">Price</label>
                <input type="number" name="price" class="form-control" placeholder="Enter Price in &#8377;">
            </div>
            <hr>
            <div class="form-group mt-3 w-75">
                <label class="mr-2 fs-5 p-1">Upload image of product:</label>
                <input type="file" name="prod_img">
            </div>
            <hr>
            <button type="submit" class="btn btn-primary" name="add_prods_btn">Submit</button>
        </form>
    </div>




</body>

</html>