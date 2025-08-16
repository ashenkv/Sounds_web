<?php

require "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT product.price,product.qty,product.description,product.title,
    product.datetime_added,product.delivery_fee_colombo,product.delivery_fee_other,product.category_id,
    product.brand_has_model_id,product.color_id,product.status_id,product.condition_id,product.user_email,
    model.name AS mname, brand.name AS bname, product.description AS pd FROM `product` 
    INNER JOIN `brand_has_model` ON brand_has_model.id=product.brand_has_model_id 
    INNER JOIN `brand` ON brand.id=brand_has_model.brand_id 
    INNER JOIN `model` ON model.id=brand_has_model.model_id WHERE product.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;

    if ($product_num == 1) {
    
        $product_data = $product_rs->fetch_assoc();
?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title><?php echo $product_data["title"]; ?> | SoundS</title>

            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
            <link rel="stylesheet" href="style.css" />

            <link rel="icon" href="resource/logo.png" />
        </head>

        <body style="background-color: #E9F5F9;background-image: linear-gradient(90deg,#E9F5F9 0%,#E9F5F9 100%);">

            <div class="container-fluid">
                <div class="row">

                    <?php include "navHome.php";?>

                    <div class="col-12 mt-0 rounded-4 singleProduct">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">

                                    <div class="row border-bottom border-light">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Single Product View</li>
                                            </ol>
                                        </nav>
                                    </div><br>

                                    <div class="row">
                                        <div class="col-12 offset-lg-2">
                                            <span class=" text-dark fw-bold sp_txt"><?php echo $product_data["title"]; ?></span>
                                            <span class="badge border rounded-4">
                                                <i class="bi bi-star-fill text-warning fs-5"></i>
                                                <i class="bi bi-star-fill text-warning fs-5"></i>
                                                <i class="bi bi-star-fill text-warning fs-5"></i>
                                                <i class="bi bi-star-fill text-warning fs-5"></i>
                                                <i class="bi bi-star-half text-warning fs-5"></i>

                                                &nbsp;&nbsp;

                                                <label class="fs-6 text-dark border border-info rounded">4.5 </label>&nbsp;
                                                <label class="fs-5 text-dark">stars | </label>&nbsp;
                                                <label class="text-dark">28 Reviews & Ratings</label>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-12 text-info">
                                        <hr>
                                    </div>

                                    <div class="col-12 col-lg-2 offset-lg-2 order-2 order-lg-1">
                                        <ul>
                                            <?php

                                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                            $image_num = $image_rs->num_rows;
                                            $img = array(); 

                                            if ($image_num != 0) {

                                                for ($x = 0; $x < $image_num; $x++) {
                                                    $image_data = $image_rs->fetch_assoc();
                                                    $img[$x] = $image_data["code"];
                                            ?>

                                                    <li class="d-flex flex-column justify-content-center align-items-center border 
                                                        border-info rounded-4 mb-1 bg-white inner">
                                                        <a href="<?php echo $image_data["code"]; ?>"><img src="<?php echo $image_data["code"]; ?>" style="height: 115px;" 
                                                        class=" mt-1 mb-1 rounded-4" 
                                                        id="productImg<?php echo $x; ?>" /></a>
                                                    </li>

                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary mb-1">
                                                    <img src="resource/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                                </li>
                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary mb-1">
                                                    <img src="resource/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                                </li>
                                                <li class="d-flex flex-column justify-content-center align-items-center border border-1 border-secondary mb-1">
                                                    <img src="resource/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                                </li>
                                            <?php
                                            }

                                            ?>

                                        </ul>
                                    </div>

                                    <div class="col-12 col-lg-6 order-lg-1 d-none d-lg-block">
                                        <div class="row">
                                            <div class="col-12 border border-1 border-info rounded-4 bg-white">
                                                <div class="col-12 m_img inner" id="main_img">
                                                
                                                    <img src="<?php echo $image_data["code"]; ?>" style="height: 335px;" 
                                                        class="align-items-center mt-1 mb-1 rounded-4" 
                                                        id="productImg<?php echo $x; ?>" />
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 order-3">
                                        <div class="row">
                                            <div class="col-12 reveal">

                                                <br>
                                                <?php

                                                $price = $product_data["price"];
                                                $adding_price = ($price / 100) * 5;
                                                $new_price = $price + $adding_price;
                                                $difference = $new_price - $price;
                                                $percentage = ($difference / $price) * 100;

                                                ?>

                                                <div class="row border-bottom bg-dark">
                                                    <div class="col-12 my-2 ">
                                                        <span class="fs-2 text-light">Rs. <?php echo $price; ?> .00</span>
                                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                                        <span class="fs-6 text-danger text-decoration-line-through">Rs. <?php echo $new_price; ?> .00</span>
                                                        &nbsp;&nbsp; | &nbsp;&nbsp;
                                                        <span class="fs-6 text-secondary">Save Rs. <?php echo $difference; ?> .00 (<?php echo $percentage; ?>%)</span>
                                                    </div>
                                                </div>

                                                <div class="row border-bottom">
                                                    <div class="col-12 col-lg-5 my-2 ">
                                                    <span class="fs-5 text-dark"><b>Sold : &nbsp;</b>10 Items</span>
                                                        <!-- <span class="fs-5 text-secondary"><b>Warrenty : </b>6 Months Warrenty</span><br />
                                                        <span class="fs-5 text-secondary"><b>Return Policy : </b>1 Months Return Policy</span><br />
                                                        <span class="fs-5 text-secondary"><b>In Stock : </b>03 Items Available</span> -->
                                                    </div>
                                                    <div class="col-12 col-lg-6 my-2 p-1">
                                                        <div class="row g-2">
                                                            <div class="col-12 border text-center rounded-4 bg-light">
                                                                <!-- <span class="fs-5 text-dark"><b>Sold : &nbsp;</b>10 Items</span> -->
                                                            </div>
                                                            <div class="col-12 col-lg-6 offset-lg-3">
                                                                <div class="row">
                                                                    <!-- carousel -->
                                                                    <div class="col-12 pt-0 pt-lg-3">
                                                                        <div class="row">

                                                                            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                                                                                <div class="carousel-inner">
                                                                                    <div class="carousel-item active">
                                                                                        <div class="col-12">
                                                                                            <div class="row">
                                                                                                <!-- <img src="https://img.freepik.com/premium-photo/pile-old-books-good-copy-space-blue-background-image_488220-27057.jpg?w=900" class="d-block w-100" alt="..."> -->
                                                                                                <div class=" col-10 offset-1">
                                                                                                    <div class="row">

                                                                                                        <div class="col-12">
                                                                                                            <div class="row d-flex align-items-center">
                                                                                                                <div class="col-3 d-grid inner">
                                                                                                                    <div class="row">
                                                                                                                        <a href="#" class=""></a><img src="resource/payments/paypal.png" 
                                                                                                                        style="width:100%; border-radius: 0%;" class=""></a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-3 inner">
                                                                                                                    <div class="row">
                                                                                                                        <img src="resource/payments/visa.png" 
                                                                                                                        style="width:100%; border-radius: 0%;" class="">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-3 inner">
                                                                                                                    <div class="row">
                                                                                                                        <a href="#" class=""></a><img src="resource/payments/card.png" 
                                                                                                                        style="width:100%; border-radius: 0%;" class=""></a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-3 inner">
                                                                                                                    <div class="row">
                                                                                                                        <img src="resource/payments/hnb.jpg" 
                                                                                                                        style="width:100%; border-radius: 0%;" class="">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="carousel-item">
                                                                                        <div class="col-12">
                                                                                            <div class="row">
                                                                                                <!-- <img src="https://img.freepik.com/premium-photo/3d-rendering-colorful-pencils-arrangement_190619-815.jpg?w=900" class="d-block w-100" alt="..."> -->
                                                                                                <div class=" col-10 offset-1">
                                                                                                    <div class="row">

                                                                                                        <div class="col-12">
                                                                                                            <div class="row d-flex align-items-center">
                                                                                                                <div class="col-3 d-grid inner">
                                                                                                                    <div class="row">
                                                                                                                        <a href="#" class=""></a><img src="resource/payments/combank.png" 
                                                                                                                        style="width:100%; border-radius: 0%;" class=""></a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-3 inner">
                                                                                                                    <div class="row">
                                                                                                                        <img src="resource/payments/paypal.png" 
                                                                                                                        style="width:100%; border-radius: 0%;" class="">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-3 inner">
                                                                                                                    <div class="row">
                                                                                                                        <a href="#" class=""></a><img src="resource/payments/tag.png" 
                                                                                                                        style="width:100%; border-radius: 0%;" class=""></a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="col-3 inner">
                                                                                                                    <div class="row">
                                                                                                                        <img src="resource/payments/tag.png" 
                                                                                                                        style="width:100%; border-radius: 0%;" class="">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                                                                    <span class="border-0 clr6" type="button" aria-hidden="true"><i class="bi bi-arrow-left text-secondary"></i></span>
                                                                                    <span class="visually-hidden">Previous</span>
                                                                                </button>
                                                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                                                                    <span class="border-0 clr6" type="button" aria-hidden="true"><i class="bi bi-arrow-right text-secondary"></i></span>
                                                                                    <span class="visually-hidden">Next</span>
                                                                                </button>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                <!-- carousel -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                <div class="col-12 col-lg-6 my-2 border text-center">
                                                    <span class="fs-6 fw-bold text-dark"><i class="bi bi-shield-check fs-4 mt-2 text-primary"></i> 30-Day Buyer Protection</span><br />
                                                </div>
                                                <div class="col-12 col-lg-6 my-2 border text-center">
                                                    <span class="fs-6 fw-bold text-dark"><i class="bi bi-truck fs-4 mt-2 text-primary"></i> Delivery Facilities Are Available</span><br />
                                                </div>
                                                </div>

                                                <div class="row">
                                                    
                                                    

                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">

                                                            <div class="col-12 col-lg-6 my-2">
                                                                <div class="row g-2">

                                                                    <div class="border rounded overflow-hidden float-left mt-1 position-relative product-qty rounded-4">
                                                                        <div class="">
                                                                            <span class=" text-dark fs-5">Quantity : </span>
                                                                            <input type="number" class="col-8 border-0 fs-5 text-start rounded-4 bg-light text-dark" style="outline: none;" 
                                                                            pattern="[0-9]" value="" 
                                                                             onkeyup='check_value(<?php echo $product_data["qty"]; ?>);' 
                                                                             onkeypress='(<?php echo $product_data["qty"]; ?>);'
                                                                             onclick="qty_inc(<?php echo $product_data['qty']; ?>);qty_dec();" 
                                                                             id="qty_input"
                                                                             />

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-lg-6">
                                                                <div class="row">

                                                                    <div class="my-2 offset-lg-2 col-12 col-lg-8 bgh rounded">
                                                                        <div class="row">
                                                                            <div class="col-3 col-lg-2 text-center">
                                                                                <img src="resource/pricetag1.png" />
                                                                            </div>
                                                                            <div class="col-9 col-lg-10 mt-2">
                                                                                <span class="fs-5 text-white">
                                                                                    3 step Installment for Credit Cards
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                        <div class="col-12 my-5">
                                                                            <div class="row">
                                                                                <div class="col-lg-3 col-12 mb-1 d-grid offset-lg-1">
                                                                                    <button class="btn btn-dark rounded-5" type="submit" id="payhere-payment" 
                                                                                    onclick="payNow(<?php echo $pid; ?>);">Get Now</button>
                                                                                </div>
                                                                                <div class="col-lg-3 col-12 mb-1 d-grid ">
                                                                                    <button class="btn btn-warning rounded-5" onclick="addToCart(<?php echo $pid; ?>);">Add to Cart</button>
                                                                                </div>
                                                                                <!-- <div class="col-3 d-grid">
                                                                                    <button class="btn btn-outline-secondary rounded-5">
                                                                                        <i class="bi bi-heart-fill fs-4 text-danger"></i>
                                                                                    </button>
                                                                                </div> -->
                                                                                <div class="col-lg-3 col-12 mb-1 d-grid">
                                                                                    <?php

                                                                                        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $pid . "' AND 
                                                                                        `user_email`='" . $_SESSION["u"]["email"] . "'");
                                                                                        $watchlist_num = $watchlist_rs->num_rows;

                                                                                        if ($watchlist_num == 1) {
                                                                                        ?>
                                                                                            <button class="col-12 btn btn-outline-info rounded-5" 
                                                                                            onclick='addToWatchlist(<?php echo $pid; ?>); '>
                                                                                                <i class="bi bi-heart-fill text-danger fs-5" id="heart<?php echo $pid; ?>"></i>
                                                                                            </button>
                                                                                        <?php
                                                                                        }else{
                                                                                            ?>
                                                                                            <button class="col-12 btn btn-outline-info border border-secondary rounded-5" 
                                                                                            onclick='addToWatchlist(<?php echo $pid; ?>); '>
                                                                                            <i class="bi bi-heart text-danger fs-5" id="heart<?php echo $pid; ?>"></i>
                                                                                        </button>
                                                                                            <?php
                                                                                        }

                                                                                    ?>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 reveal">
                                <div class="row">

                                <div class="col-12 bg-white ">
                                <div class="row me-0 mt-4 mb-3 border-bottom border-1 border-dark">
                                    <div class="col-12">
                                        <span class="fs-3 fw-bold">Related Items</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 bg-white ">
                                <div class="row g-2">
                                    <div class="offset-1 offset-lg-0 col-4 col-lg-2">
                                        <div class="card rounded-4" style="width: 18rem;">
                                            <img src="resource/product_imgs/1earphones_&_headphones/Anker_soundcore.jpg" class="card-img-top" />
                                            <div class="card-body ms-0 m-0 text-center">
                                                <h5 class="card-title fs-6 fw-bold">Anker SoundCore Life Q30 <span class="badge bg-info"> New</span></h5>
                                                <span class="card-text text-primary">Rs. 34999 .00</span> <br />
                                                <span class="card-text text-warning fw-bold">In Stock</span> <br />
                                                <span class="card-text text-success fw-bold">5 Items Available</span><br /><br />
                                                <a href="singleProductView.php" class="col-12 btn btn-dark rounded-5">Get Now</a>
                                                <button class="col-12 btn btn-warning mt-2 rounded-5">Add to Cart</button>
                                                <button class="col-12 btn btn-outline-info mt-2 border border-secondary rounded-5"><i class="bi bi-heart text-danger fs-6"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                            </div><hr>

                                </div>
                            </div>

                            <div class="col-12 bg-white reveal">
                                <div class="row me-0 mt-4 mb-3 border-bottom border-1 border-dark border-end">
                                    <div class="col-12">
                                        <span class="fs-3 fw-bold">Product Details</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 bg-white reveal">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fs-4 fw-bold">Product Description : </label>
                                            </div>
                                            <div class="text-secondary">
                                                <div class="col-lg-9 col-12">
                                                    <label class="form-label fs-6 fw-bold">Brand: &nbsp;</label>
                                                    <label class=" form-label fs-6 text-secondary"><?php echo $product_data["bname"]; ?></label>
                                                </div>
                                                <div class="col-lg-9 col-12">
                                                    <label class="form-label fs-6 fw-bold">Model: &nbsp;</label>
                                                    <label class=" form-label fs-6 text-secondary"><?php echo $product_data["mname"]; ?></label>
                                                </div>  
                                                <textarea cols="60" rows="10" class="form-control mb-2" readonly><?php echo $product_data["pd"]; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- bg -->
                            <!-- <hr class="hr-break-1 reveal" /> -->

                            <div class="col-lg-12 d-lg-block d-none reveal bg2 mt-2">
                                <div class="row">
                                    <img src="resource/bg3.jpg" class="d-lg-block" alt="">
                                    <div class="centered text-end p-3"><h2>Best Headphones for You !</h2>
                                    <a href="1.php" class="border border-light btn btn-outline-light fs-3">Shop now
                                         <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div><br>
                            </div>
                            <!-- bg -->

                            <div class="col-12 bg-white reveal">
                                <div class="row me-0 mt-4 mb-3 border-bottom border-1 border-dark border-end">
                                    <div class="col-12">
                                        <span class="fs-3 fw-bold">Feedbacks</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 reveal">
                                <div class="row border border-1 border-dark rounded me-0 overflow-scroll" style="height: 300px;">
                                    <div class="col-12 mt-1 mb-1 mx-1">
                                        <div class="row me-0">
                                            <div class="col-10 mt-1 mb-1 ms-0">
                                                <span class="fw-bold text-light"><?php echo $_SESSION["u"]["fname"]; ?></span>
                                            </div><?php

                                                    $feedbackrs = Database::search("SELECT * FROM `feedback` WHERE `product_id`='" . $pid . "'");
                                                    $feed = $feedbackrs->num_rows;

                                                    if ($feed == 0) {
                                                    ?>
                                                <label class="form-lable fs-3 text-secondary text-center">There are no feedbacks to view.</label>
                                            <?php
                                                    } else {
                                            ?>
                                                <div class="col-12">
                                                    <div class="row">

                                                        <?php
                                                        for ($a = 0; $a < $feed; $a++) {
                                                            $feedrow = $feedbackrs->fetch_assoc();
                                                        ?>

                                                            <div class="col-12 p-3">
                                                                <div class="row">
                                                                    <div class="col-12  border border-1 border-success rounded-4">
                                                                        <div class="row">

                                                                            <div class="col-12">
                                                                                <span class="fs-5 text-black-50"><?php echo $feedrow["user_email"]  ?></span>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <span class="text-success fw-bold"><?php echo $feedrow["feedback"]  ?></span>
                                                                            </div>

                                                                            <div class="col-12 text-end">
                                                                                <span class="fs-6 text-secondary"><?php echo $feedrow["date"]  ?></span>
                                                                            </div>
                                                                            

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php

                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            <?php
                                                    }
                                            ?>

                                            <!-- <div class="col-2 mt-1 mb-1 me-0">
                                                <span class="badge bg-success">Positive</span>
                                            </div>
                                            <div class="col-12"><hr/></div>
                                            <div class="col-12">
                                                <p class="text-center fw-bold text-black-50">Good product.</p>
                                            </div>
                                            <div class="offset-6 col-6 text-end">
                                                <label class="form-label fs-6">2022-11-5 00:00:00</label>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <?php include "footer.php"; ?>

                </div>
            </div>

            <script type="text/javascript">
                window.addEventListener('scroll', reveal);

                function reveal() {
                var reveals = document.querySelectorAll('.reveal');

                for(var i = 0; i < reveals.length; i++){
                    var windowheight = window.innerHeight;
                    var revealtop = reveals[i].getBoundingClientRect().top;
                    var revealpoint = 150;

                    if(revealtop < windowheight - revealpoint){
                        reveals[i].classList.add('active');
                    }
                    else{
                        reveals[i].classList.remove('active');
                    }
                }
            }
            </script>

            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

        </body>

        </html>

<?php

} else {
    echo ("Sorry for the Inconvenience");
}

    
} else {
    echo ("Something went wrong");
}

?>