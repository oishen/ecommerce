<?php
    require_once 'editProfile.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/22eec7c445.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" type="image/png" href="../img/logo1.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Profile</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm" id="navbar">
        <div class="container">
            <a href="index.php" class="navbar-brand col-md-1 col-1">
                <img src="../img/logo.png" alt="logo" id="logo">
            </a>
            <div class="col-md-10 col-10">
                <ul class="navbar-nav justify-content-between">
                    <li class="nav-item col-md-1 col-1"></li>
                    <li class="nav-item col-md-6 col-2 col-sm-6"></li>
                    <li class="nav-item col-md-1 col-sm-1 col-3" id="space"></li>
                    <li class="nav-item d-flex justify-content-end col-md-4 col-8 col-sm-6" id="divBtn1">
                        <?php if (isset($_SESSION['user'])) { ?>
                            <a href="#" class="nav-link text-dark">
                                <i class="fa-regular fa-circle-user fa-2x"></i>
                            </a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="main" class="bg-light pt-5 pb-5">
        <div class="container">
            <h2>My Account</h2>
            <div class="row">
                <div class="col-lg-2 col-md-3 mt-5 mb-5">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills flex-column" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="pill" href="#detail">
                                <i class="fa-regular fa-circle-user"></i> My details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#address">
                                <i class="fa-solid fa-location-arrow"></i> My address
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="pill" href="#order">
                                <i class="fa-solid fa-box-archive"></i> My orders
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-9 col-md-8 rounded-1 pb-5" style="background-color: white; box-shadow: 0 0 3px silver;">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="detail" class="container tab-pane active"><br>
                            <div class="d-flex justify-content-between">
                                <h3>My Details</h3>
                                <button id="btnEdit" class="btn btn-success" data-bs-toggle='offcanvas' data-bs-target='#editModal'>
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </div>
                            <p id="line"></p>
                            <div class="row mt-4">
                                <div class="col-lg-3 col-md-4 d-flex justify-content-center pb-5">
                                    <div class="d-flex flex-column">
                                        <label for="">Image</label>
                                        <img src="<?php echo $row_show['image']; ?>" alt="" class="rounded-circle mt-5" id="profileImg">
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-8 d-flex justify-content-around">
                                    <div>
                                        <label>First name</label>
                                        <h6><?php echo $row_show['fname']; ?></h6> 
                                        <label class="mt-4">Date of Birth</label>
                                        <h6><?php echo $row_show['DOB']; ?></h6>   
                                        <label class="mt-4">Email</label>
                                        <h6><?php echo $row_show['email']; ?></h6>
                                    </div>
                                    <div>
                                        <label>Last name</label>
                                        <h6><?php echo $row_show['lname']; ?></h6>
                                        <label class="mt-4">Phone Number</label>
                                        <h6><?php echo $row_show['phone']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="address" class="container tab-pane fade"><br>
                            <div class="d-flex justify-content-between">
                                <h3>My Address</h3>
                                <button id="btnEdit" class="btn btn-success" data-bs-toggle='offcanvas' data-bs-target='#editModal'>
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                            </div>
                            <p id="line"></p>
                            <div class="row mt-4">
                                <div class="col-sm-8 d-flex justify-content-around">
                                    <div>
                                        <label class="mt-4">Street name</label>
                                        <h6>21</h6>
                                        <label class="mt-4">Postal code</label>
                                        <h6>120802</h6>
                                        <label class="mt-4">Country</label>
                                        <h6>Cambodia</h6>
                                    </div>
                                    <div>
                                        <label class="mt-4">Home number</label>
                                        <h6>P01</h6>
                                        <label class="mt-4">City</label>
                                        <h6>Phnom Penh</h6>
                                    </div>
                                </div>                                  
                            </div>
                        </div>
                        <div id="order" class="container tab-pane fade"><br>
                            <div class="d-flex justify-content-between">
                                <h3>My Orders</h3>
                            </div>
                            <p id="line"></p>
                            <table class="table mt-4 table-light table-striped">
                                <thead>
                                    <tr>
                                        <td>Date</td>
                                        <td>Order Number</td>
                                        <td>Total</td>
                                        <td>Status</td>
                                    </tr>
                                </thead>          
                                <tbody>
                                    <tr>
                                        <td>08/06/2024</td>
                                        <td>0001</td>
                                        <td>$100</td>
                                        <td>Pending</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="editModal" aria-labelledby="editModalLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="editModalLabel">Edit Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="profile.php" method="POST">
                <div class="mb-3">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row_show['fname']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row_show['lname']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row_show['DOB']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row_show['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row_show['phone']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>

</body>
</html>
