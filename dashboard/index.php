<?php

require_once 'create.php';
require_once 'delete.php';
require_once 'edit.php';
require_once 'search.php';
require_once 'createBanner.php';
require_once 'deleteBanner.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/22eec7c445.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dashboard.css?v1.1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" type="image/png" href="img/logo1.png" />
    <title>SOYsen.com</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

</head>

<body onload="restoreOffcanvasState()">

    <img src="img/logo.png" alt="Logo" id="logo">

    <div class="offcanvas offcanvas-start" id="demo">
        <div class="offcanvas-body">
            <div class="d-flex">
                <div id="circle" class="bg-primary">
                    <img src="img/icons8-image-96 (1).png" alt="" id="bannerImg">
                </div>
                <a href="#" class="text-decoration-none ms-2" style="margin: auto 0" onclick="showBanner()" id="bannerLink">Banner</a>
            </div>
            <p id="line1"></p>
            <div class="d-flex">
                <div id="circle" class="bg-success">
                    <img src="img/icons8-item-96.png" alt="" id="productImg">
                </div>
                <a href="#" class="text-decoration-none ms-2 active" style="margin: auto 0"  onclick="showProduct()" id="productLink">Products</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo" id="btnOffcanva">
            <img src="img/icons8-forward-48.png" alt="" style="width: 30px">
        </button>
    </div>


    <!--  -->
    <!-- offcanva1 -->
    <div id="offcanva1">
        

        <div id="sec1">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <h6>All Products</h6>
                            <form action="" id="block1" class="ml-3">
                                <input type="text" name="search" placeholder="Search product" id="inputsearch" class=" d-inline-block">
                                <button class="border-0 bg-transparent">
                                    <img src="img/icons8-search-60.png" alt="Search" id="iconsearch">
                                </button>
                            </form>
                        </div>
                        <div class="btn d-flex align-items-center">
                            <div style="display: flex; justify-content: end;">
                                <div class="d-flex btn btn-warning" id="btncreate" data-bs-toggle='modal' data-bs-target='#myModal1'>
                                    <img src="img/add.png" alt="">
                                    <p>New</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create modal -->
        <div class="modal" id="myModal1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">New Item</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="create.php" method="post" enctype="multipart/form-data" name="myForm"
                            onsubmit="return validateForm()">
                            <br>
                            <?php if (isset($_GET['error'])) { ?>
                                <p id="error">
                                    <?php echo $_GET['error'] ?>
                                </p>
                            <?php } ?>

                            <div id="image-container" class="d-flex">
                                <label>Image</label>
                                <label for="real_file"
                                    style="width: 96%; border: 1px dashed silver; display: flex; justify-content: center; align-items: center; padding: 50px">

                                    <img id="uploadFile" src="img/upload-to-cloud.png" alt="Existing Image"
                                        style="width: 50px; border-radius: 5px;">
                                    <input type="file" id="real_file" accept="image/*" onchange="previewImage1()"
                                        style="display: none;" name="image" multiple>
                                </label>
                            </div><br>

                            <div class="d-flex" style="align-items: center">
                                <label>Name</label>
                                <input type="text" name="name" id="input" require>
                            </div><br>
                            <div class="d-flex" style="align-items: center">
                                <label>Price</label>
                                <input type="text" name="price" id="input" require>
                            </div><br>
                            <div class="d-flex" style="align-items: center">
                                <label>Quantity</label>
                                <input type="text" name="stock" id="input" require>
                            </div><br> 
                            <div class="d-flex" style="align-items: center">
                                <label>Category</label>
                                <select name="category" id="input" class="form-select">
                                    <option value="phone">Phone</option>
                                    <option value="tablet">Tablet</option>
                                    <option value="earphone">Earphone</option>
                                    <option value="charger">Charger</option>
                                    <option value="laptop">Laptop</option>
                                    <option value="watch">Watch</option>
                                </select>
                            </div><br><br>
                          
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="submit" value="Upload" id="btnsubmit" class="btn" onclick="submitForm1()">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- delete -->
        <div class="container mt-5" id="delete">
            <div onscroll="myFunction()" id="myDIV">
                <table class="table">
                    <thead>
                        <tr>
                            <td><b>Image</b></td>
                            <td><b>Name</b></td>
                            <td><b>Category</b></td>
                            <td><b>Price</b></td>
                            <td><b>Stock Available</b></td>
                            <td><b>Action</b></td>
                        </tr>
                    </thead>

                    <tbody>
                    <?php while ($row_delete = mysqli_fetch_assoc($result_delete)) { ?>
                        <tr>
                            <td><img src="<?php echo $row_delete['image']; ?>" alt="" id="img"></td>
                            <td class="pt-3"><?php echo $row_delete['name']; ?></td>
                            <td class="pt-3"><?php echo $row_delete['category']; ?></td>
                            <td class="pt-3"><p><?php echo $row_delete['price']; ?></p></td>
                            <td class="pt-3"><?php echo $row_delete['stock']; ?></td>
                            <td class="pt-3">
                                <button id="btnEdit" class="btn btn-success" data-bs-toggle='offcanvas' data-bs-target='#editModal_<?php echo $row_delete['id']; ?>'>
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                                <button id="btnDelete" class="btn btn-danger" data-bs-toggle='modal' data-bs-target='#confirm_delete_<?php echo $row_delete['id']; ?>'>
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="offcanvas offcanvas-end" id="editModal_<?php echo $row_delete['id']; ?>" style="width: 700px;">
                            <div class="offcanvas-body">
                                <h4 class="modal-title pb-5">Edit Item</h4>
                                <form action="edit.php" method="post" enctype="multipart/form-data" id="editForm">
                                    <div class="d-flex">
                                    <div class="col-5">
                                        <div style="align-items: center">
                                            <label>Name</label><br>
                                            <input type="text" name="name" id="input_<?php echo $row_delete['id']; ?>" value="<?php echo $row_delete['name']; ?>" class="form-control">
                                        </div><br>
                                        <div style="align-items: center">
                                            <label>Price</label><br>
                                            <input type="number" name="price" id="input_<?php echo $row_delete['id']; ?>" value="<?php echo $row_delete['price']; ?>" class="form-control">
                                        </div><br>
                                        <div style="align-items: center">
                                            <label>Category</label><br>
                                            <select name="category" id="input_<?php echo $row_delete['id']; ?>" class="form-select">
                                                <option value="phone" <?php if ($row_delete['category'] === 'phone') echo 'selected'; ?>>Phone</option>
                                                <option value="tablet" <?php if ($row_delete['category'] === 'tablet') echo 'selected'; ?>>Tablet</option>
                                                <option value="earphone" <?php if ($row_delete['category'] === 'earphone') echo 'selected'; ?>>Earphone</option>
                                                <option value="charger" <?php if ($row_delete['category'] === 'charger') echo 'selected'; ?>>Charger</option>
                                                <option value="laptop" <?php if ($row_delete['category'] === 'laptop') echo 'selected'; ?>>Laptop</option>
                                                <option value="watch" <?php if ($row_delete['category'] === 'watch') echo 'selected'; ?>>Watch</option>
                                            </select>
                                        </div><br>
                                        <div style="align-items: center">
                                            <label>Stock Available</label><br>
                                            <input type="text" name="stock" id="input_<?php echo $row_delete['id']; ?>" value="<?php echo $row_delete['stock']; ?>" class="form-control">
                                        </div><br>
                                    </div>

                                    <div class="col-1"></div>
                                    <!-- Display Existing Image -->
                                    <div class="col-5">
                                        <div id="image-container">
                                            <label>Image</label><br><br>
                                            <label for="new-image_<?php echo $row_delete['id']; ?>" style="width: 96%;">
                                                <img id="existing-image_<?php echo $row_delete['id']; ?>" src="<?php echo $row_delete['image']; ?>" alt="Existing Image" style="width: 100%;">
                                                <input type="file" id="new-image_<?php echo $row_delete['id']; ?>" accept="image/*" onchange="previewImage(<?php echo $row_delete['id']; ?>)" name="image" class="d-none">
                                            </label>
                                        </div><br>
                                    </div>
                                    </div>
                                    <input type="text" name="id" hidden value="<?php echo $row_delete['id']; ?>">
                                    <div class="d-flex p-3 gap-2" style="position: fixed; bottom: 0; right: 0; width: 700px;">
                                            <button type="button" class="text-reset w-50 btn btn-secondary rounded-1 text-light" data-bs-dismiss="offcanvas">Cancel</button>
                                        <input type="submit" class="btn btn-primary rounded-1 w-50" value="Save Change" name="save">
                                        </div>
                                </form>
                            </div>
                        </div>



                        <!-- Confirm Delete Modal -->
                        <div class="modal" id="confirm_delete_<?php echo $row_delete['id']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this product?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href='index.php' data-bs-dismiss='modal' class='btn btn-secondary'>No</a>
                                        <a href='index.php?id=<?php echo $row_delete['id']; ?>' class='btn btn-danger rounded-1'>Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <!--  -->
    <!-- offcanva2 -->
    <div id="offcanva2">
        <div id="sec1">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <h6>Banner</h6>
                        </div>
                        <div class="btn d-flex align-items-center">
                            <div style="display: flex; justify-content: end;">
                                <div class="d-flex btn btn-success" id="btncreate" data-bs-toggle='modal' data-bs-target='#myBannerAdd'>
                                    <img src="img/add.png" alt="">
                                    <p>Add</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add modal -->
        <div class="modal" id="myBannerAdd">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">New Banner</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="createBanner.php" method="post" enctype="multipart/form-data"
                            onsubmit="return validateForm1()" name="formBanner">
                            <br>
                            <?php if (isset($_GET['error'])) { ?>
                                <p id="error">
                                    <?php echo $_GET['error'] ?>
                                </p>
                            <?php } ?>

                            <div id="image-container" class="d-flex">
                                <label>Image</label>
                                <label for="inputBannerCreate"
                                    style="width: 96%; border: 1px dashed silver; display: flex; justify-content: center; align-items: center; padding: 50px" id="label_file">

                                    <img id="uploadBannerCreate" src="img/upload-to-cloud.png" alt="Existing Image"
                                        style="width: 50px; border-radius: 5px;">
                                    <input type="file" id="inputBannerCreate" accept="image/*" onchange="previewBanner()"
                                        style="display: none;" name="image1" required>
                                </label>
                            </div><br>

                            <div class="d-flex" style="align-items: center">
                                <label>Title</label>
                                <input type="text" name="title" id="input" required>
                            </div><br>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="submit" value="Add" id="btnsubmit" class="btn">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- delete -->
        <div class="container mt-5">
            <div onscroll="myFunction()" id="myDIV">
                <table class="table">
                    <thead>
                        <tr>
                            <td><b>Image</b></td>
                            <td><b>Title</b></td>
                            <td><b>Action</b></td>
                        </tr>
                    </thead>

                    <tbody>
                    <?php while ($banRow = mysqli_fetch_assoc($BanRes)) { ?>
                        <tr style="height: 100px">
                            <td><img src="<?php echo $banRow['image']; ?>" alt="" id="img"></td>
                            <td class="pt-3"><?php echo $banRow['title']; ?></td>
                            <td class="pt-3">
                                <button id="btnEdit" class="btn btn-success" data-bs-toggle='modal' data-bs-target='#editModal_<?php echo $banRow['id']; ?>'>
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                                <button id="btnDelete" class="btn btn-danger " data-bs-toggle='modal' data-bs-target='#confirm_delete_<?php echo $banRow['id']; ?>'>
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal" id="editModal_<?php echo $banRow['id']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Banner</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="editBanner.php" method="post" enctype="multipart/form-data">
                                            <!-- Display Existing Image -->
                                            <div id="image-container" class="d-flex">
                                                <label>Image</label>
                                                <label for="new-image_<?php echo $banRow['id']; ?>" style="width: 96%;">
                                                    <img id="existing-image_<?php echo $banRow['id']; ?>" src="<?php echo $banRow['image']; ?>" alt="Existing Image" style="width: 100%;">
                                                    <input type="file" id="new-image_<?php echo $banRow['id']; ?>" accept="image/*" onchange="previewImage(<?php echo $banRow['id']; ?>)" style="display: none;" name="editImageBanner">
                                                </label>
                                            </div><br>
                                            <div class="d-flex" style="align-items: center">
                                                <label>Title</label>
                                                <input type="text" name="title" id="input_<?php echo $row_delete['id']; ?>" value="<?php echo $banRow['title']; ?>" class="form-control">
                                            </div><br>
                                            
                                            <input type="text" name="id" hidden value="<?php echo $banRow['id']; ?>">
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-danger rounded-1" value="Save" name="save">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Confirm Delete Modal -->
                        <div class="modal" id="confirm_delete_<?php echo $banRow['id']; ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this banner?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href='index.php' data-bs-dismiss='modal' class='btn btn-secondary'>No</a>
                                        <a href='index.php?id=<?php echo $banRow['id']; ?>' class='btn btn-danger rounded-1'>Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    </div>


    

    <script>

        function validateForm() {
            let x = document.forms["myForm"]["image"].value;
            let y = document.forms["myForm"]["name"].value;
            let z = document.forms["myForm"]["price"].value;
            if (x == "" || y == "" || isNaN(z)) {
                alert("Name, Price and Image must be filled out!");
                document.getElementById("labelfile").style = "border: 1px solid red";
                return false;
            } else {
                return true;
            }
        }

        function validateForm1() {
            let x1 = document.forms["formBanner"]["image1"].value;
            let y1 = document.forms["formBanner"]["title"].value;
            if (x1 == "" || y1 == "") {
                alert("Please filled!!!");
                document.getElementById("label_file").style = "border: 1px solid red";
                return false;
            } else {
                return true;
            }
        }


    </script>
    <script src="delete.js?v1.1"></script>
    <script src="create.js?v1.1"></script>
    <script src="edit.js?v1.1"></script>
    <!-- <script src="search.js?v1.1"></script> -->
    <script src="createBanner.js?v1.1"></script>
    <script src="collapse.js?v1.1"></script>
    <script src="saveOffcanvas.js?v1.1"></script>
</body>

</html>