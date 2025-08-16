<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Products | Admins | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />

</head>

<body style="background-color: #74EBD5;background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%);">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 text-center">
                <!-- <label class="form-label text-light fw-bold fs-1">Manage Products</label> -->
                <div class="row ad7 mt-1 mb-1">
                    <div class="col-4 offset-4">
                        <label class="form-label text-light fw-bold fs-1">Manage Categories</label>
                    </div>
                    <div class="col-1 offset-3 mt-2">
                                    <!-- offcanvas -->
                                    <a class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                        <i class="bi bi-list fs-4 text-light"></i>
                                    </a>
                                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                                    <div class="offcanvas-header">
                                        <h4 class="fw-bold">ADMIN</h4>
                                        <!-- <h4 class="text-white"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></h4> -->
                                        <button type="button" class="btn-close rounded-4" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div><hr>
  <div class="offcanvas-body">
    <div class="col-12 text-center">
        <i class="bi bi-file-earmark-diff-fill fs-2"></i><br>
      <br>
    </div>
    <div class="col-12">
        <div class="row">
        <a class=" text-dark btn btn-light border border-1 fs-5 rounded-0 text-start" href="adminPanel.php">Admin Panel</a><br>    
        <a class=" text-dark btn btn-light border border-1 fs-5 rounded-0 text-start" href="manageUsers.php">Manage Users</a><br>
        <a class=" text-dark btn btn-light border border-1 fs-5 rounded-0 text-start" href="manageProducts.php">Manage Products</a><br>
        <a class=" text-primary btn btn-light border border-1 fs-5 rounded-0 text-start" href="manageCategories.php">Manage Categories</a>
        </div>
    </div>
    <div class="col-12">
        <div class="row">
        <a class="fs-5 btn btn-light border border-1 text-dark rounded-0 text-start" href="storeProducts.php">Store Products</a>
        <br>
        <a class="fs-5 btn btn-light text-dark border border-1 rounded-0 text-start" href="sellingProcess.php">Selling Process <i class="bi bi-check2-all fs-5"></i></a>
        </div>
    </div>
    
  </div>
</div>
                                    <!-- offcanvas -->
                                </div>
                </div>

            <?php
            require "connection.php";

            ?>

                



            <div class="col-12 col-lg-10 offset-lg-1 mb-3 mt-3 bg-light shadow"><br>
                <div class="row gap-1 justify-content-center">

                    <?php
                    $category_rs = Database::search("SELECT * FROM `category`");
                    $category_num = $category_rs->num_rows;
                    for ($x = 0; $x < $category_num; $x++) {
                        $category_data = $category_rs->fetch_assoc();
                    ?>
                        <div class="col-12 col-lg-4 border border-secondary btn btn-light rounded-4" style="height: 50px;">
                            <div class="row">
                                <div class="col-9 mt-1 mb-3">
                                    <label class="form-label fw-bold fs-5"><?php echo $category_data["name"]; ?></label>
                                </div>
                                <div class="col-3 border-secondary text-center mt-0 mb-4">
                                    <label class="form-label fs-4"><i class="bi bi-trash3-fill text-danger link" 
                                        onclick="removeCategory(<?php echo $category_data['id'] ?>);"></i></label>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="col-12"><hr>
                        <div class="row">

                        <div class="col-12 col-lg-4 offset-lg-4 border border-success btn btn-light rounded-5 text-center" style="height: 55px;" onclick="addNewCategory();">
                        <div class="row">
                            <div class="col-8 mt-2 mb-2">
                                <label class="form-label fw-bold fs-5">Add new Category</label>
                            </div>
                            <div class="col-4 border-success text-center mt-2 mb-2">
                                <label class="form-label fs-4"><i class="bi bi-plus-circle-fill text-success fs-3 link"></i></label>
                            </div>
                        </div>
                        </div>

                        </div>
                    </div>

                </div><br>
            </div>

            <!-- modal 2 -->
            <div class="modal" tabindex="-1" id="addCategoryModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="spinner-grow spinner-grow-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>&nbsp;
                            <h5 class="modal-title">Add New Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                <label class="form-label">New Category Name : </label>
                                <input type="text" class="form-control rounded-4" id="n"/>
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label">Enter Your Email : </label>
                                <input type="text" class="form-control rounded-4" id="e"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-5" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-dark rounded-5" onclick="verifyCategory();">Save New Category</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal 2 -->
            <!-- modal 3 -->
            <div class="modal" tabindex="-1" id="addCategoryVerificationModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12 mt-3 mb-3">
                                <label class="form-label">Enter Your Verification Code : </label>
                                <input type="text" class="form-control rounded-4" id="txt"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-5" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-dark rounded-5" onclick="saveCategory();">Verify & Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal 3 -->


                    <?php
                    $category_rs = Database::search("SELECT * FROM `category`");
                    $category_num = $category_rs->num_rows;
                    for ($x = 0; $x < $category_num; $x++) {
                        $category_data = $category_rs->fetch_assoc();
                    ?>
                       
                    <?php
                    }
                    ?>

                    

            <hr>

            <div class="pt=2">
                <h6 class="mb-4 text-start"><a href="adminPanel.php" class="text-body"><i
                class="fas fa-long-arrow-alt-left me-2"></i>Admin Panel</a></h6>
            </div>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>