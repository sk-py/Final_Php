<?Php
session_start();
include '../../SSS/connection.php';
if (!isset($_SESSION['uemail'])) {
    header('location:../../login/loginpro.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="./profile_page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        input[type="file"] {
            display: none;
        }

        #lbl_pp {
            top: 64%;
            left: 56%;
        }

        #back_btn {
            margin-top: 1rem;

        }

        @media screen and (max-width:500px) {
            #lbl_pp {
                top: 66%;

            }

            #back_btn {
                margin-top: 0px;
                margin-left: -0.9rem;

            }
        }
    </style>
</head>

<body>
    <div class="container rounded bg-white shadow-lg mt-5 ">
        <a href="../header.php" class="btn bg-warning p-1 fw-bold " id="back_btn"><i class="fa-solid fa-arrow-left"
                style="color: #000000;"></i> Home Page<a>

                <div class="column w-100">
                    <div class="d-flex align-items-center justify-content-center">

                        <?Php
                        $fquery = "SELECT * FROM `users` WHERE email='$_SESSION[uemail]'";
                        $reslt = mysqli_query($conn, $fquery);

                        while ($udata = mysqli_fetch_assoc($reslt)) {


                            ?>
                            <form action="../../SSS/auth.php" method="post" enctype="multipart/form-data">
                                <div class="p-3 py-0 pb-5 pt-1">
                                    <div class="d-flex justify-content-center align-items-center mb-3">
                                        <h4 class="text-right">Profile Settings</h4>
                                    </div>
                                    <div class="col-md-3 border-right w-100 text-center">
                                        <div
                                            class="d-flex flex-column align-items-center text-center p-3 py-2 position-relative">
                                            <img style="border-radius: 50%;height:160px;object-fit: cover;width:160px;border:1px solid black"
                                                id="profile-image" src="<?Php echo "../../user_img/" . $udata['user_pp'] ?>"
                                                accept="" maxFileSize="1048576">
                                            <!-------------- NEW COLUMN with defaut image name -->
                                            <label
                                                class="btn bg-primary text-white rounded rounded-5 position-absolute p-1 px-2"
                                                for="prof-pic" id="lbl_pp"><i class="fa-solid fa-pencil"
                                                    style="color: #ffffff;"></i></label>
                                            <!--****INPUTS--> <input type="file" name="image" id="prof-pic">
                                            <span class="font-weight-bold">Profile </span>
                                            <!-- <span
                            class="text-black-50">edogaru@mail.com.my</span><span>
                                </span> -->
                                        </div>
                                        <span class="error" style="color: red;"></span>
                                    </div>

                                    <script>
                                        $(document).ready(function () {
                                            $('#prof-pic').on('change', function () {
                                                var file = this.files[0];
                                                if (file) {
                                                    var reader = new FileReader();
                                                    reader.onload = function (e) {
                                                        $('#profile-image').attr('src', e.target.result);
                                                    };
                                                    reader.readAsDataURL(file);
                                                }
                                            });

                                            $('#prof-pic').on('change', function () {
                                                var maxFileSize = 2048000;
                                                var fileSize = this.files[0].size;

                                                if (fileSize > maxFileSize) {
                                                    $('.error').html('File size is too large. Maximum size is 2 MB.<br> <a href="https://www.reduceimages.com/" target="_blank">Reduce image size from here</a>');
                                                    this.value = '';
                                                } else {
                                                    $('.error').text('');
                                                }
                                            });
                                        });
                                    </script>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels fs-6">
                                                Name
                                            </label>
                                            <!--****INPUTS--> <input type="text" class="form-control" placeholder="Name"
                                                name="name" value="<?Php echo $udata['name'] ?>">
                                        </div>
                                        <div class="col-md-6"><label class="labels fs-6">Email</label>
                                            <!--****INPUTS--> <input type="text" class="form-control" placeholder="Email"
                                                name="email" value="<?Php echo $udata['email'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"><label class="labels fs-6">Mobile Number</label>
                                            <input type="text" class="form-control" placeholder="Your phone number"
                                                name="phone" value="<?Php echo $udata['phone'] ?>">
                                        </div>
                                        <div class="col-md-6"><label class="labels fs-6">Password</label>
                                            <input type="password" class="form-control" name="pswd"
                                                value="<?Php echo $udata['password'] ?>" placeholder="Your Password"
                                                id="pswd" spellcheck="false" autocorrect="off" autocapitalize="off">

                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <script>
                                            $(document).ready(function () {
                                                var pass_input = $('#pswd');

                                                pass_input.focus(function () {
                                                    pass_input.attr('type', 'text');
                                                });

                                                pass_input.blur(function () {
                                                    pass_input.attr('type', 'password');
                                                });
                                            });
                                        </script>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <button class="btn btn-primary profile-button" type="Submit" name="scbtn">Save
                                            Changes </button>
                                        <button class="btn btn-danger profile-button" type="Submit" name="dltBtn">Delete
                                            Account </button>
                                    </div>
                                </div>
                            </form>
                            <?Php
                        }
                        ?>
                    </div>

                </div>
    </div>
    </div>
    </div>
</body>

</html>