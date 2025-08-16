<?php

session_start();
require "connection.php";

if (isset($_SESSION["au"])) {

    $email = $_SESSION["au"]["email"];
    $pageno;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Store Products | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png">
</head>
<body>
    <div class="container-fluid">
        <div class="row">

        <div class="col-12">
            <div class="row ad7 mt-1">
                <div class="col-2">
                    <div class="col-2  logo" style="height: 60px;"></div>
                </div>
                <!-- <div class="col-4 col-lg-3 my-4">
                    <span class=" fw-bold fs-5 text-white"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></span>
                    <span class=" text-white-50 fw-bold"><?php echo $email; ?></span>
                </div>
                <div class="col-4 offset-4 offset-lg-1 col-lg-4 my-3">
                    <h1 class=" fw-bold">Store Products</h1>
                </div> -->
                <div class="col-8 text-center mt-1">
                    <h1 class="text-center fw-bold text-light">Store Products</h1>
                </div>
                <div class="col-1 offset-1 mt-2">
                                    <!-- offcanvas -->
                                    <a class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                        <i class="bi bi-list fs-4 text-light"></i>
                                    </a>
                                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                                    <div class="offcanvas-header">
                                        <h4 class="fw-bold">ADMIN</h4>
                                        <h4 class="text-white"><?php echo $_SESSION["au"]["fname"] . " " . $_SESSION["au"]["lname"]; ?></h4>
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
        <a class=" text-dark btn btn-light border border-1 fs-5 rounded-0 text-start" href="manageCategories.php">Manage Categories</a>
        </div>
    </div>
    <div class="col-12">
        <div class="row">
        <a class="fs-5 btn btn-light border border-1 text-primary rounded-0 text-start" href="storeProducts.php">Store Products</a>
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
<hr>
        
        <div class="col-12">
            <div class="row">

                <!--off canvas2-->
                <div class="col-12 col-lg-2 my-0 border rounded">

                    <a class="btn btn-light border rounded-4 my-1" data-bs-toggle="offcanvas" role="button" 
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="bi bi-grid-fill"></i> <i class="bi bi-funnel"></i>
                    </a>
                    <button class="btn btn-success border border-2 rounded-4 my-2" onclick="window.location='addProduct.php'">
                    Add Product <i class="bi bi-plus"></i></button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title fw-bold text-dark" id="offcanvasRightLabel">Sort Products</h5>
                            <button type="button" class="btn-close bg-light rounded-4" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>

                    <div class="offcanvas-body">
                        <div class="col-12">
                            <div class="row">

                                <!-- filter -->
                        <div class="col-11 mx-3 my-3 border border-info rounded-5 bg-light">
                            <div class="row">
                                <div class="col-12 mt-3 fs-5">
                                    <div class="row">
                                        <div class="col-12">
                                            
                                        </div>
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="col-10">
                                                    <input type="text" placeholder="Search..." class="form-control rounded-4" id="s"/>
                                                </div>
                                                <div class="col-1 p-1">
                                                    <label class="form-label" onclick="sort1(0);"><i class="bi bi-search fs-5 link"></i></label>
                                                </div>
                                            </div><br>
                                        </div>
                                        <!-- price -->
                                        <div class="col-12">
                                            <label class="form-label fw-bold">Price</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="r0" id="h2">
                                                <label class="form-check-label" for="h2">
                                                    High to low
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="r0" id="l2">
                                                <label class="form-check-label" for="l2">
                                                    Low to high
                                                </label>
                                            </div><br>
                                        </div>
                                        <!-- price -->

                                        <div class="col-12 border"></div>

                                        <div class="col-12 mt-3">
                                            <label class="form-label fw-bold">Active Time</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="r1" id="n">
                                                <label class="form-check-label" for="n">
                                                    Newest to oldest
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="r1" id="o">
                                                <label class="form-check-label" for="o">
                                                    Oldest to newest
                                                </label>
                                            </div><br>
                                        </div>

                                        <!-- <div class="col-12 border"></div>

                                        <div class="col-12 mt-3">
                                            <label class="form-label fw-bold">By quantity</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="r2" id="h">
                                                <label class="form-check-label" for="h">
                                                    High to low
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="r2" id="l">
                                                <label class="form-check-label" for="l">
                                                    Low to high
                                                </label>
                                            </div><br>
                                        </div> -->

                                        <div class="col-12 border"></div>

                                        <div class="col-12 mt-3">
                                            <label class="form-label fw-bold ">By condition</label>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="r3" id="b">
                                                <label class="form-check-label" for="b">
                                                    Brandnew
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="r3" id="u">
                                                <label class="form-check-label" for="u">
                                                    Used
                                                </label>
                                            </div><br>
                                        </div>
                                        <div class="col-12 text-center mt-3 mb-3">
                                            <div class="row g-2">
                                                <div class="col-12 col-lg-6 d-grid">
                                                    <button class="btn btn-dark rounded-5" onclick="sort1(0);">Sort</button>
                                                </div>
                                                <div class="col-12 col-lg-6 d-grid">
                                                    <button class="btn btn-outline-primary rounded-5" onclick="clearSort();">Clear</button>
                                                </div>
                                            </div><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- filter -->

                            </div>
                        </div>  
                    </div>
                </div>

                </div>
                <!--off canvas2-->

                <div class="col-12 ">
                    <div class="row">

                        <div class="col-12 col-lg-1"></div>
                        <!-- product -->
                        <div class="col-12 col-lg-10 mt-3 mb-3 bg-white">
                            <div class="row" id="sort">
                                <div class="offset-1 col-10 text-center">
                                    <div class="row justify-content-center">

                                        <?php

                                        if (isset($_GET["page"])) {
                                            $pageno = $_GET["page"];
                                        } else {
                                            $pageno = 1;
                                        }

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "'");
                                        $product_num = $product_rs->num_rows;

                                        $results_per_page = 6;
                                        $number_of_pages = ceil($product_num / $results_per_page);

                                        $page_results = ($pageno - 1) * $results_per_page;
                                        $selected_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "' 
                                    LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                                        $selected_num = $selected_rs->num_rows;

                                        for ($x = 0; $x < $selected_num; $x++) {
                                            $selected_data = $selected_rs->fetch_assoc();

                                        ?>

                                            <!-- card -->
                                            <div class="card mb-3 mt-3 col-12 col-lg-6 rounded-4">
                                                <div class="row">

                                                    <div class="col-md-4 mt-4">
                                                        <?php

                                                        $product_img_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $selected_data["id"] . "'");
                                                        $product_img_data = $product_img_rs->fetch_assoc();

                                                        ?>
                                                        <img src="<?php echo $product_img_data["code"]; ?>" class="img-fluid rounded-start" />
                                                    </div>
                                                    <div class="col-md-8 my-lg-3">
                                                        <div class="card-body">
                                                            <h5 class="card-title fw-bold"><?php echo $selected_data["title"]; ?></h5>
                                                            <span class="card-text fs-5 text-primary">Rs. <?php echo $selected_data["price"]; ?> .00</span><br />
                                                            <span class="card-text text-dark"><?php echo $selected_data["qty"]; ?> Items left</span>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" role="switch" 
                                                                id="fd<?php echo $selected_data["id"]; ?>" 
                                                                <?php if ($selected_data["status_id"] == 2) 
                                                                {
                                                                     ?>checked<?php 
                                                                     } 
                                                                     ?> 
                                                                     onclick="changeStatus(<?php echo $selected_data['id']; ?>);" />
                                                                     <label class="form-check-label text-info" for="fd<?php echo $selected_data["id"]; ?>">
                                                                    <?php if ($selected_data["status_id"] == 2) { ?>
                                                                        Make Your Product Active
                                                                    <?php } else { ?>
                                                                        Make Your Product Deactive
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </label>
                                                            </div><br>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row g-1">
                                                                    <div class="col-12 col-lg-6 d-grid">
                                                                            <!-- <button class="btn btn-outline-danger rounded-5"
                                                                             onclick="deleteProduct(<?php echo $selected_data['id']; ?>);">Delete
                                                                            </button> -->
                                                                        </div>
                                                                        <div class="col-12 col-lg-6 d-grid">
                                                                            <a class="btn btn-dark rounded-5" onclick="sendId(<?php echo $selected_data['id']; ?>);">Update</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- card -->

                                        <?php

                                        }

                                        ?>


                                    </div>
                                </div>

                                <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination pagination-md justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" href="<?php if ($pageno <= 1) {
                                                                                echo "#";
                                                                            } else {
                                                                                echo "?page=" . ($pageno - 1);
                                                                            } ?>" aria-label="Previous">
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
                                                <a class="page-link" href="<?php if ($pageno >= $number_of_pages) {
                                                                                echo "#";
                                                                            } else {
                                                                                echo "?page=" . ($pageno + 1);
                                                                            } ?>" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                        <!-- product -->

                    </div>
                </div>

            </div>
        </div>
        <!--off canvas-->

        <div class="pt=2">
            <h6 class="mb-4"><a href="adminPanel.php" class="text-body"><i
              class="fas fa-long-arrow-alt-left me-2"></i>Admin Panel</a></h6>
        </div>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>
</html>

<?php

} else {

    header("Location:adminPanel.php");
}

?>