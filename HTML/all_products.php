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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .all_products_page {
            margin-top: 4rem;
            margin-bottom: 3rem;
        }

        .wrapper-div {
            height: fit-content;
        }
    </style>

</head>

<body>


    <nav id="mobile_navbar">
        <h3>Log</h3>
        <form action="" method="post">
            <input type="search" placeholder="Looking for...?">
            <i class="fa-solid fa-magnifying-glass" style="color:black"></i>
        </form>
        <?Php
        if (isset($_SESSION['auth'])) {
            echo <<<Buttons
                        <span>
                            <a class="auth_btn" style="background-color: #fff;color:black" href="login.php">Sign in</a>&nbsp;&nbsp;
                        </span>
                    Buttons;
        } else {
            echo <<<Dropdown
                          <div class="custom-dropdown">
                            <a class="custom-dropdown-toggle" href="#">
                               <h3 style="color: #ffffff;display:flex;align-items:center;"><img width="35px" style="border-radius:50%" src="https://img.freepik.com/premium-vector/businessman-avatar-illustration-cartoon-user-portrait-user-profile-icon_118339-4382.jpg" alt="profile-pic">&nbsp;&nbsp;<i class="fa-solid fa-caret-down" style="color: #ffffff;"></i></h3> 
                            </a>
                            <ul class="custom-dropdown-menu">
                            <li><a href="add_products.php">Add Product</a></li>
                            <li><a href="./user_profile/profile_page.php">Profile Settings</a></li>
                                <li><a href="#">My Products</a></li>
                                <li><a href="#">Logout</a></li>
                                
                            </ul>
                        </div>

                    Dropdown;
        }
        ?>
    </nav>

    <!------------------------------------------------Navbar for Large Screen------------------------------------->
    <nav id="navbar_me">

        <h1>Logo</h1>

        <ul id="ul_large">
            <li><a href="./header.php">Home</a></li>
            <li><a href="./all_products.php">Products</a></li>
            <li><a href="./header.php#latest_product">Latest Products</a></li>
            <li><a href="./header.php#about_us">About us</a></li>
            <li><a href="./header.php#footers">Contact us</a></li>
        </ul>

        <?Php
        if (isset($_SESSION['auth'])) {
            echo <<<Buttons
                        <span>
                            <a class="auth_btn auth_btn2" href="login.php">Sign in</a>&nbsp;
                            <!--<a class="auth_btn auth_btn2" href="login.php">Sign up</a>-->
                        </span>
                    Buttons;
        } else {
            echo <<<Dropdown
                          <div class="custom-dropdown custom-dropdown_mobile ">
                            <a class="custom-dropdown-toggle" href="#">
                               <h3 style="color: #ffffff;display:flex;align-items:center;margin-bottom:0.5rem"><a target="blank" href="https://img.freepik.com/premium-vector/businessman-avatar-illustration-cartoon-user-portrait-user-profile-icon_118339-4382.jpg"><img width="35px" style="border-radius:50%" src="https://img.freepik.com/premium-vector/businessman-avatar-illustration-cartoon-user-portrait-user-profile-icon_118339-4382.jpg" alt="profile-pic"></a>&nbsp; Student &nbsp;<i class="fa-solid fa-caret-down" style="color: #ffffff;"></i></h3> 
                            </a>
                            <ul class="custom-dropdown-menu">
                            <li><a href="add_products.php">Add Product</a></li>
                             <li><a href="./user_profile/profile_page.php">Profile Settings</a></li>
                                <li><a href="#">My Products</a></li>
                                <li><a href="#">Logout</a></li>
                                
                            </ul>
                        </div>

                    Dropdown;
        }
        ?>

    </nav>



    <div class="wrapper-div cards-cont">

        <div class="latest_products_section all_products_page" id="all_products_page">
            <?Php
            $query = "SELECT * FROM `product_table` LIMIT 8";
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
    </div>

    <span id="data-container">
    </span>
    <br>
    <span
        style="display: flex;align-items: center;justify-content: center;width: 100vw;height: 8rem;margin-bottom: 5rem;">

        <button id="load-more">Load More</button>
    </span>

    <script>
        $(document).ready(function () {
            const dataContainer = $("#all_products_page");
            const loadMoreButton = $("#load-more");
            let currentPage = 1;
            function loadMoreData() {
                var page = currentPage;
                $.ajax({
                    url: "../SSS/auth.php",
                    method: "POST",
                    data: { page: page },
                    success: function (response) {
                        dataContainer.append(response);
                        currentPage++;
                    }
                });
            }
            loadMoreButton.on("click", loadMoreData);
        });
    </script>



    <div id="footers">
        <span id="logo_span">
            <h1>Logo</h1>
            <span>
                <h4>Connect with us </h4><br>
                <span class="logo_span_media"><a href=""><i class="fa-regular fa-envelope"></i></a>
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                </span>
            </span>
        </span>
        <hr style="width: 90%;">
        <span id="footers-span">
            <span>
                <h4>Trending Locations</h4>
                <a href="">Mumbai</a>
                <a href="">Goa</a>
                <a href="">Delhi</a>
                <a href="">Bangalore</a>
            </span>
            <span>
                <h4>Useful Links</h4>
                <a href="">Our Terms&Conditions</a>
                <a href="">Privacy Policy</a>
                <a href="">Customer Support</a>
                <a href="">Help</a>
            </span>
            <span id="map-div">
                <div style="width: 100%"><iframe width="100%" height="300" frameborder="0" scrolling="no"
                        marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=100%25&amp;height=300&amp;hl=en&amp;q=Sahyog%20college%20of%20IT%20&amp;%20Management+(DMPS)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                            href="https://www.maps.ie/population/">Find Population on Map</a></iframe></div>
                <h4><i class="fa-solid fa-location"></i> Our Office Head Quarters</h4>
            </span>
        </span>
        <hr width="100vw">
        <h5>&copy; All Rights Reserved DMPS 2023</h5>

    </div>




    <nav id="bottom-nav">
        <span id="ul_small">
            <span>
                <a href="header.php"><i class="fa-solid fa-house" style="color: #ffffff;"></i></a><br>
            </span>
            <span>
                <a href="all_products.php"> <i class="fa-solid fa-store" style="color: #ffffff;"></i></a><br>
            </span>
            <span>
                <a href="add_products.php"> <i id="plus-icon" class="fa-solid fa-circle-plus"></i></a><br>

            </span>
            <span>
                <a href="./user_profile/profile_page.php"><i class="fa-regular fa-user"
                        style="color: #ffffff;"></i></a><br>
            </span>
            <span>
                <a href="#footers"><i class="fa-solid fa-circle-info" style="color: #ffffff;"></i></a><br>
            </span>



        </span>
    </nav>
</body>

</html>