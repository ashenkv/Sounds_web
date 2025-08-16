<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    
 <!--header-->

 <div class="col-12">
        <div class="row mt-1 mb-1">

            <!-- <div class="offset-0 offset-lg-0 col-12 col-lg-1 logo" style="height: 40px;"></div> -->

            <!-- </div> -->

            <div class="col-1 offset-0 col-lg-1 offset-lg-9 align-self-end mb-1">
                <div class="row">

                    <!-- <div class="col-1 col-lg-3 mt-2">
                        <span class="text-start fw-bold sell">Sell</span>
                    </div> -->

                    <div class="col-2 col-lg-6 dropdown">
                        <button class="btn btn-outline-light dropdown-toggle rounded-4" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-distribute-vertical"></i>
                        </button>
                        <ul class="dropdown-menu gap-0 gap-lg-3">
                            <li><a class="dropdown-item" href="home.php"><i class="bi bi-house"></i>  Home</a></li>
                            <li><a class="dropdown-item" href="userProfile.php"><i class="bi bi-person-circle"></i>  My Profile</a></li>
                            <!-- <li><a class="dropdown-item" href="#">My Sellings</a></li> -->
                            <!-- <li><a class="dropdown-item" href="myProducts.php">My Products</a></li> -->
                            <li><a class="dropdown-item" href="watchlist.php"><i class="bi bi-bookmark-heart"></i>  Watchlist</a></li>
                            <li><a class="dropdown-item" href="purchasingHistory.php"><i class="bi bi-clock-history"></i>  Purchase History</a></li>
                            <li><a class="dropdown-item" href="message.php"><i class="bi bi-chat-left-dots"></i>  Messages</a></li>
                            <?php

                session_start();

                if (isset($_SESSION["u"])) {
                    $data = $_SESSION["u"];

                ?>
                    <a class="text-lg-start signout dropdown-item" onclick="signout();" window.reload>Sign Out <i class="bi bi-box-arrow-right"></i></a>
                <?php
                } else {

                    ?>
                        <a href="index.php" class="text-decoration-none p-1 rounded bg-light dropdown-item signin">Sign In
                             <i class="bi bi-box-arrow-in-left"></i></a>
                    <?php
    
                    }
                    ?>
                        </ul>
                    </div>

                    

                    <!--msg modal-->
                    <div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
                                            <input type="text" class="form-control"/>
                                        </div>
                                        <div class="col-3 d-grid">
                                            <button type="button" class="btn btn-primary" onclick="sendAdminMsg();">Send</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                    <!--msg modal-->

                </div>
            </div>

                <!-- <div class="col-1 offset-10 col-lg-1 offset-lg-0 mt-1"
                    onclick="window.location='cart.php';"><i class="bi bi-cart2 text-info fs-5 link"></i>
                </div> -->

        </div>
    </div>
<!--header-->

    <script src="script.js"></script>
</body>
</html>