<?php

require "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Selling History | Admins | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />
</head>

<body style="background-color: #74EBD5;background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%);">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 text-center">
            <div class="row ad7 mt-1 mb-1">
                    <div class="col-4 offset-4">
                        <label class="form-label text-light fw-bold fs-1">Selling Process</label>
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
        <a class=" text-dark btn btn-light border border-1 fs-5 rounded-0 text-start" href="manageCategories.php">Manage Categories</a>
        </div>
    </div>
    <div class="col-12">
        <div class="row">
        <a class="fs-5 btn btn-light border border-1 text-dark rounded-0 text-start" href="storeProducts.php">Store Products</a>
        <br>
        <a class="fs-5 btn btn-light text-primary border border-1 rounded-0 text-start" href="sellingProcess.php">Selling Process <i class="bi bi-check2-all fs-5"></i></a>
        </div>
    </div>
    
  </div>
</div>
                                    <!-- offcanvas -->
                                </div>
                </div>
            </div>

            <!-- offcanvas2 -->
            <div class="col-12 bg-light mt-3 mb-3">
                <div class="row">
                    <div class="col-2">
                    <a class="btn btn-light border rounded-4 my-1" data-bs-toggle="offcanvas" role="button" 
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="bi bi-grid-fill"></i> <i class="bi bi-funnel"></i>
                    </a>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">FILTER <i class="bi bi-funnel"></i></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="col-12">
                            <div class="row">
                    <div class="col-12">
                        <label class="form-label fs-5">Search by Invoice ID : </label>
                        <input type="text" class="form-control fs-5 rounded-5" id="searchtxt" onkeyup="searchInvoiceId();" />
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <label class="form-label fs-5">From Date : </label>
                        <input type="date" class="form-control fs-5 rounded-5" id="from"/>
                    </div>
                    <div class="col-12">
                        <label class="form-label fs-5">To Date : </label>
                        <input type="date" class="form-control fs-5 rounded-5" id="to"/>
                    </div>
                    <div class="col-12 mt-2">
                        <button class="btn btn-dark rounded-4 fs-5" onclick="findSellings();">Find</button>
                    </div>
                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                </div>
                </div>
                
            </div>
            <!-- offcanvas2 -->

            <div class="col-12">
                <div class="row">

                    <div class="col-1 bg-dark text-end">
                        <label class="form-label fs-5 text-white">Invoice ID</label>
                    </div>
                    <div class="col-3 bg-body text-end">
                        <label class="form-label fs-5 text-black">Product</label>
                    </div>
                    <div class="col-3 bg-dark text-end">
                        <label class="form-label fs-5 text-white">Buyer</label>
                    </div>
                    <div class="col-2 bg-body text-end">
                        <label class="form-label fs-5 text-black">Amount</label>
                    </div>
                    <div class="col-1 bg-dark text-end">
                        <label class="form-label fs-5 text-white">Qty</label>
                    </div>
                    <div class="col-2 bg-white"></div>

                </div>
            </div>

            <div class="col-12 mt-2" id="viewArea">
                <?php

                $query = "SELECT * FROM `invoice`";
                $pageno;

                if (isset($_GET["page"])) {
                    $pageno = $_GET["page"];
                } else {
                    $pageno = 1;
                }

                $invoice_rs = Database::search($query);
                $invoice_num = $invoice_rs->num_rows;

                $results_per_page = 20;
                $number_of_pages = ceil($invoice_num / $results_per_page);

                $page_results = ($pageno - 1) * $results_per_page;
                $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                $selected_num = $selected_rs->num_rows;

                for ($x = 0; $x < $selected_num; $x++) {
                    $selected_data = $selected_rs->fetch_assoc();

                ?>
                    <div class="row border">

                        <div class="col-1 bg-secondary text-end">
                            <label class="form-label fs-5 text-white mt-2 mb-1"><?php echo $selected_data["id"]; ?></label>
                        </div>
                        <?php
                        
                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$selected_data["product_id"]."'");
                        $product_data = $product_rs->fetch_assoc();
                        ?>
                        <div class="col-3 bg-body text-end">
                            <div class="col-12">
                                <label class="form-label fs-5 text-black mt-2 mb-1"><?php echo $product_data["title"]; ?></label>
                            </div>
                        </div>
                        <?php
                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$selected_data["user_email"]."'");
                        $user_data = $user_rs->fetch_assoc();
                        ?>
                        <div class="col-3 bg-secondary text-end">
                            <label class="form-label fs-5 text-white mt-2 mb-1 d-grid">
                                <?php echo $user_data["fname"]." ".$user_data["lname"]; ?>
                            </label>
                        </div>
                        <div class="col-2 bg-body text-end">
                            <label class="form-label fs-5 text-black mt-2 mb-1">Rs. <?php echo $selected_data["total"]; ?> .00</label>
                        </div>
                        <div class="col-1 bg-secondary text-end">
                            <label class="form-label fs-5 text-white mt-2 mb-1"><?php echo $selected_data["qty"]; ?></label>
                        </div>
                        <div class="col-2 bg-white d-grid">
                            <?php
                            if($selected_data["status"] == 0){
                                ?>
                                <button class="btn btn-light mt-1 mb-1" onclick="changeInvoiceStatus('<?php echo $selected_data['id']; ?>');" 
                                id="btn<?php echo $selected_data["id"]; ?>">Confirm Order</button>
                                <?php
                            }else if($selected_data["status"] == 1){
                                ?>
                                <button class="btn btn-light mt-1 mb-1" onclick="changeInvoiceStatus('<?php echo $selected_data['id']; ?>');"
                                id="btn<?php echo $selected_data["id"]; ?>">Packing</button>
                                <?php
                            }else if($selected_data["status"] == 2){
                                ?>
                                <button class="btn btn-light mt-1 mb-1" onclick="changeInvoiceStatus('<?php echo $selected_data['id']; ?>');"
                                id="btn<?php echo $selected_data["id"]; ?>">Dispatch</button>
                                <?php
                            }else if($selected_data["status"] == 3){
                                ?>
                                <button class="btn btn-light mt-1 mb-1" onclick="changeInvoiceStatus('<?php echo $selected_data['id']; ?>');" 
                                id="btn<?php echo $selected_data["id"]; ?>">Shipping</button>
                                <?php
                            }else if($selected_data["status"] == 4){
                                ?>
                                <button class="btn btn-light mt-1 mb-1 disabled" onclick="changeInvoiceStatus('<?php echo $selected_data['id']; ?>');" 
                                id="btn<?php echo $selected_data["id"]; ?>">Delivered</button>
                                <?php
                            }
                            ?>
                            
                        </div>

                    </div>
                <?php

                }

                ?>
                <!--  -->
                <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3 mt-3">
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
            </div>

        </div>
    </div>

    <br>

    <div class="pt=2">
        <h6 class="mb-4"><a href="adminPanel.php" class="text-body"><i
            class="fas fa-long-arrow-alt-left me-2"></i>Admin Panel</a></h6>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>