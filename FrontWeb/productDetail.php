
<?php
    session_start();
    require_once 'productDetailBack.php';
    require_once 'related.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/22eec7c445.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="productDetail.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" type="image/png" href="../img/logo1.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>SOYsen.com</title>
</head>
<body style="height: 100vh">
    <!--  -->
    <!-- navbar -->
    <nav class="navbar navbar-expand-sm" id="navbar">
        <div class="container">
            <a href="index.php" class="navbar-brand col-md-1 col-1">
                <img src="../img/logo.png" alt="logo" id="logo">
            </a>
            <p id="line" class="col-md-1 col-1"></p>

            <div class="col-md-10 col-10">
                <ul class="navbar-nav justify-content-between">
                    <li class="nav-item col-md-1 col-1"></li>
                    <li class="nav-item col-md-6 col-2 col-sm-6">
                        <form action="search.php" class="d-flex">
                            <input type="text" placeholder="Search..." name="search" class="form-control rounded-pill p-2 ps-3" id="inputSearch" required>
                            
                            <button class="border-0 bg-transparent" type="submit">
                                <img src="../img/icons8-search-60.png" alt="iconSearch" id="iconSearch">
                            </button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="fa-solid fa-cart-plus mt-1" style="font-size: 20px;"></i>
                        </a>
                    </li>
                    <li class="nav-item col-md-1 col-sm-1 col-3" id="space"></li>
                    <li class="nav-item d-flex justify-content-end col-md-4 col-8 col-sm-6" id="divBtn1">
                        <?php if(isset($_SESSION['user'])) { ?>
                            <a href="profile.php" class="nav-link text-dark btn ps-4 pe-4">
                                <i class="fas fa-user"></i>
                            </a>
                            <a href="logout.php" class="nav-link text-dark btn ps-4 pe-4" id="btnLogout">Log out</a>
                        <?php } else { ?>
                            <a href="signup.php" class="nav-link bg-warning text-light btn rounded-pill ps-4 pe-4" id="btnSignup">Sign Up</a>
                            <a href="login.php" class="nav-link text-dark btn ps-4 pe-4 border border-1 rounded-5" id="btnLogin">Log in</a>
                        <?php } ?>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <!--  -->
    <!-- main -->
    <div class="container mt-5 mb-5" id="main">
        <div class="row">
                <div class="col-sm-5" id="divImg">
                    <div class="img-magnifier-container">
                        <img id="myimage" src="<?php echo $product['image']; ?>" alt="Girl">
                    </div>
                </div>
                <div class="col-sm-6 ms-5" id="divContent">
                    <h3><?php echo $product['name']; ?></h3>
                    <p class="text-muted">$<?php echo number_format($product['price'], 0, '', ' '); ?></p>
                    <p>៛<?php echo number_format($product['price']*4000, 0, '', ' '); ?></p>
                    <p><b>Category: </b><?php echo $product['category']; ?></p>
                    <p id="stock"><b>Stock available: </b><?php echo $product['stock'] ?></p>
                    <!-- <div class="d-flex">
                        <button class="btn border border-1" onclick="decrementCount()">
                            <i class="fa-solid fa-minus"></i>
                        </button>
                        <p id="countDisplay" style="margin: auto 0; width: 50px; text-align: center">1</p>
                        <button class="btn border border-1" onclick="incrementCount()">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div><br> -->
                    <div class="d-flex gap-3">
                        <form action="cartBack.php" method="post">
                            <button class="btn border border-dark rounded-5" style="width: 120px" type="submit">Add to Cart</button>
                            <button class="btn btn-primary rounded-5" style="width: 120px">Buy</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>

    <div id="related">
        <div class="container">
            <h3>Related Products</h3>
            <div class="row">
                <?php while($rowPro = mysqli_fetch_assoc($resAll)){ ?>
                <div class="col-4 col-md-3 mt-5 mb-5" id="col-4">
                    <a href="productdetail.php?id=<?php echo $rowPro['id']; ?>" class="rounded-1 justify-content-around align-items-center d-flex border border-1 rounded-1">
                        <img src="<?php echo $rowPro['image'] ?>" alt="" style="max-width: 100%; max-height: 100%;">
                    </a>
                    <div>
                        <h6 class="mt-2"><?php echo $rowPro['name'] ?></h6>
                        <p>$<?php echo number_format($rowPro['price'], 0, '', ' '); ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!--  -->
    <!-- footer -->
    <footer class="bg-dark text-light" id="footer">
        <div class="m-auto pt-5 pb-5" id="divFooter">
            <h3 class="mb-2">KIM</h3>
            <p class="mb-2" style="line-height: 1.6">KIM is a website where you can find most products and quality. Here each beutifulty product and you can preorder any products if don't have in this website or contact to KIM's support.</p>

            <ul id="socials">
                <a href="">
                    <i class="fa-brands fa-facebook-f text-light"></i>
                </a>
                <a href="">
                    <i class="fa-brands fa-x-twitter text-light"></i>
                </a>
                <a href="">
                    <i class="fa-brands fa-instagram text-light"></i>
                </a>
            </ul>
        </div>
        
        <div class="footer-bottom">
            <p>Copyright &copy;2024 <a href="#">SEN</a> </p>
        </div>
    </footer>

    <script src="imageZoom.js?v1.1"></script>
    <script src="count.js?v1.1"></script>
</body>
</html>