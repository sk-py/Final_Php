<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        #wrapper {
            width: 100dvw;
            height: 100dvh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        #wrapper>form {
            display: flex;
            flex-direction: column;
            padding: 100px;
            border: 4px solid black;
            border-radius: 20px;
            background-color: #eeeeee;
        }

        #wrapper>form>input {
            padding: 5px;
            margin: 10px;
        }

        #reg_btn {
            background-color: black;
            color: white;
            border-radius: 10px;
            font-size: 1rem;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <h2>Sign up Form</h2>
        <form action="log.php" method="Post">
            <label>Enter Full Name</label>
            <input type="text" name="name">
            <label>Enter Your Email</label>
            <input type="email" id="email" name="email"><br>
            <small id="emailStatus"><small><br>
                    <label>Enter Phone No</label>
                    <input type="number" name="number"><br><br>
                    <label>Enter Profile Pic</label>
                    <input type="file" name="profile"><br><br>
                    <label>Create a Password</label>
                    <input type="text" name="password"><br><br><br>
                    <input type="submit" name="reg_btn" id="reg_btn"><br><br>
                    <h5>Already Have An Account? <a href="login.php" style="font-size: 1.2rem;"> Login</a></h5>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#email').on('input', function () {
                var email = $(this).val();
                if (email !== '') {
                    $.ajax({
                        type: 'POST',
                        url: 'log.php',
                        data: { email: email },
                        success: function (response) {
                            $('#emailStatus').html(response);
                        }
                    });
                } else {
                    $('#emailStatus').html('');
                }
            });
        });
    </script>

</body>

</html>