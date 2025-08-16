<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cart | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />
</head>

<body style="background-color: #E9F5F9;background-image: linear-gradient(90deg,#E9F5F9 0%,#E9F5F9 100%);">
    <div class="container-fluid">
        <div class="row">


            <?php include "navHome.php";
                require "connection.php";

            if(isset($_SESSION["u"])){                

                $email = $_SESSION["u"]["email"];
                
                $total = 0;
                $subtotal = 0;
                $shipping = 0;

                $proid = Database::search("SELECT * FROM `cart` WHERE `user_email`='".$_SESSION["u"]["email"]."'");
                $prores = $proid->fetch_assoc();

                ?>

            <!-- <div class="col-12 pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div> -->

            <div class="col-12">
                <div class="row">

                <!-- <div class="col-12 mt-1 bg-dark">
                    <div class="row mt-2 mb-2">
                        <span class="text-white fs-1 text-center">Cart <i class="bi bi-basket fs-1 text-info"></i></span>
                    </div>
                </div> -->

                <div class="col-12 mt-1 bg-dark">
                    <div class="row mt-1 mb-1">
                        <div class="col-4 offset-4 col-lg-2 offset-lg-5">
                            <span class="form-label fs-1 text-white">Cart 
                                <i class="bi bi-basket fs-1 text-info"></i>
                            </span>
                        </div>
                        <div class="col-1 offset-3 col-lg-1 offset-lg-3">
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
                                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                                        </ol>
                                    </nav>
    </div>
    <div class="dropdown mt-3">
    <nav class="nav nav-pills flex-column">
                                        <a class="nav-link text-dark text-start btn btn-outline-light rounded-4" href="watchlist.php">My Watchlist</a>
                                        <a class="nav-link active bg-dark rounded-4" aria-current="page" href="cart.php">My Cart</a>
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
                    <hr/>
                </div>

                <?php

                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='".$email."'");
                $cart_num = $cart_rs->num_rows;

                if($cart_num == 0){

                    ?>

                    <!--empty view-->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 emptyCart"></div>
                        <div class="col-12 text-center mb-2">
                            <label class="form-label fs-1 fw-bold">
                                You have no items in your cart yet.
                            </label>
                        </div>
                        <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                            <a href="home.php" class="btn btn-outline-warning rounded-5 fs-3 fw-bold">
                                Start Shopping
                            </a>
                        </div>
                    </div>
                </div>
                <!--empty view-->

                    <?php

                }else{

                    ?>

                    <!--products-->
                <div class="col-lg-1"></div>    
                <div class="col-12 col-lg-10">
                    <div class="row">

                    <?php

                    for($x = 0; $x < $cart_num;$x++){
                        $cart_data = $cart_rs->fetch_assoc();

                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$cart_data["product_id"]."'");
                        $product_data = $product_rs->fetch_assoc();

                        $total = $total + ($product_data["price"] * $cart_data["qty"]);

                        $address_rs = Database::search("SELECT district.id AS did FROM `user_has_address` INNER JOIN `city` ON
                        user_has_address.city_id=city.id INNER JOIN `district` ON city.district_id=district_id WHERE 
                        `user_email`='".$email."'");

                        $address_data = $address_rs->fetch_assoc();

                        $ship = 0;

                        if($address_data["did"] == 2){
                            $ship = $product_data["delivery_fee_colombo"];
                            $shipping = $shipping + $ship;

                        }else{
                            $ship = $product_data["delivery_fee_other"];
                            $shipping = $shipping + $ship;
                        }

                        // $seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='".$product_data["user_email"]."'");
                        // $seller_data = $seller_rs->fetch_assoc();
                        // $seller = $seller_data["fname"]." ".$seller_data["lname"];

                        ?>

                        <div class="card mb-3 mx-0 col-12">
                                            <div class="row g-0">
                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <!-- <span class=" text-black-50 fs-5">Seller :</span>&nbsp;
                                                            <span class="text-black fs-5"><?php echo $seller; ?></span>&nbsp; -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">

                                                <?php

                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                $image_data = $image_rs->fetch_assoc();

                                                ?>

                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" 
                                                    data-bs-content="<?php echo $product_data["description"]; ?>" title="Product Details">
                                                        <img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-start" style="max-width: 200px;"/>
                                                    </span>

                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card-body">

                                                        <h3 class="card-title"><?php echo $product_data["title"]; ?></h3>

                                                        <span class="fw-bold text-black-50 fs-5">Price :</span>&nbsp;
                                                        <span class="fw-bold text-primary fs-5">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                        <br/><br/>

                                                        <?php

                                                            $clr_rs = Database::search("SELECT * FROM `color` WHERE `id`='".$product_data["color_id"]."'");
                                                            $clr_data = $clr_rs->fetch_assoc();

                                                        ?>

                                                        <span class="fw-bold text-black-50">Colour : </span>
                                                        <span class="badge rounded-4 text-bg-dark"> <?php echo $clr_data["name"]; ?></span>
                                                         &nbsp; |

                                                        <?php

                                                            $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id`='".$product_data["condition_id"]."'");
                                                            $condition_data = $condition_rs->fetch_assoc();

                                                        ?>

                                                        &nbsp; 
                                                        <span class="fw-bold text-black-50">Condition : </span>
                                                        <span class="badge rounded-4 text-bg-dark"> <?php echo $condition_data["name"]; ?></span>
                                                        <br/>
                                                        
                                                        <!-- <span class="fw-bold text-black-50 fs-5">Quantity : </span>&nbsp; -->
                                                        <!-- <input type="number" class="mt-3 border border-1 border-secondary fs-5 px-3 cardqtytext rounded-4"
                                                         id="qty_input"  value="<?php echo $product_data["qty"]; ?>"> -->
                                                         <div class="border border-0 rounded overflow-hidden float-left mt-1 position-relative rounded-4 row">
                                                            <div class="col-12 col-lg-8">
                                                                <span class=" text-dark fs-5">Quantity : </span>
                                                                <input type="number" class="border fs-5 text-start rounded-4 bg-light text-dark" style="padding-left:10px; outline: none;" 
                                                                            pattern="[0-9]" value="" 
                                                                             onkeyup='check_value(<?php echo $product_data["qty"]; ?>);' 
                                                                             onkeypress='check_value(<?php echo $product_data["qty"]; ?>);'
                                                                             onclick="qty_inc(<?php echo $product_data['qty']; ?>);qty_dec();" 
                                                                             id="qty_input"
                                                                             />

                                                                <!-- <div class="position-absolute qty-buttons rounded-4">
                                                                    <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-dark
                                                                     btn btn-outline-primary qty-inc rounded-4">
                                                                        <i class="bi bi-caret-up-fill text-dark fs-5" onclick='qty_inc(<?php echo $cart_data["qty"]; ?>);'></i>
                                                                    </div>
                                                                    <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-dark
                                                                     btn btn-outline-primary qty-dec rounded-4">
                                                                        <i class="bi bi-caret-down-fill text-dark fs-5" onclick="qty_dec();"></i>
                                                                    </div>
                                                                </div> -->

                                                            </div>
                                                        </div>
                                                        <br>
                                                        <span class="fw-bold text-black-50 fs-5">Delivery Fee :</span>&nbsp;
                                                        <span class="fw-bold text-black fs-5">Rs. <?php echo $product_data["delivery_fee_other"]; ?> .00</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card-body d-grid">
                                                        
                                                        <a class="btn btn-outline-danger mb-2 rounded-4" onclick="deleteFromCart(<?php echo $cart_data['id'] ?>);">Remove</a>
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-6 col-md-6">
                                                            <span class="fw-bold fs-5 text-black-50">Requested Total <i class="bi bi-info-circle"></i></span>
                                                        </div>
                                                        <div class="col-6 col-md-6 text-end">
                                                            <span class="fw-bold fs-5 text-black-50">Rs. 
                                                            <?php echo ($product_data["price"] * $cart_data["qty"]) + $ship; ?> .00</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                <!-- form -->
                                                <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
                                        <div class="d-none">

                                            <?php

                                            ?>

                                        </div>
                                        <div class="col-12 offset-lg-11 col-lg-1">
                                                <div class="d-grid">
                                                    <a href='<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>' class="btn btn-outline-dark rounded-4 mb-2"
                                                     >Get Now</a>
                                                </div>
                                            </div>


                                    </form>

                                                <!-- form -->

                                            </div>
                                        </div>

                        <?php

                    }

                    ?>


                    </div>
                </div>
                <!--products-->

                    <?php

                }

                ?>

                </div>
            </div>

            <!--summary-->
            <div class="col-12 reveal">
                    <div class="row">

                        <div class="col-12 col-lg-3"></div>

                        <div class="col-12 col-lg-6">
                        <div class="row">

                        <div class="col-12 bg-grey rounded-4 border border-info" style="background-color:#FFFFFF;">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">items (<?php echo $cart_num; ?>)</h5>
                    <span >Rs. <?php echo $total; ?> .00</span>
                  </div>

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">Shipping (<?php echo $cart_num; ?>)</h5>
                    <span>Rs. <?php echo $shipping; ?> .00</span>
                  </div>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase fs-5">Total price</h5>
                    <span class=" fs-5">Rs. <?php echo ($shipping + $total); ?> .00</span>
                  </div>

                    <?php
                    $totalS = ($product_data["price"] * $cart_data["qty"]) + $shipping;
                    ?>

                  <!-- form -->
                  <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
                                        <div class="d-none">

                                            <?php
                                            $total2 = $total * $cart_data['qty'];
                                            // $total2 = $total * $cart_data['qty'] + $shipping;

                                            $merchant_id = "1222073";
                                            $order_id = $product_data["id"];
                                            $amount = $total2 + $shipping;
                                            $currency =  "LKR";
                                            $payhere_secret = "MzQxNzY1NjIwNDEyMDQyODQwOTc2MTcxNTU2MzIxNjA3Mzg1Mzc3";
                                            
                                            $hash = strtoupper(
                                                md5(
                                                    "1222073" . 
                                                    $order_id = $product_data["id"] . 
                                                    number_format($amount, 2, '.', '') . 
                                                    "LKR" .  
                                                    strtoupper(md5("NjkwMzM0MTc3NTQ2MzU2NDAzMzc5OTgzMTA4MzE0NjA5MDk3NDM=")) 
                                                ) 
                                            );

                                            ?>
                                            <input type="hidden" name="merchant_id" value="1222073"> Replace your Merchant ID
                                            <input type="hidden" name="return_url" value="http://localhost/sounds/invoice.php">
                                            <input type="hidden" name="cancel_url" value="http://localhost/sounds/cart.php">
                                            <input type="hidden" name="notify_url" value="http://sample.com/notify">
                                            </br></br>Item Details</br>
                                            <input type="text" name="order_id" value="<?php echo $order_id; ?>">
                                            <input type="text" name="items" value="<?php echo $product_data["title"]; ?>">
                                            <input type="text" name="currency" value="<?php echo $currency; ?>">
                                            <input type="text" name="amount" value="<?php echo $amount; ?>">

                                            </br></br>Customer Details</br>
                                            <input type="text" name="first_name" value="fname">
                                            <input type="text" name="last_name" value="lname">
                                            <input type="text" name="email" value="ashenlalantha453@gmail.com">
                                            <input type="text" name="phone" value="0771234567">
                                            <input type="text" name="address" value="No.1, Galle Road">
                                            <input type="text" name="city" value="Colombo">
                                            <input type="hidden" name="country" value="Sri Lanka">

                                            <input type="hidden" name="hash" value="<?php echo $hash; ?>"> Replace calculated hash

                                        </div>
                                        <div class="col-12 offset-lg-8 col-md-4">
                                                <div class="d-grid">
                                                    <button class="btn btn-warning rounded-4 mb-2"
                                                     onclick="CheckOutBuyNow(<?php echo $pid; ?>);">CHECKOUT</button>
                                                </div>
                                            </div>


                                    </form>

                </div>
              </div>
            
            </div>

                        </div>
                    </div>
                                
                            </div>&nbsp;

                        <!--summary-->

                        <hr class="my-4">

                  <div class="pt=2">
                    <h6 class="mb-4"><a href="home.php" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to Home</a></h6>
                  </div>

            
            <?php
            
            }else{
                echo("You must be logged in to checkout.");
            }

            include "footer.php"; 

            ?>


        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>

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
</body>
    
</html>

