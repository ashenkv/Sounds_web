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

        <?php require "connection.php"; ?>
            <div class="col-12 text-center">
                <div class="row ad7 mt-1 mb-1">
                    <div class="col-4 offset-4">
                        <label class="form-label text-light fw-bold fs-1">Manage Products</label>
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
        <a class=" text-primary btn btn-light border border-1 fs-5 rounded-0 text-start" href="manageProducts.php">Manage Products</a><br>
        <a class=" text-dark btn btn-light border border-1 fs-5 rounded-0 text-start" href="manageCategories.php">Manage Categories</a>
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
            </div>

            <div class="input-group mt-1 mb-0">
                    <input type="text" class="form-control bg-light" placeholder="Search..." aria-label="Text input with dropdown button" 
                        id="basic_search_txt" >
                           <!-- <option>Categories</option> -->
                      <!-- <select class="form-select bg-light" style="max-width: 22%;" id="basic_search_select"> -->
                           <?php

                                $category_rs = Database::search("SELECT * FROM `category`");
                                $category_num = $category_rs->num_rows;

                                for ($x = 0; $x < $category_num; $x++) {
                                    $selected_data = $category_rs->fetch_assoc();
                                ?>

                                <?php
                                }

                                ?>
                        <!-- </select> -->
                    <button class="btn btn-dark" onclick="basicSearch(0);" id="basic_search_select" type="button"><i class="bi bi-search"></i></button>
                </div>

            <div class="col-12 mt-3 mb-3">
                <div class="row">
                    <div class="col-2 col-lg-1 bg-dark py-2 text-end">
                        <span class="fs-4 fw-bold text-white">#</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold">Product Image</span>
                    </div>
                    <div class="col-4 col-lg-2 bg-dark py-2">
                        <span class="fs-4 fw-bold text-white">Title</span>
                    </div>
                    <div class="col-4 col-lg-2 d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold">Price</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-dark py-2">
                        <span class="fs-4 fw-bold text-white">Qty</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold">Registered Date</span>
                    </div>
                    <div class="col-2 col-lg-1 d-none d-lg-block py-2 bg-dark">
                        <span class="fs-4 fw-bold text-white">Manage</span>
                    </div>
                </div>
            </div>

            <?php
            

            $query = "SELECT * FROM `product`";
            $pageno;

            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }

            $product_rs = Database::search($query);
            $product_num = $product_rs->num_rows;

            $results_per_page = 10;
            $number_of_pages = ceil($product_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>

                <div class="col-12 mt-3 mb-3">
                    <div class="row">
                        <div class="col-2 col-lg-1 bg-dark py-2 text-end">
                            <span class="fs-4 fw-bold text-white"><?php echo $selected_data["id"]; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-light py-2" onclick="viewProductModal('<?php echo $selected_data['id']; ?>');">
                            <?php
                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $selected_data["id"] . "'");
                            $image_num = $image_rs->num_rows;
                            if ($image_num == 0) {
                            ?>
                                <img src="resource/empty.svg" style="height: 40px;margin-left: 80px;" />
                            <?php
                            } else {
                                $image_data = $image_rs->fetch_assoc();
                            ?>
                                <img src="<?php echo $image_data["code"]; ?>" style="height: 40px;margin-left: 80px;" />
                            <?php
                            }

                            ?>

                        </div>
                        <div class="col-4 col-lg-2 bg-dark py-2">
                            <span class="fs-5 text-white"><?php echo $selected_data["title"]; ?></span>
                        </div>
                        <div class="col-4 col-lg-2 d-lg-block bg-light py-2">
                            <span class="fs-4 fw-bold">Rs. <?php echo $selected_data["price"]; ?> .00</span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-secondary py-2">
                            <span class="fs-4 fw-bold text-white"><?php echo $selected_data["qty"]; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-light py-2">
                            <span class="fs-5 fw-bold"><?php echo $selected_data["datetime_added"]; ?></span>
                        </div>
                        <div class="col-2 col-lg-1 bg-info py-2 d-grid">
                            <?php

                            if ($selected_data["status_id"] == 1) {
                            ?>
                                <button id="pb<?php echo $selected_data['id']; ?>" class="btn btn-danger rounded-4 " onclick="blockProduct('<?php echo $selected_data['id']; ?>');">Block</button>
                            <?php
                            } else {
                            ?>
                                <button id="pb<?php echo $selected_data['id']; ?>" class="btn btn-dark rounded-4" onclick="blockProduct('<?php echo $selected_data['id']; ?>');">Unblock</button>
                            <?php

                            }

                            ?>
                        </div>
                    </div>
                </div>

                <!-- modal 01 -->
                <div class="modal" tabindex="-1" id="viewProductModal<?php echo $selected_data["id"]; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold text-primary"><?php echo $selected_data["title"]; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="offset-4 col-4">
                                    <img src="<?php echo $image_data["code"]; ?>" class="img-fluid" style="height: 150px;" />
                                </div>
                                <div class="col-12">
                                    <span class="fs-5 fw-bold">Price :</span>&nbsp;
                                    <span class="fs-5">Rs. <?php echo $selected_data["price"]; ?> .00</span><br />
                                    <span class="fs-5 fw-bold">Quantity :</span>&nbsp;
                                    <span class="fs-5"><?php echo $selected_data["qty"]; ?></span><br />
                                    <span class="fs-5 fw-bold">Seller :</span>&nbsp;
                                    <span class="fs-5">Ashen</span><br />
                                    <span class="fs-5 fw-bold">Description :</span>&nbsp;
                                    <span class="fs-5"><?php echo $selected_data["description"]; ?>.</span><br />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal 01 -->

            <?php

            }

            ?>

            <!--  -->
            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-md justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php

                        for ($x = 1; $x <= $number_of_pages; $x++) {
                            if ($x == $pageno) {
                        ?>
                                <li class="page-item active">
                                    <a class="page-link bg-dark" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                        <?php
                            }
                        }

                        ?>

                        <li class="page-item">
                            <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                    echo ("#");
                                                } else {
                                                    echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--  -->

            <hr />

            <!-- <div class="col-12 text-center bg-white">
                <h3 class="text-black-50 fw-bold">Manage Categories</h3>
            </div> -->

            <!-- <button type="" class="ad7 text-white fs-1 shadow">
                Manage Categories
                <h3 class="badge text-black-50 fw-bold"></h3>
            </button>

            <div class="col-12 mb-3 bg-light shadow"><br>
                <div class="row gap-1 justify-content-center">

                    <?php
                    // $category_rs = Database::search("SELECT * FROM `category`");
                    // $category_num = $category_rs->num_rows;
                    // for ($x = 0; $x < $category_num; $x++) {
                    //     $category_data = $category_rs->fetch_assoc();
                    ?>
                        <div class="col-12 col-lg-3 border border-secondary btn btn-light rounded-4" style="height: 50px;">
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
                    // }
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
            </div> -->

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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-dark" onclick="verifyCategory();">Save New Category</button>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-dark" onclick="saveCategory();">Verify & Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal 3 -->

            <!-- <div class="col-12 text-center">
                <h3 class="text-black-50 fw-bold">Manage Categories</h3>
            </div>

            <div class="col-12 mb-3">
                <div class="row gap-1 justify-content-center">

                    <?php
                    $category_rs = Database::search("SELECT * FROM `category`");
                    $category_num = $category_rs->num_rows;
                    for ($x = 0; $x < $category_num; $x++) {
                        $category_data = $category_rs->fetch_assoc();
                    ?>
                        <div class="col-12 col-lg-3 border border-secondary rounded" style="height: 50px;">
                            <div class="row">
                                <div class="col-8 mt-0 mb-4">
                                    <label class="form-label fw-bold fs-5"><?php echo $category_data["name"]; ?></label>
                                </div>
                                <div class="col-4 border-secondary text-center mt-0 mb-4">
                                    <label class="form-label fs-4"><i class="bi bi-trash3-fill text-danger"></i></label>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="col-12 col-lg-3 border border-success rounded" style="height: 50px;" onclick="addNewCategory();">
                        <div class="row">
                            <div class="col-8 mt-2 mb-2">
                                <label class="form-label fw-bold fs-5">Add new Category</label>
                            </div>
                            <div class="col-4 border-start border-secondary text-center mt-2 mb-2">
                                <label class="form-label fs-4"><i class="bi bi-plus-square-fill text-success"></i></label>
                            </div>
                        </div>
                    </div>

                </div>
            </div> -->

            <!-- modal 2 -->
            <!-- <div class="modal" tabindex="-1" id="addCategoryModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                <label class="form-label">New Category Name : </label>
                                <input type="text" class="form-control" id="n"/>
                            </div>
                            <div class="col-12 mt-2">
                                <label class="form-label">Enter Your Email : </label>
                                <input type="text" class="form-control" id="e"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="verifyCategory();">Save New Category</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- modal 2 -->
            <!-- modal 3 -->
            <!-- <div class="modal" tabindex="-1" id="addCategoryVerificationModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12 mt-3 mb-3">
                                <label class="form-label">Enter Your Verification Code : </label>
                                <input type="text" class="form-control" id="txt"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="saveCategory();">Verify & Save</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- modal 3 -->

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