<?php

require "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Users | Admins | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />

</head>

<body class="ad1">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 text-center">
            <div class="row ad7 mt-1 mb-1">
                    <div class="col-4 offset-4">
                        <label class="form-label text-light fw-bold fs-1">Manage Users</label>
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
        <a class=" text-primary btn btn-light border border-1 fs-5 rounded-0 text-start" href="manageUsers.php">Manage Users</a><br>
        <a class=" text-dark btn btn-light border border-1 fs-5 rounded-0 text-start" href="manageProducts.php">Manage Products</a><br>
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

            <!-- <div class="col-12 mt-3">
                <div class="row">
                    <input type="text" class="form-control rounded-4"/>
                    <button class="btn btn-outline-light rounded-4"><i class="bi bi-search"></i></button>
                </div>
            </div> -->

            <div class="input-group mt-1 mb-0">
                    <input type="text" class="form-control bg-light" placeholder="Search..." aria-label="Text input with dropdown button" 
                        id="basic_search_txt" >
                           <!-- <option>Categories</option> -->
                      <!-- <select class="form-select bg-light" style="max-width: 22%;" id="basic_search_select"> -->
                           <?php

                                // $category_rs = Database::search("SELECT * FROM `category`");
                                // $category_num = $category_rs->num_rows;

                                // for ($x = 0; $x < $category_num; $x++) {
                                //     $selected_data = $category_rs->fetch_assoc();
                                // ?>

                                 <?php
                                // }

                                ?>
                        <!-- </select> -->
                    <button class="btn btn-dark" id="basic_search_select" type="button"><i class="bi bi-search"></i></button>
                </div>

            <div class="col-12 mt-3 mb-3">
                <div class="row">
                    <div class="col-2 col-lg-1 bg-dark py-2 text-end">
                        <span class="fs-4 fw-bold text-white">#</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold">Profile Image</span>
                    </div>
                    <div class="col-4 col-lg-2 bg-dark py-2">
                        <span class="fs-4 fw-bold text-white">User Name</span>
                    </div>
                    <div class="col-4 col-lg-2 d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold">Email</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-dark py-2">
                        <span class="fs-4 fw-bold text-white">Mobile</span>
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

            $query = "SELECT * FROM `user`";
            $pageno;

            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }

            $user_rs = Database::search($query);
            $user_num = $user_rs->num_rows;

            $results_per_page = 20;
            $number_of_pages = ceil($user_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>
                <div class="col-12 mt-3 mb-3">
                    <div class="row">
                        <div class="col-2 col-lg-1 bg-dark py-2 text-end">
                            <span class="fs-4 text-white"><?php echo $x + 1; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-light py-2" onclick="viewMsgModal('<?php echo $selected_data['email']; ?>');">
                            <img src="resource/newuser1.svg" style="height: 40px;margin-left: 80px;" />
                        </div>
                        <div class="col-4 col-lg-2 bg-dark py-2">
                            <span class="fs-4 text-white"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></span>
                        </div>
                        <div class="col-4 col-lg-2 d-lg-block bg-light py-2">
                            <span class="fs-4"><?php echo $selected_data['email']; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-dark py-2">
                            <span class="fs-4 text-white"><?php echo $selected_data['mobile']; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-light py-2">
                            <span class="fs-4"><?php echo $selected_data['joined_date']; ?></span>
                        </div>
                        <div class="col-2 col-lg-1 bg-warning py-2 d-grid">
                            <?php

                            if ($selected_data["status"] == 1) {
                            ?>
                                <button id="ub<?php echo $selected_data['email']; ?>" class="btn btn-danger rounded-4" onclick="blockUser('<?php echo $selected_data['email']; ?>');">Block</button>
                            <?php
                            } else {
                            ?>
                                <button id="ub<?php echo $selected_data['email']; ?>" class="btn btn-dark rounded-4" onclick="blockUser('<?php echo $selected_data['email']; ?>');">Unblock</button>
                            <?php

                            }

                            ?>

                        </div>
                    </div>
                </div>
                <!-- msg modal -->
                <div class="modal" tabindex="-1" id="userMsgModal<?php echo $selected_data["email"]; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body overflow-scroll">
                                <!-- received -->
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <div class="col-8 rounded bg-success">
                                            <div class="row">
                                                <div class="col-12 pt-2">
                                                    <span class="text-white fw-bold fs-4">Hello there!!!</span>
                                                </div>
                                                <div class="col-12 text-end pb-2">
                                                <span class="text-white fs-6">2022-11-9 00:00:00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- received -->
                                <!-- sent -->
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <div class="offset-4 col-8 rounded bg-primary">
                                            <div class="row">
                                                <div class="col-12 pt-2">
                                                    <span class="text-white fw-bold fs-4">Hello there!!!</span>
                                                </div>
                                                <div class="col-12 text-end pb-2">
                                                <span class="text-white fs-6">2022-11-9 00:00:00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- sent -->

                            </div>
                            <div class="modal-footer">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="msgtxt"/>
                                        </div>
                                        <div class="col-3 d-grid">
                                            <button type="button" class="btn btn-primary" onclick="sendAdminMsg('<?php echo $selected_data['email']; ?>');">Send</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- msg modal -->
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

            <hr>

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