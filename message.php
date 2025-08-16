<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Messages | Sounds</title>

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

            $mail = $_SESSION["u"]["email"];
            ?>

            <div class="col-12 mt-1 bg-dark">
                <div class="row mt-2 mb-2">
                    <span class="text-white fs-1 text-center">Messages</span>
                </div>
            </div>

            <div class="col-12">
                <!-- <hr /> -->
            </div>

            <div class="col-12 py-3 px-4">
                <div class="row overflow-hidden">
                    <div class="col-12 col-lg-8 offset-lg-2 px-0">
                        <div class="">
                            <div class="bg-light px-4 py-2 border border-2 mt-2 rounded-4 shadow">
                                <div class="col-12">
                                    <h5 class="mb-0 my-0 fw-bold text-dark">Recents</h5>
                                </div>
                                <div class="col-12">
                                    <!--  -->

                                    <?php

                                    $msg_rs = Database::search("SELECT DISTINCT `content`,`date_time`,`status`,`from`  FROM `chat`
                                     WHERE `to`='" . $mail . "' ORDER BY `date_time` DESC");

                                    ?>

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                                             role="tab" aria-controls="home" aria-selected="true">Received</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                                             role="tab" aria-controls="profile" aria-selected="false">Sent</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="message_box" id="message_box">
                                                <?php

                                                $msg_num = $msg_rs->num_rows;
                                                for ($x = 0; $x < $msg_num; $x++) {
                                                    $msg_data = $msg_rs->fetch_assoc();
                                                    if ($msg_data["status"] == 0) {

                                                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $msg_data["from"] . "'");
                                                        $user_data = $user_rs->fetch_assoc();

                                                        $img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $msg_data["from"] . "'");
                                                        $img_data = $img_rs->fetch_assoc();

                                                ?>
                                                        <div class="list-group rounded-0" onclick="viewMessages('<?php echo $msg_data['from']; ?>');">
                                                            <a href="#" class="list-group-item list-group-item-action text-white rounded-0 bg-primary">
                                                                <div class="media">
                                                                    <?php

                                                                    if (isset($img_data["path"])) {
                                                                    ?>
                                                                        <img src="<?php echo $img_data["path"]; ?>" width="20px" class="rounded-circle" />
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <img src="resource/profile_img/user1.png" width="20px" class="rounded-circle">
                                                                    <?php
                                                                    }

                                                                    ?>

                                                                    <div class="me-4">
                                                                        <div class="d-flex align-items-center justify-content-between mb-1 ">
                                                                            <h6 class="mb-0 fw-bold"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></h6>
                                                                            <small class="small fw-bold"><?php echo $msg_data["date_time"]; ?></small>

                                                                        </div>
                                                                        <p class="mb-0"><?php echo $msg_data["content"]; ?></p>
                                                                    </div>
                                                                </div>
                                                            </a>

                                                        </div>
                                                    <?php

                                                    } else {


                                                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $msg_data["from"] . "'");
                                                        $user_data = $user_rs->fetch_assoc();

                                                        $img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $msg_data["from"] . "'");
                                                        $img_data = $img_rs->fetch_assoc();

                                                    ?>
                                                        <div class="list-group rounded-0" onclick="viewMessages('<?php echo $msg_data['from']; ?>');">
                                                            <a href="#" class="list-group-item list-group-item-action text-dark rounded-0 bg-body">
                                                                <div class="media">
                                                                    <?php

                                                                    if (isset($img_data["path"])) {
                                                                    ?>
                                                                        <img src="<?php echo $img_data["path"]; ?>" width="20px" class="rounded-circle" />
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <img src="resource/logo.png" width="20px" class="rounded-circle">
                                                                    <?php
                                                                    }

                                                                    ?>

                                                                    <div class="me-4">
                                                                        <div class="d-flex align-items-center justify-content-between mb-1 ">
                                                                            <h6 class="mb-0 fw-bold"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></h6>
                                                                            <small class="small fw-bold"><?php echo $msg_data["date_time"]; ?></small>
                                                                        </div>
                                                                        <p class="mb-0"><?php echo $msg_data["content"]; ?></p>
                                                                    </div>
                                                                </div>
                                                            </a>

                                                        </div>
                                                <?php

                                                    }
                                                }

                                                ?>

                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade message_box" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                            <?php

                                            $msg_rs2 = Database::search("SELECT DISTINCT `content`,`date_time`,`status`,`to` FROM `chat` WHERE `from`='" . $mail . "' ORDER BY `date_time` DESC");

                                            $msg_num2 = $msg_rs2->num_rows;
                                            for ($y = 0; $y < $msg_num2; $y++) {
                                                $msg_data2 = $msg_rs2->fetch_assoc();
                                            ?>
                                                <div class="mt-1 sent">
                                                    <div class="list-group rounded-0" onclick="viewMessages('<?php echo $msg_data['from']; ?>');">
                                                        <a href="#" class="list-group-item list-group-item-action text-black rounded-0 bg-white">
                                                            <div class="media">
                                                                <?php
                                                                $user_rs2 = Database::search("SELECT * FROM `user` WHERE `email`='" . $msg_data2["to"] . "'");
                                                                $user_data2 = $user_rs2->fetch_assoc();

                                                                $img_rs2 = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $msg_data2["to"] . "'");
                                                                $img_data2 = $img_rs2->fetch_assoc();

                                                                if (isset($img_data2["path"])) {
                                                                ?>
                                                                    <img src="<?php echo $img_data2["path"]; ?>" width="20px" class="rounded-circle" />
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <img src="resource/profile_img/ashen.jpg" width="20px" class="rounded-circle">
                                                                <?php
                                                                }

                                                                ?>
                                                                <div class="me-4">
                                                                    <div class="d-flex align-items-center justify-content-between mb-1 ">
                                                                        <h6 class="mb-0 fw-bold"> Me</h6>
                                                                        <small class="small fw-bold"><?php echo $msg_data2["date_time"]; ?></small>
                                                                    </div>
                                                                    <p class="mb-0"><?php echo $msg_data2["content"]; ?></p>
                                                                </div>
                                                            </div>
                                                        </a>

                                                    </div>
                                                </div>
                                            <?php
                                            }

                                            ?>

                                        </div>
                                    </div>

                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <br>
                    </div>

                    <!--  -->
                    <div class="col-12 col-lg-8 offset-lg-2 px-0">
                        <div class="row px-4 py-5 bg-light border border-2 rounded-4 chat_box2 " id="chat_box"></div>

                        <!-- txt -->
                        <div class="col-12 px-1">
                            <div class="row">
                                <div class="input-group mb-3 my-1">
                                    <input type="text" id="msg_txt" class="form-control rounded-5 border border-secondary py-2 bg-light" placeholder="Type a message ..." aria-describedby="send_btn">
                                    <button class="border-0 fs-2" id="send_btn"
                                     onclick="send_msg();"><i class="bi bi-send-fill btn btn-outline-dark rounded-5 fs-5 mb-1"></i></button>
                                </div>
                            </div><br><br>
                        </div>
                        <!-- txt -->
                    </div>
                    <!--  -->

                </div>
            </div>

            <?php include "footer.php"; ?>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>