<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <title>Document</title> -->

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>

    <div class="container-fluid">
        <div class="row ad7 mt-1">

            <div class="col-12 col-lg-8">
            <nav class="navbar navbar-expand-lg bg-body-tertiary col-md-12 col-sm-12">
  <div class="container-fluid">
        <div class="offset-0 offset-lg-0 col-12 col-lg-1 logo " style="height: 35px;"></div>&nbsp;
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon btn btn-light"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-0 gap-lg-3">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="home.php"><i class="bi bi-house"></i> Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" 
           aria-expanded="false">
            menu
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="watchlist.php">Watchlist</a></li>
            <li><a class="dropdown-item" href="purchasingHistory.php">Purchase</a></li>
            <li><a class="dropdown-item" href="message.php">Messages</a></li>
            <li><a class="dropdown-item" href="about.php">About</a></li>
            <li><a class="dropdown-item" href="donate.php">Donate <i class="bi bi-piggy-bank"></i></a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="userProfile.php">
            <i class="bi bi-person-circle"></i></a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
            </div>

                <div class="col-6 col-lg-1 offset-lg-2">
                <?php

session_start();

if (isset($_SESSION["u"])) {
    $data = $_SESSION["u"];

?>
    <!-- <span class="text-lg-start"><b>Welcome </b><?php echo $data["fname"]; ?></span> | -->
    <a class="text-lg-end link text-danger dropdown-item mt-2" onclick="signout();" window.reload>
     <i class="bi bi-box-arrow-in-left fs-5"></i></a>
<?php
} else {

    ?>
        <a href="index.php" class="text-decoration-none px-2 btn btn-light rounded-5 mt-2">Sign In
             <i class="bi bi-box-arrow-right"></i>
        </a>
    <?php

    }
    ?>
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

            <!-- cart -->
                <div class="col-1 offset-5 col-lg-1 offset-lg-0 mt-2 text-center"
                    onclick="window.location='cart.php';"><i class="bi bi-bag-fill text-info fs-5 link"></i>
                </div>
            <!-- cart -->

        </div>
    </div>

    <script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");
    menuBtn.onclick = () => {
        items.classList.add("active");
        menuBtn.classList.add("hide");
        searchBtn.classList.add("hide");
        cancelBtn.classList.add("show");
    }
    cancelBtn.onclick = () => {
        items.classList.remove("active");
        menuBtn.classList.remove("hide");
        searchBtn.classList.remove("hide");
        cancelBtn.classList.remove("show");
        form.classList.remove("active");
        cancelBtn.style.color = "#ff3d00";
    }
    searchBtn.onclick = () => {
        form.classList.add("active");
        searchBtn.classList.add("hide");
        cancelBtn.classList.add("show");
    }
    </script>

    <!-- <script src="bootstrap.bundle.js"></script> -->
    <script src="script.js"></script>
</body>
</html>