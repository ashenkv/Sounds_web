<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>add product | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="bootstrap.css.map" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />

</head>
<body>
<div class="container-fluid">
        <div class="row gy-3">
            
            <?php 
            session_start();
            require "connection.php";

            if (isset($_SESSION["au"])) {

            ?>

                <div class="col-12">
                    <div class="row">

                        <div class="col-12 mt-1">
                            <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="storeProducts.php">Store Products</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                                </ol>
                            </nav>
                        </div>

                        <div class="col-12 text-center ad7 rounded-0 mt-0">
                            <span class="text-light fw-bold fs-1 mt-0">Add Product</span>&nbsp;
                        </div>

                        <div class="col-12">
                            <hr class="border-primary" />
                        </div>

                        <div class="col-12">
                            <div class="row">

                            <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label" style="font-size: 20px;">
                                                Add a Title
                                            </label>
                                        </div>
                                        <div class="offset-0 offset-lg-0 col-12 col-lg-10">
                                            <input type="text" class="form-control rounded-4" id="title" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-info" />
                                </div>

                                <div class="col-12 col-lg-4 border-end border-info">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label" style="font-size: 20px;">Select Category</label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-center rounded-4" id="category" onchange="load_brand();">
                                                <option value="0">Select Category</option>
                                                <?php

                                                $category_rs = Database::search("SELECT * FROM `category`");
                                                $category_num = $category_rs->num_rows;

                                                for ($x = 0; $x < $category_num; $x++) {
                                                    $category_data = $category_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 border-end border-info">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label" style="font-size: 20px;">Select Brand</label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-center rounded-4" id="brand">
                                                <option value="0">Select Brand</option>
                                                <?php

                                                $brand_rs = Database::search("SELECT * FROM `brand`");
                                                $brand_num = $brand_rs->num_rows;

                                                for ($y = 0; $y < $brand_num; $y++) {
                                                    $brand_data = $brand_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>

                                        

                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 border-end border-info">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label" style="font-size: 20px;">Select Model</label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-center rounded-4" id="model">
                                                <option value="0">Select Model</option>
                                                <?php

                                                $model_rs = Database::search("SELECT * FROM `model`");
                                                $model_num = $model_rs->num_rows;

                                                for ($z = 0; $z < $model_num; $z++) {
                                                    $model_data = $model_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-info" />
                                </div>

                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-12 col-lg-4 border-end border-info">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label" style="font-size: 20px;">Select Condition</label>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check form-check-inline mx-5">
                                                        <input class="form-check-input rounded-4" type="radio" id="b" name="c" checked />
                                                        <label class="form-check-label" for="b">Brandnew</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input rounded-4" type="radio" id="u" name="c" />
                                                        <label class="form-check-label" for="u">Used</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-4 border-end border-info">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label" style="font-size: 20px;">Select Colour</label>
                                                </div>
                                                <div class="col-12">

                                                        <select class="form-select rounded-4" id="clr">
                                                            <option value="0">Select Colour</option>

                                                            <?php

                                                            $clr_rs = Database::search("SELECT * FROM `color`");
                                                            $clr_num = $clr_rs->num_rows;

                                                            for ($a = 0; $a < $clr_num; $a++) {
                                                                $clr_data = $clr_rs->fetch_assoc();
                                                            ?>

                                                                <option value="<?php echo $clr_data["id"]; ?>"><?php echo $clr_data["name"]; ?></option>

                                                            <?php
                                                            }

                                                            ?>

                                                        </select>
                                                </div>

                                                <div class="col-12">
                                                    <!-- <div class="input-group mt-2 mb-2">
                                                        <input type="text" class="form-control rounded-4" placeholder="Add new Colour" id="clr_in" />
                                                        <button class="btn btn-outline-info rounded-5" type="button" id="button-addon2">+ Add</button>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                         $product_rs = Database::search("SELECT * FROM `product`");
                                         $product_data = $product_rs->fetch_assoc();
                                        ?>

                                        <div class="col-12 col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label" style="font-size: 20px;">Add Quantity</label>
                                                </div>
                                                <div class="col-12">
                                                    <input type="number" class="form-control rounded-4" value="0" min="0" 
                                                    pattern="[0-9]" value="<?php echo $product_data["qty"]; ?>" 
                                                    onkeyup='check_value2(<?php echo $product_data["qty"]; ?>);' 
                                                    onkeypress='(<?php echo $product_data["qty"]; ?>);'
                                                     id="qty" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-info" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label" style="font-size: 20px;">Item Description</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea cols="30" rows="15" class="form-control" id="desc"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-info" />
                                </div>

                                <div class="col-12 reveal">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label" style="font-size: 20px;">Add Item Images</label>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-4 border border-info rounded">
                                                    <img src="resource/add_img.svg" class="img-fluid" style="height: 230px;" id="i0"/>
                                                </div>
                                                <div class="col-4 border border-info rounded">
                                                    <img src="resource/add_img.svg" class="img-fluid" style="height: 230px;" id="i1"/>
                                                </div>
                                                <div class="col-4 border border-info rounded">
                                                    <img src="resource/add_img.svg" class="img-fluid" style="height: 230px;" id="i2"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                            <input type="file" class="d-none" id="imageuploader" multiple/>
                                            <label for="imageuploader" class=" offset-lg-4 col-12 col-lg-4 btn btn-warning rounded-4" 
                                                onclick="changeProductImage();">Upload Images</label>
                                        </div>
                                    </div>
                                </div>&nbsp;

                                <div class="col-12">
                                    <hr class="border-info" />
                                </div>

                                <div class="col-12 reveal">
                                    <div class="row">

                                        <div class="col-12 col-lg-6 border-end border-info">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label" style="font-size: 20px;">Cost Per Item</label>
                                                </div>
                                                <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" id="cost" />
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label" style="font-size: 20px;">Accepted Payment Methods</label>
                                                </div>
                                                <div class="col-12">
                                                    <!-- <div class="row">
                                                        <div class="offset-0 offset-lg-2 col-2 pm pm1"></div>
                                                        <div class="col-2 pm pm2"></div>
                                                        <div class="col-2 pm pm3"></div>
                                                        <div class="col-2 pm pm4"></div>
                                                    </div> -->
                                                    <a href="https://www.payhere.lk" target="_blank"><img src="https://www.payhere.lk/downloads/images/payhere_long_banner.png" 
                                                    alt="PayHere" width="400" class="pm"/></a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-info" />
                                </div>

                                <div class="col-12 reveal">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label" style="font-size: 20px;">Delivery Cost</label>
                                        </div>
                                        <div class="col-12 col-lg-6 border-end border-info">
                                            <div class="row">
                                                <div class="col-12 offset-lg-1 col-lg-3">
                                                    <label class="form-label">Delivery cost Within Colombo</label>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" id="dwc" />
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-12 offset-lg-1 col-lg-3">
                                                    <label class="form-label">Delivery cost out of Colombo</label>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" id="doc" />
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>&nbsp;

                                <div class="col-12">
                                    <hr class="border-info" />
                                </div>


                                <div class="col-12">
                                    <label class="form-label fw-bold" style="font-size: 20px;">Notice...</label><br />
                                    <label class="form-label">
                                        We are taking 5% of the product from price from every
                                        product as a service charge.
                                    </label>
                                </div>

                                <div class="offset-lg-5 col-12 col-lg-2 d-grid mt-3 mb-3">
                                    <button class="btn btn-dark rounded-4" onclick="addProduct();">Save Item</button>
                                </div>

                            </div>
                        </div>&nbsp;

                        <div class="col-12">
                            <hr class=" border-secondary"/>
                        </div>

                        <div class="pt=2">
                            <h6 class="mb-4"><a href="adminPanel.php" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Admin Panel</a></h6>
                        </div>

                    </div>
                </div>

            <?php

            } else {
                header("Location:adminPanel.php");
            }

            ?>

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
</body>
</html>