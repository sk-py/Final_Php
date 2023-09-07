<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginprocss.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>register</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div class="blur-overlay2">
        <div class="wrapper">
            <form action="../SSS/auth.php" method="post">
                <h1> Register </h1>
                <div class="input-box">
                    <input type="text" name="name" placeholder="Enter your name" required>
                    <i style="color: white;font-size: 2rem;z-index:-1;" class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="phone" placeholder="Enter phone no" required>
                    <i style="color: white;font-size: 2rem;z-index:-1;" class='bx bxs-phone'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="@email" class="email-id" required>
                    <i style="color: white;font-size: 2rem;z-index:-1;" class='bx bxl-gmail'></i>
                </div>
                <div class="input-box">
                    <small id="warning-txt" style="color:darkred;font-weight: bold;margin-top:-0.7rem"></small>
                    <input type="password" name="password" placeholder="Password" required>
                    <i style="color: white;font-size: 2rem;z-index:-1;" class='bx bxs-lock-alt'></i>
                </div>
                <input class="btn" id="submitBtn" type="submit" name="regbtn" value="Register">
                <div class="register-link">
                    <p>Already have an account ?
                        <a href="./loginpro.php">Login</a>
                    </p>
                </div>
        </div>
        </form>
        <script>
            $(document).ready(function () {
                $('.email-id').keyup(function (e) {
                    var email = $('.email-id').val();

                    $.ajax({
                        method: 'POST',
                        url: '../SSS/auth.php',
                        data: {
                            // 'email_chq': 1,
                            'email': email,
                        },
                        dataType: "text",
                        success: function (response) {
                            if ($.trim(response) === "A User With This Email Already Exists..! Please Try Using Different Email.") {
                                $('#submitBtn').prop('disabled', true);
                                $('#warning-txt').html("A User with this Email already exists..!");
                            } else {
                                $('#submitBtn').prop('disabled', false);
                                $('#warning-txt').html("");
                            }
                        }
                    });
                });
            });
        </script>
    </div>




</body>

</html>