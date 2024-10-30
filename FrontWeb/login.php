<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/22eec7c445.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" type="image/png" href="../img/logo1.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Already an account</title>
</head>
<body>
    <div id="div">
        <form action="loginBack.php" method="post">
            <div class="row" id="row">
                
                <div class="col-6" id="divImg">
                    <img src="../image/Web Developer Clipart Vector, Web Development Illustration Modern, Internet Clipart, Can Be Used For Landing Pages, Web PNG Image For Free Download.jpg" alt="" id="image">
                    <a href="signup.php" id="a1">Create new account</a>
                </div>
                <div class="col-6" id="divForm">
                    <h4>Login</h4>
                    <?php if (isset($_GET['error'])) { ?>
                        <p id="error">
                            <?php echo $_GET['error'] ?>
                        </p>
                    <?php } ?>
                    <div id="inputName">
                        <img src="../image/icons8-email-100.png" alt="" id="imgEmail">
                        <input type="text" name="email" placeholder="Your Email" id="input">
                    </div>
                    <div id="inputName">
                        <img src="../image/icons8-password-60.png" alt="" id="img">
                        <input type="text" name="password" placeholder="Password" id="input">
                    </div>
                    <input type="submit" value="Login" class="bg-primary btn text-light mt-5 pe-5 ps-5" id="registerBtn" name="registerBtn">
                </div>
            </div>
        </form>
    </div>

</body>
</html>