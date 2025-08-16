<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Watchlist | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />

</head>

<body style="background-color: #E9F5F9;background-image: linear-gradient(90deg,#E9F5F9 0%,#E9F5F9 100%);">

    <div class="container-fluid">
        <div class="row">

            <?php include "navHome.php";

            if (isset($_SESSION["u"])) {

            ?>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="row mt-1">

                                <div class="col-12 bg-dark">
                                    <div class="row mt-1 mb-1">
                                        <div class="col-5 offset-4 col-lg-4 offset-lg-4 text-center">
                                            <span class="form-label fs-1 text-white">Watchlist 
                                            <i class="bi bi-bookmark-heart-fill fs-2 text-light"></i></span>
                                        </div>
                                        <div class="col-1 offset-2 col-lg-1 offset-lg-2">
                                            <div class="row mt-2">
                                                <!-- <div class="offset-lg-2 col-12 col-lg-5 mb-3">
                                                    <input type="text" class="form-control rounded-4" placeholder="Search in Watchlist..." id="s"/>
                                                </div>
                                                <div class="col-12 col-lg-1 mb-3 d-grid">
                                                    <button class="btn btn-dark rounded-4" onclick="watchSearch(0);"><i class="bi bi-search-heart"></i></button>
                                                </div> -->
                                                <div class="col-12 col-lg-1 offset-lg-11 mb-1 d-grid">
                                                    <a class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                                        <i class="bi bi-list fs-5 text-light"></i>
                                                    </a>
                                                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                                                        <div class="offcanvas-header">
                                                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">MENU</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                        </div>
                                                        <div class="offcanvas-body">
                                                            <div>
                                                            <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                                                                <ol class="breadcrumb">
                                                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                                                    <li class="breadcrumb-item active" aria-current="page">Watchlist</li>
                                                                </ol>
                                                            </nav>
                                                        </div>
                                                        <div class="dropdown mt-3">
                                                            <nav class="nav nav-pills flex-column">
                                                                <a class="nav-link active bg-dark rounded-4" aria-current="page" href="watchlist.php">My Watchlist</a>
                                                                <a class="nav-link text-dark text-start btn btn-outline-light rounded-4" href="cart.php">My Cart</a>
                                                                <a class="nav-link text-dark" href="#">Recents</a>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                </div>

                                <div class="col-12">
                                    <hr class=" border-info"/>
                                </div>

                                <!-- <div class="col-11 col-lg-2 border-0 border-end border-1 border-info bg-light rounded-4">&nbsp;
                                
                                </div> -->
                                    <!-- <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Watchlist</li>
                                        </ol>
                                    </nav>
                                    <nav class="nav nav-pills flex-column">
                                        <a class="nav-link active bg-dark rounded-4" aria-current="page" href="#">My Watchlist</a>
                                        <a class="nav-link text-dark" href="cart.php">My Cart</a>
                                        <a class="nav-link text-dark" href="#">Recents</a>
                                    </nav> -->
                                </div>

                                <?php
                                require "connection.php";
                                $user = $_SESSION["u"]["email"];

                                $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $user . "'");
                                $watch_num = $watch_rs->num_rows;

                                if ($watch_num == 0) {

                                ?>
                                    <!-- empty view -->
                                    <div class="col-12 col-lg-8 offset-lg-2 ">
                                        <div class="row">
                                            <div class="col-12 emptyView"></div>
                                            <div class="col-12 text-center">
                                                <label class="form-label fs-1 fw-bold">You have no items in your Watchlist yet.</label>
                                            </div>
                                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                                <a href="home.php" class="btn btn-outline-warning fs-3 fw-bold rounded-5">Start Shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- empty view -->
                                    <?php

                                } else {
                                    ?>
                                    <div class="col-12 col-lg-8 offset-lg-2">
                                            <div class="row">
                                    <?php
                                    for ($x = 0; $x < $watch_num; $x++) {
                                        $watch_data = $watch_rs->fetch_assoc();
                                    ?>

                                    <!-- have Products -->
                                    
                                                <div class="card mb-3 mx-0 mx-lg-0 col-lg-12 offset-lg-0 col-6 offset-3">
                                                    <div class="row g-0" id="search1">
                                                        
                                                        <div class="col-md-4">
                                                        <?php
                                                            $img = array();

                                                            $images_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='".$watch_data["product_id"]."'");
                                                            $images_data = $images_rs->fetch_assoc();
                                                                
                                                            ?>
                                                            <img src="<?php echo $images_data["code"]; ?>" class="img-fluid rounded-start" style="height: 200px;" />
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">
                                                                <?php

                                                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$watch_data["product_id"]."'");
                                                                $product_data = $product_rs->fetch_assoc();
                                                                
                                                                ?>
                                                                <h5 class="card-title fs-2 text-dark"><?php echo $product_data["title"]; ?></h5>
                                                                <?php

                                                                $clr_rs = Database::search("SELECT * FROM `color` WHERE `id`='".$product_data["color_id"]."'");
                                                                $clr_data = $clr_rs->fetch_assoc();
                                                                
                                                                ?>
                                                                <span class="fs-5 text-black-50">Colour :</span>
                                                                <span class="badge text-bg-dark rounded-4"> <?php echo $clr_data["name"]; ?></span>
                                                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                                                <?php

                                                                $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id`='".$product_data["condition_id"]."'");
                                                                $condition_data = $condition_rs->fetch_assoc();
                                                                
                                                                ?>
                                                                <span class="fs-5 text-black-50">Condition :</span>
                                                                <span class="badge text-bg-dark rounded-4"> <?php echo $condition_data["name"]; ?></span>
                                                                <br />
                                                                <span class="fs-5 text-black-50">Price :</span>&nbsp;&nbsp;
                                                                <span class="fs-5 text-black">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                                <br />
                                                                <span class="fs-5 text-black-50">Quantity :</span>&nbsp;&nbsp;
                                                                <span class="fs-6 text-black"><?php echo $product_data["qty"]; ?> Items available</span>
                                                                <br />
                                                                <!-- <span class="fs-5 fw-bold text-black-50">Seller :</span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black">Lahiru</span> -->
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-3 mt-5">
                                                            <div class="card-body d-lg-grid">
                                                                <a href='<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>' 
                                                                    class="btn btn-dark mb-2 rounded-4">Get Now</a>
                                                                <a href="#" class="btn btn-warning mb-2 rounded-4" onclick="addToCart(<?php echo $product_data['id']; ?>);">
                                                                <i class="bi bi-bag-plus text-white fs-6"></i></a>
                                                                <a href="#" class="btn btn-outline-danger mb-2 rounded-4" 
                                                                onclick='removeFromWatchlist(<?php echo $watch_data["id"]; ?>);'>Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            
                                        <!-- have Products -->

                                <?php
                                    }
                                    ?>
                                    </div>
                                        </div>
                                    <?php
                                }

                                ?>





                            </div>
                        </div>
                    </div>
                </div>

            <?php

            } else {
                echo ("Please Login First");
            }

            ?>

        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>