<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Advanced Search | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png">
</head>

<body class=" bg-secondary">

    <div class="container-fluid">
        <div class="row">

        <div class="col-12 bg-body mb-2">
            <?php include "header.php"; ?>
        </div>

            <div class="col-12 bg-body mb-2">
                <div class="row">
                    <div class="offset-lg-4 col-12 col-lg-4">
                        <div class="row">

                            <div class="col-2">
                                <div class="mt-2 mb-2 logo" style="height: 80px;"></div>
                            </div>
                            <div class="col-10 text-center">
                                <p class="fs-1 text-primary fw-bold mt-3 pt-2">Advanced Search</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="row">

                    <div class="col-12 col-lg-1"></div>

                    <div class="col-12 col-lg-10 bg-light rounded-4 border border-info">
                        <div class="row"><hr/>

                            <div class="col-12">
                                <div class="row">

                                <div class="col-12 col-lg-10 mt-2 mb-1">
                                    <input type="text" class="form-control rounded-4" placeholder="Search in Advanced..." id="t">
                                </div>

                                <div class="col-12 col-lg-2 mt-2 mb-1 d-grid">
                                    <button class="btn btn-dark rounded-4" onclick="advancedSearch(0);">Search</button>
                                </div>
                                
                                <div class="col-12">
                                    <hr class="border border-3 border-secondary"/>
                                </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">

                                <div class="col-12 col-lg-6 mb-2">
                                        <select class="form-select rounded-4" id="c1" onchange="advancedSearch(0);">
                                            <option value="0">Select Category</option>
                                            <?php
                                            require "connection.php";
                                            $category_rs = Database::search("SELECT * FROM `category`");
                                            $category_num = $category_rs->num_rows;

                                            for($x = 0; $x < $category_num; $x++){
                                                $category_data = $category_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-3 mb-2">
                                        <select class="form-select rounded-4" id="b" onchange="advancedSearch(0);">
                                            <option value="0">Select Brand</option>
                                            <?php
                                            
                                            $brand_rs = Database::search("SELECT * FROM `brand`");
                                            $brand_num = $brand_rs->num_rows;

                                            for($x = 0; $x < $brand_num; $x++){
                                                $brand_data = $brand_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $brand_data["id"]; ?>"><?php echo $brand_data["name"]; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-3 mb-2">
                                        <select class="form-select rounded-4" id="m" onchange="advancedSearch(0);">
                                            <option value="0">Select Model</option>
                                                <?php

                                                $model_rs = Database::search("SELECT * FROM `model`");
                                                $model_num = $model_rs->num_rows;

                                                for ($y = 0; $y < $model_num; $y++) {
                                                    $model_data = $model_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $model_data["id"]; ?>"><?php echo $model_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-6 mb-2">
                                        <select class="form-select rounded-4" id="c2" onchange="advancedSearch(0);">
                                            <option value="0">Select Condition</option>
                                                <?php

                                                $condition_rs = Database::search("SELECT * FROM `condition`");
                                                $condition_num = $condition_rs->num_rows;

                                                for ($y = 0; $y < $condition_num; $y++) {
                                                    $condition_data = $condition_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $condition_data["id"]; ?>"><?php echo $condition_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-6 mb-2">
                                        <select class="form-select rounded-4" id="c3" onchange="advancedSearch(0);">
                                            <option value="0">Select Colour</option>
                                                <?php

                                                $color_rs = Database::search("SELECT * FROM `color`");
                                                $color_num = $color_rs->num_rows;

                                                for ($y = 0; $y < $color_num; $y++) {
                                                    $color_data = $color_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $color_data["id"]; ?>"><?php echo $color_data["name"]; ?></option>
                                                <?php
                                                }

                                                ?>
                                        </select>
                                    </div>

                                    <div class="col-12 col-lg-6 mb-2">
                                        <input type="text" class="form-control rounded-4" placeholder="Price From.." id="pf" onchange="advancedSearch(0);">
                                    </div>
                                    <div class="col-12 col-lg-6 mb-2">
                                        <input type="text" class="form-control rounded-4" placeholder="Price To.." id="pt" onchange="advancedSearch(0);">
                                    </div>&nbsp;

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>&nbsp;

            <!--2-->
            <div class="col-12">
                <div class="row">

                    <div class="col-12 col-lg-1"></div>

                    <div class="col-12 col-lg-10 bg-light rounded-4 border border-info">

                        <select class="form-select border border-start-0 border-top-0 border-end-0 border-2 border-dark shadow-none rounded-4" id="s" 
                        onchange="advancedSearch(0);">
                            <option value="0">SORT BY</option>
                            <option value="1">PRICE HIGH TO LOW</option>
                            <option value="2">PRICE LOW TO HIGH</option>
                            <option value="3">QUANTITY HIGH TO LOW</option>
                            <option value="4">QUANTITY LOW TO HIGH</option>
                        </select>

                        <div class=" offset-1 col-12 col-lg-10 text-center">
                            <div class="row" id="view_area">
                                <div class="offset-4 offset-lg-5 col-2 mt-5">
                                    <span class="fw-bold text-black-50"><i class="bi bi-emoji-expressionless" style="font-size: 100px;"></i></span>
                                </div>
                                <div class="offset-2 offset-lg-3 col-6 mt-3 mb-5">
                                    <span class="h1 text-black-50 fw-bold">No Item Search Yet...</span>
                                </div>
                            </div>
                        </div>

                        <div class="pt=2">
                            <h6 class="mb-4"><a href="home.php" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Back to Home</a></h6>
                        </div>

                    </div>

                    
                </div>
            </div>
            <!--2-->

        </div>
    </div>&nbsp;

    <?php include "footer.php"; ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>
</html>