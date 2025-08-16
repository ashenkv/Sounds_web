
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Other Accessories->See All | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png">
</head>
<body style="background-color: #E9F5F9;background-image: linear-gradient(90deg,#E9F5F9 0%,#E9F5F9 100%);">

    <div class="container-fluid">
        <div class="row">

        <?php

        include "navHome.php"; 
        require "connection.php";

        ?>

    <!-- Products -->

			<div class="col-12 mb-3">
                            <div class="row border border-primary">

                                <div class="col-12 bg-dark mt-1">
                                    <h3 class=" text-white text-center my-2">Other Accessories</h3>
                                </div>

                                <div class="col-12">
                                <div class="row my-0">

                                    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Other Accessories</li>
                                        </ol>
                                    </nav>

                                </div>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center gap-2">

                                        <?php

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='5' AND 
                                    `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 10 OFFSET 0");

                                        $product_num = $product_rs->num_rows;

                                        for ($z = 0; $z < $product_num; $z++) {
                                            $product_data = $product_rs->fetch_assoc();
                                        ?>

                                            <div class="card col-6 col-lg-2 mt-2 mb-2" style="width: 18rem;">

                                                <?php

                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                $image_data = $image_rs->fetch_assoc();

                                                ?>

                                                <?php

                                                    $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id`='".$product_data["condition_id"]."'");
                                                    $condition_data = $condition_rs->fetch_assoc();

                                                ?>      

                                                <a href='<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>' class="inner"><img src="<?php echo $image_data["code"]; ?>"
                                                 class="bg-white card-img-top img-thumbnail mt-2" style="height: 200px;" /></a>                                                <div class="card-body ms-0 m-0 text-center">
                                                    <h5 class="card-title fw-bold fs-6"><?php echo $product_data["title"]; ?></h5>
                                                    <span class="badge rounded-pill text-bg-dark"> <?php echo $condition_data["name"]; ?></span><br/>
                                                    <span class="card-text text-primary">LKR. <?php echo $product_data["price"]; ?> .00</span><br />
                                                    <?php

                                                    if ($product_data["qty"] > 0) {

                                                    ?>

                                                    <div class="row">

                                                    <?php

                                                    } else {

                                                    ?>

                                                        <!-- <button class="col-12 btn btn-dark mt-2 disabled">Get Now</button> -->
                                                        <button class="col-5 offset-2 btn btn-warning mt-2 disabled">
                                                            <i class="bi bi-bag-plus text-white fs-5"></i>
                                                        </button>

                                                    <?php

                                                    }

                                                    ?>

                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }

                                        ?>

                                    </div>
                                </div>

                            </div>
                        </div>
            <!-- Products -->
            <hr>

            <div class="pt=2">
                <h6 class="mb-4"><a href="home.php" class="text-body"><i
                class="fas fa-long-arrow-alt-left me-2"></i>Back to Home</a></h6>
            </div><hr>

            <?php include "footer.php"; ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>
</html>