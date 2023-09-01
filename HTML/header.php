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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="../Styles/header.css"> -->
    <link rel="stylesheet" href="../Styles/pcard.css">
    <link rel="website icon" href="../logo.jpeg" type="jpeg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link
        href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Fira+Sans:wght@200;
        400&family=Jost:wght@300;400;600&family=Manrope:wght@200;300;400;500;600;700;800&family=Montserrat:wght@200;300;400;800&family=Varela+Round&display=swap"
        rel="stylesheet"> -->


</head>

<body>
    <!------------------------------------------------Navbar for small/medium Screen------------------------------------->

    <nav id="mobile_navbar">
        <h3><span style="font-size:1.9rem;">D</span>eal.<span style="font-size:1.9rem;">i</span>o</h3>

        <form action="" method="post">
            <input type="search" placeholder="Looking for...?">
            <i class="fa-solid fa-magnifying-glass" style="color:black"></i>
        </form>
        <?Php
        if (!isset($_SESSION['authorized'])) {
            echo <<<Buttons
                        <span>
                            <a class="auth_btn" style="background-color: #fff;color:black" href="../login/loginpro.php">Sign in</a>&nbsp;&nbsp;
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
                                <li><a href="./my_products.php">My Products</a></li>
                                <li><form action="../SSS/auth.php" type="post"><input type="submit" name="logout" value="Logout"></form></li>
                            </ul>
                        </div>

                    Dropdown;
        }
        ?>
    </nav>

    <!------------------------------------------------Navbar for Large Screen------------------------------------->
    <nav id="navbar_me">

        <h2><span style="font-size:1.9rem;">D</span>eal.<span style="font-size:1.9rem;">i</span>o</h2>


        <ul id="ul_large">
            <li><a href="#">Home</a></li>
            <li><a href="./all_products.php">Products</a></li>
            <li><a href="#latest_product">Latest Products</a></li>
            <li><a href="#about_us">About us</a></li>
            <li><a href="#footers">Contact us</a></li>
        </ul>

        <?Php
        if (isset($_SESSION['authorized'])) {
            echo <<<Dropdown
                             <div class="custom-dropdown custom-dropdown_mobile ">
                                    <a class="custom-dropdown-toggle" href="#">
                                    <h3 style="color: #ffffff;display:flex;align-items:center;margin-bottom:0.5rem"><a target="blank" href="https://img.freepik.com/premium-vector/businessman-avatar-illustration-cartoon-user-portrait-user-profile-icon_118339-4382.jpg"><img width="35px" style="border-radius:50%" src="https://img.freepik.com/premium-vector/businessman-avatar-illustration-cartoon-user-portrait-user-profile-icon_118339-4382.jpg" alt="profile-pic"></a>&nbsp; Student &nbsp;<i class="fa-solid fa-caret-down" style="color: #ffffff;"></i></h3> 
                                    </a>
                                    <ul class="custom-dropdown-menu">
                                    <li><a href="add_products.php">Add Product</a></li>
                                     <li><a href="./user_profile/profile_page.php">Profile Settings</a></li>
                                        <li><a href="./my_products.php">My Products</a></li>
                                        <li><form action="../SSS/auth.php" type="POST"><input type="submit" style="background-color: #fff;border:none;font-size:1rem;cursor:pointer" name="logout" value="Logout"></form></li>
                                        
                                        </ul>
                                        </div>
                    Dropdown;

        } else {
            echo <<<Buttons
                                        <span>
                                        <a class="auth_btn auth_btn2" href="../login/loginpro.php">Sign in</a>&nbsp;
                                        <!--<a class="auth_btn auth_btn2" href="loginpro.php">Sign up</a>-->
                                        </span>
                                        Buttons;
        }
        ?>

    </nav>

    <!--------------------------------------------------------------Navbar End------------------------------------------------------------->


    <!-------------------------------------------------Carousel-------------------------------------------------------------------------------->
    <div class="slide-container">
        <div class="slide">
            <img src="../1.png" alt="">
        </div>

        <div class=" slide">
            <img src="../2.png" alt="">
        </div>

        <div class=" slide">
            <img src="https://rukminim1.flixcart.com/fk-p-flap/1600/270/image/fb8e9c74644f4ce1.png?q=20" alt="">
        </div>

        <div class=" slide">
            <img src="https://rukminim1.flixcart.com/fk-p-flap/1600/270/image/fb8e9c74644f4ce1.png?q=20" alt="">
        </div>

        <span class=" arrow prev" onclick="controller(-1)">&#10094;</span>
        <span class="arrow next" onclick="controller(1)">&#10095;</span>
    </div>
    <script src="../Scripts/index.js"></script>
    <!-----------------------------------------------------------------------Carousel End -------------------------------------------------------------------------------------->



    <section class="sec-1">
        <div class="box">
            <div class="white">
                <p>Grocery</p>
            </div>
            <img
                src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Wearables/PC_CategoryCard_379X304_1._SY304_CB614835787_.jpg">
        </div>

        <div class="box">
            <div class="white">
                <p>Fashion</p>
            </div>
            <img
                src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Wearables/PC_CategoryCard_379X304_1._SY304_CB614835787_.jpg">
        </div>

        <div class="box">
            <div class="white">
                <p>Electronics</p>
            </div>
            <img
                src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Wearables/PC_CategoryCard_379X304_1._SY304_CB614835787_.jpg">
        </div>

    </section>

    <section class="sec-1">
        <div class="box">
            <div class="white">
                <p>Two Whellers</p>
            </div>
            <img
                src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Wearables/PC_CategoryCard_379X304_1._SY304_CB614835787_.jpg">
        </div>

        <div class="box">
            <div class="white">
                <p>Home and Furniture</p>
            </div>
            <img
                src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Wearables/PC_CategoryCard_379X304_1._SY304_CB614835787_.jpg">
        </div>

        <div class="box">
            <div class="white">
                <p>Toys</p>
            </div>
            <img
                src="https://images-eu.ssl-images-amazon.com/images/G/31/img22/Wearables/PC_CategoryCard_379X304_1._SY304_CB614835787_.jpg">
        </div>

    </section>
    <!---------------------------------------------------------------------------------card end------------------------------------------------------------------------------>
    <!-- ----------------------------------------------------------------------Category Cards ENd------------------------------------------------------------------------ -->

    <div class="recent_products_container">
        <div class="recent_products_wrapper">

        </div>
    </div>





    <!-- --------------------------------------------------------------------------------Recently viewed--------------------------------------------------------------------------- -->

    <div id="latest_product"></div>
    <!-- <div style="height: 10vh;width:100svw;background-color: grey;padding: 0;margin-top:-4px;">
    </div>
    <div style="height: 30vh;width:100svw;background-color: #ffff;">
    </div> -->
    <div class="wrapper-div">
        <div class="banner-recent">
            <h3>Recently Viewed Items</h3>
        </div>
        <div class="latest_products_section latest_products_section2">
            <?Php

            $recentlyViewed = isset($_COOKIE['recently_viewed']) ? json_decode($_COOKIE['recently_viewed']) : [];

            foreach (array_slice($recentlyViewed, 0, 4) as $prod_id) {
                $query = "SELECT * FROM `product_table` where `id`='$prod_id'";
                $result = mysqli_query($conn, $query);

                while ($fetch = mysqli_fetch_assoc($result)) {
                    $pid = $fetch['id'];
                    $description = $fetch['description'];
                    $product_name = $fetch['product_name'];
                    $price = $fetch['price'];
                    $image = $fetch['image'];

                    $truncatedDescription = strlen($description) > 80 ? substr($description, 0, 80) . "..." : $description; ?>

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
                        <form action="products_detail.php" method="GET">
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
            }

            ?>
        </div>

        <div>
            <a href="all_products.php" style="text-decoration: none;font-size: 1.2rem;color:blue;margin: 2rem;">Continue
                your exploration
            </a>

        </div>
    </div>

    <div class="banner-latest">
        <h2>Latest Added Products</h2>
    </div>
    <div class="latest_products_section">
        <?Php
        $query = "SELECT * FROM `product_table` ORDER BY `id` DESC LIMIT 8";
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
                <form action="products_detail.php" method="GET">
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
    <a href="all_products.php" style="text-decoration: none;font-size: 1.2rem;color:blue;margin: 2rem;">Explore
        all
        products</a>

    </div>



    <!--------------------------------------------------------About us ------------------------------------------------------------->



    <div class="aboutus" id="about_us">

    </div>










    <div id="footers">
        <span id="logo_span">
            <span style="display: flex;
            align-items: center;justify-content: center;flex-direction: row;margin-top: 6px;">
                <h1><img width="50px" style="border-radius: 50%;" src="../logo.jpeg" alt=""></h1>&nbsp; &nbsp;
                <h3><span style="font-size:1.9rem;">D</span>eal.<span style="font-size:1.9rem;">i</span>o
                </h3>
            </span>

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