<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png">
</head>

<body style="background-color: #E9F5F9;background-image: linear-gradient(90deg,#E9F5F9 0%,#E9F5F9 100%);">

    <div class="container-fluid">
        <div class="row">

        <?php include "navHome.php";
        require "connection.php";
        ?>

        <hr />

        <?php include "homeGif.php"; ?>

        <div class="col-12 justify-content-center">
            <div class="row mb-3">

                <!-- <div class="offset-4 offset-lg-1 col-4 col-lg-1 " style="height: 60px;"></div> -->
                

                <div class="col-lg-4 offset-lg-7 col-12 mt-2">
                <div class="input-group mt-1 mb-0">
                    <input type="text" class="form-control bg-light" placeholder="Search..." aria-label="Text input with dropdown button" 
                        id="basic_search_txt" >
                           <!-- <option>Categories</option> -->
                      <!-- <select class="form-select bg-light" style="max-width: 22%;" id="basic_search_select"> -->
                           <?php

                                $category_rs = Database::search("SELECT * FROM `category`");
                                $category_num = $category_rs->num_rows;

                                for ($x = 0; $x < $category_num; $x++) {
                                    $category_data = $category_rs->fetch_assoc();
                                ?>

                                    <!-- <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?></option> -->

                                <?php
                                }

                                ?>
                        <!-- </select> -->
                    <button class="btn btn-dark" onclick="basicSearch(0);" id="basic_search_select" type="button"><i class="bi bi-search"></i></button>
                </div>
                </div>

            </div>
        </div>

        <div class="col-12" id="basicSearchResult">
            <div class="row">

            <div class="col-lg-2 offset-lg-1 d-lg-block col-12 d-none">
                <ul class="list-group border">
                    <li class="list-group-item active bg-light text-dark border-0 fw-bold" aria-current="true"><i class="bi bi-columns-gap fw-bold"></i>&nbsp; Categories</li>
                    <a href="1.php" class="btn btn-light btn-outline-white text-start"><i class="bi bi-earbuds text-secondary"></i> Headphones</a>
                    <a href="2.php" class="btn btn-light btn-outline-white text-start"><i class="bi bi-displayport-fill text-secondary"></i> Soundbars</a>
                    <a href="3.php" class="btn btn-light btn-outline-white text-start"><i class="bi bi-align-bottom text-secondary"></i> Hometheaters</a>
                    <a href="4.php" class="btn btn-light btn-outline-whit text-start"><i class="bi bi-speaker text-secondary"></i> Studio Monitors</a>
                    <a href="2.php" class="btn btn-light btn-outline-white text-start"><i class="bi bi-boombox text-secondary"></i> Speakers</a>
                    <a href="6.php" class="btn btn-light btn-outline-white text-start"><i class="bi bi-music-note text-secondary"></i> Instruments</a>
                    <a href="#" class="btn btn-light btn-outline-white text-start"><i class="bi bi-headset text-secondary"></i> Gaming Headsets</a>
                    <a href="5.php" class="btn btn-light btn-outline-white text-start"><i class="bi bi-hypnotize text-secondary"></i> Other Accessories</a>
                </ul>
            </div>

            <div class="col-6 d-lg-none d-block">
                <div class="dropdown">
                    <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-columns-gap fw-bold"></i>&nbsp; Categories
                    </a>

                    <ul class="dropdown-menu">
                        <a href="1.php" class="btn btn-light btn-outline-white text-start"><i class="bi bi-earbuds text-secondary"></i> Headphones</a>
                        <a href="2.php" class="btn btn-light btn-outline-white text-start"><i class="bi bi-displayport-fill text-secondary"></i> Soundbars</a>
                        <a href="3.php" class="btn btn-light btn-outline-white text-start"><i class="bi bi-align-bottom text-secondary"></i> Hometheaters</a>
                        <a href="4.php" class="btn btn-light btn-outline-whit text-start"><i class="bi bi-speaker text-secondary"></i> Studio Monitors</a>
                        <a href="2.php" class="btn btn-light btn-outline-white text-start"><i class="bi bi-boombox text-secondary"></i> Speakers</a>
                        <a href="6.php" class="btn btn-light btn-outline-white text-start"><i class="bi bi-music-note text-secondary"></i> Instruments</a>
                        <a href="#" class="btn btn-light btn-outline-white text-start"><i class="bi bi-headset text-secondary"></i> Gaming Headsets</a>
                        <a href="5.php" class="btn btn-light btn-outline-white text-start"><i class="bi bi-hypnotize text-secondary"></i> Other Accessories</a>
                    </ul>
                </div>
            </div>

            <!--carousel-->

            <div class="col-12 col-lg-8 offset-lg-0 d-none d-lg-block mb-3">
                <div class="row">

                    <div id="carouselExampleIndicators" class="col-12 carousel slide carousel-fade" data-bs-ride="true">
                             <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="resource/slide_imgs/slid1.jpeg" class="d-block slide-1 " />
                                        <div class="carousel-caption d-none d-md-block slide-caption text-start">
                                            <h5 class="slide-title text-start fs-3 ">Enjoy the All Natural Sounds..</h5>
                                            <p>AVAILABLE NEW ITEMS !</p>
                                            <a class="slide-txt border btn btn-outline-light rounded" href="1.php">SHOP NOW <i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="resource/slide_imgs/slid2.jpg" class="d-block slide-1 " />
                                        <div class="carousel-caption d-none d-md-block slide-caption text-end">
                                            <h5 class="slide-title fs-3 ">Speakers and Soundbars..</h5>
                                            <p>BEST BRANDS !</p>
                                            <a class="slide-txt border btn btn-outline-light rounded" href="2.php">GET IT NOW <i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="resource/slide_imgs/slid3.jpg" class="d-block slide-1 " />
                                        <div class="carousel-caption d-none d-md-block slide-caption text-end">
                                            <h5 class="slide-title fs-3 text-light fw-bold ">For Music lovers..</h5>
                                            <p>TIME TO SHOP !</p>
                                            <a class="slide-txt border btn btn-outline-light rounded" href="6.php">SHOP NOW <i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>   


                </div>
            </div>

            <!--carousel-->

            <div class="col-12 col-lg-10 offset-lg-1 mt-2 mb-3">
                    <div class="row rounded-2 border1">
                        <div class="col-4 col-lg-4 text-center mt-2 border2">
                            <h5 class="fw-bold font"><i class="bi bi-shield-fill-check fs-5"></i> Payment safety</h5>
                        </div>
                        <div class="col-4 col-lg-4 text-center mt-2 border2">
                            <h5 class="fw-bold font"><i class="bi bi-cash-coin fs-5"></i> Money back guarantee</h5>
                        </div>
                        <div class="col-4 col-lg-4 text-center mt-2 border2">
                            <h5 class="fw-bold font"><i class="bi bi-headset fs-5"></i> Friendly service</h5>
                        </div>
                    </div>
                </div>

            <?php
                    $c_rs = Database::search("SELECT * FROM `category`");
                    $c_num = $c_rs->num_rows;

                    for ($y = 0; $y < $c_num; $y++) {
                        $cdata = $c_rs->fetch_assoc();

                    ?>

            <!--category name-->
            <div class="col-12 col-lg-10 offset-1 mt-3 mb-3 reveal">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="#" class="text-decoration-none text-secondary font fs-3 fw-bold "><?php echo $cdata["name"]; ?></a>&nbsp;
                    </div>
                    <div class="col-lg-2 offset-lg-4">
                        <a href="<?php echo $cdata["id"]; ?>.php" class="text-decoration-none text-secondary fs-5">
                            see more <i class="bi bi-arrow-right-circle fs-5"></i></a>
                    </div>
                </div>
            </div>
            <!--category name-->

            <!-- Products -->
			<div class="col-12 col-lg-10 offset-lg-1 mb-3 reveal">
                            <div class="row border border-light bg-white rounded-3">

                                <div class="col-12 ">
                                    <div class="row justify-content-center gap-2">

                                        <?php

                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $cdata["id"] . "' AND 
                                    `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");

                                        $product_num = $product_rs->num_rows;

                                        for ($z = 0; $z < $product_num; $z++) {
                                            $product_data = $product_rs->fetch_assoc();
                                        ?>

                                            <div class="card col-6 col-lg-2 mt-2 mb-2 reveal bg-light" style="width: 18rem;">

                                                <?php

                                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                                $image_data = $image_rs->fetch_assoc();

                                                ?>

                                                <?php

                                                    $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id`='".$product_data["condition_id"]."'");
                                                    $condition_data = $condition_rs->fetch_assoc();

                                                ?>

                                                <a href='<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>' class="inner"><img src="<?php echo $image_data["code"]; ?>"
                                                 class="bg-white card-img-top img-thumbnail mt-2" style="height: 200px;" /></a>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title fw-bold fs-6"><?php echo $product_data["title"]; ?></h5>
                                                    <span class="badge rounded-pill fw-light text-bg-dark text-light"> <?php echo $condition_data["name"]; ?></span><br/>
                                                    <span class="card-text text-primary font mt-4 fs-6">LKR. <?php echo $product_data["price"]; ?> .00</span><br />
                                                    <?php

                                                    if ($product_data["qty"] > 0) {

                                                    ?>

                                                        <div class="row">
                                                        <!-- <a href='<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>'
                                                         class="col-12 btn btn-dark rounded-4 mt-2">Get Now</a> -->

                                                    <?php

                                                    } else {

                                                    ?>

                                                        <!-- <button class="col-12 btn btn-dark mt-2 rounded-4 disabled">Get Now</button> -->
                                                        <button class="col-5 offset-2 btn btn-warning mt-2 rounded-5 disabled">
                                                            <i class="bi bi-bag-plus text-white fs-6"></i>
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

            <?php
            }
            ?>

            <!-- brands -->
            <div class="col-12 reveal "><br><br>
                <div class="row"><hr class="border border-dark">
                    <div class="col-12">
                        <h1 class="bc text-center fw-bold shadow">Brand Partners</h1>
                    </div>&nbsp;
                    <div class="col-12 reveal">
                        <div class="row justify-content-center">
                            <div class="col-lg-2 col-4 d-grid">
                                <img src="resource/br1.svg" class="img-fluid hvr">
                            </div>
                            <div class="col-lg-2 col-4">
                                <img src="resource/br2.svg" class="img-fluid hvr">
                            </div>
                            <div class="col-lg-2 col-4 d-grid">
                                <img src="resource/br3.svg" class="img-fluid hvr">
                            </div>
                            <div class="col-lg-2 col-4">
                                <img src="resource/br4.svg" class="img-fluid hvr">
                            </div>
                            <div class="col-lg-2 col-4 d-grid">
                                <img src="resource/br5.svg" class="img-fluid hvr">
                            </div>
                            <div class="col-lg-2 col-4">
                                <img src="resource/br6.svg" class="img-fluid hvr">
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 col-md-3 col-12 text-center">
                            <a href="#">
                                <div class="brand-item">
                                    <img src="resources/b2.jpg" class="img-fluid hvr" alt="">
                                </div>
                            </a>
                        </div> -->
                    </div>

                </div><hr>
            </div>
            <!-- brands -->

            <!-- ads -->
                <div class="col-12 col-lg-10 offset-lg-1 d-none d-lg-block ">
                    <div class="row ">

                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                                    <div class="carousel-item active border bg-light">
                                        <h2 class="text-primary fs-6 mt-1"><i class="bi bi-file-earmark-excel-fill"></i>Advertisement</h2>
                                        <img src="https://www.seekpng.com/png/full/445-4459925_apple-music-listen-listen-on-apple-podcasts-badge.png"
                                         class="d-block slide-2 slide_h" />                                        
                                        <a class="text-center" href="https://music.apple.com/us/browse"><h6 class="text-dark">Join today</h6></a>
                                    </div>
                                    <div class="carousel-item border bg-light">
                                        <h2 class="text-primary fs-6 mt-1"><i class="bi bi-file-earmark-excel-fill"></i>Advertisement</h2>
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2V3nX0MgGBXH4Yvn7bYALeSq1etEvI5XUUnagV2vSeYzefLNpJsfyECHlRiN5ycU3OQ&usqp=CAU"
                                         class="d-block slide-2 slide_h2" />                                        
                                        <a class="text-center" href="https://soundcloud.com/"><h6 class="text-dark">SoundCloud-Sign Up today</h6></a>
                                    </div>
                                    <div class="carousel-item border bg-light">
                                        <h2 class="text-primary fs-6 mt-1"><i class="bi bi-file-earmark-excel-fill"></i>Advertisement</h2>
                                        <img src="https://www.pngkey.com/png/detail/19-197432_project-brief-sony-music-entertainment.png"
                                         class="d-block slide-2 slide_h3" />                                        
                                        <a class="text-center" href="https://www.sonymusic.com/"><h6 class="text-dark">Join today</h6></a>
                                    </div>
                                </div>
  <a class="" type="" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
    </a>
  <a class="" type="" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
        </a>
</div>
  <a class="" type="" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
        </a>
  <a class="" type="" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
        </a>
</div>


                        <!-- <h2 class="text-primary text-center fs-6 mt-1"><i class="bi bi-file-earmark-excel-fill"></i>Advertisement</h2>
                        <a class="text-center" href="https://music.apple.com/us/browse">
                        <img style="height: 30px;" src="https://image.shutterstock.com/image-vector/apple-music-icons-set-streaming-260nw-2188906495.jpg" 
                        alt="Apple Music"><h6 class="text-dark">Apple music - Signup today</h6></a> -->
                    </div><br>
                </div>
            <!-- ads -->

            <!-- bg -->
            <hr class="text-secondary" />

                <div class="col-lg-12 d-lg-block d-none reveal bg2">
                    <div class="row">
                        <img src="resource/bg2.png" class="d-lg-block" alt="">
                        <div class="centered"><h2>|SoundS|</h2> 
                        Experience Better Sounds</div>
                    </div><br>
                </div>
            <!-- bg -->

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
</body>
</html>