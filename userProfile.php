<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Profile | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="user.css" />

    <link rel="icon" href="resource/logo.png">
</head>

<body style="background-color: #E9F5F9;background-image: linear-gradient(90deg,#E9F5F9 0%,#E9F5F9 100%);">

<div class="container-fluid mt-0 mb-0">
    <div class="row">

    <?php
    include "navHome.php";

require "connection.php";

if (isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];

    // $details_rs = Database::search("SELECT * FROM `users` INNER JOIN `profile_image` ON
    // users.email=profile_image.users_email INNER JOIN `user_has_address` ON 
    // users.email=user_has_address.users_email INNER JOIN `city` ON 
    // user_has_address.city_id=city.id INNER JOIN `district` ON 
    // city.district_id=district.id INNER JOIN `province` ON 
    // district.province_id=province.id INNER JOIN `gender` ON 
    // gender.id=users.gender_id WHERE `email`='".$email."'");

    $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON 
    gender.id=user.gender_id WHERE `email`='" . $email . "'");

    $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");

    $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON 
    user_has_address.city_id=city.id INNER JOIN `district` ON 
    city.district_id=district.id INNER JOIN `province` ON 
    district.province_id=province.id WHERE `user_email`='" . $email . "'");

    $data = $details_rs->fetch_assoc();
    $image_details = $image_rs->fetch_assoc();
    $address_data = $address_rs->fetch_assoc();

?>

    <div class="col-12">
        <div class="row">

        <div class="col-12 mt-1 bg-dark">
            <div class="row mt-2 mb-2">
                <span class="text-white fs-1 text-center">My Profile</span>
            </div>
        </div>&nbsp;

        <div class="col-12 col-lg-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-1 py-5 border border-2 rounded mt-1 inner">
            <?php

if (empty($image_details["path"])) {
?>
    <img src="resource/new_user.svg" class="rounded-circle mt-5 border border-info" style="width: 110px;" id="viewImg"/>
<?php
} else {
?>
    <img src="<?php echo $image_details["path"]; ?>" class="rounded-circle mt-5 border border-info" style="width: 110px;" id="viewImg" />
<?php
}

?>

            <span class="fw-bold text-dark"><?php echo $data["fname"] . " " . $data["lname"]; ?></span>
            <span class="fw-bold text-black-50"><?php echo $email; ?></span>

            <input type="file" class="d-none" id="profileimg" accept="image/*" />
            <label for="profileimg" class="btn btn-dark mt-5 rounded-4" onclick="changeImage();">Change <i class="bi bi-camera"></i></label>

            <!-- <span class="font-weight-bold"><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></span>
            <span class="text-black-50"><?php echo $email; ?></span><span> </span> -->
        </div>
        </div>
        <div class="col-12 col-lg-5 border border-secondary rounded shadow bg-light mt-1">
            <div class="p-0 py-0">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control rounded-4" 
                    value="<?php echo $data["fname"]; ?>" id="fname"></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control rounded-4" 
                    value="<?php echo $data["lname"]; ?>" id="lname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control rounded-4" 
                    value="<?php echo $data["mobile"]; ?>" id="mobile"></div>
                    <div class="col-md-12"><label class="labels">Password</label><input type="password" class="form-control rounded-4" readonly 
                    value="<?php echo $data["password"]; ?>"></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control rounded-4" readonly 
                    value="<?php echo $data["email"]; ?>"></div>

                    <?php

                        if (!empty($address_data["line1"])) {

                    ?>
                    <div class="col-md-12">
                        <label class="labels">Address Line 1</label>
                        <input type="text" class="form-control rounded-4" 
                        value="<?php echo $address_data["line1"]; ?>" id="line1">
                    </div>
                     <?php

                        } else {
                    ?>

                        <div class="col-12">
                            <label class="labels">Address Line 1</label>
                            <input type="text" class="form-control rounded-4" id="line1">
                        </div>

                    <?php
                        }

                            if (!empty($address_data["line2"])) {

                    ?>
                    <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control rounded-4" 
                    value="<?php echo $address_data["line2"]; ?>" id="line2"></div>
                    <?php

                        } else {
                    ?>
                            <div class="col-md-12">
                                <label class="labels">Address Line 2</label>
                                <input type="text" class="form-control rounded-4" id="line2"/>
                            </div>
                    <?php
                            }
                    ?>

                    <?php

                        if (!empty($address_data["postal_code"])) {
                    ?>
                        <div class="col-6">
                        <div class="col-md-12">
                            <label class="labels">Postcode</label>
                            <input type="text" class="form-control rounded-4" 
                            value="<?php echo $address_data["postal_code"]; ?>" id="pcode">
                        </div>
                        </div>
                    <?php
                        } else {
                    ?>
                        <div class="col-md-12">
                            <label class="labels">Postcode</label>
                            <input type="text" class="form-control rounded-4" id="pcode">
                        </div>
                    <?php
                        }

                        $province_rs = Database::search("SELECT * FROM `province`");
                        $district_rs = Database::search("SELECT * FROM `district`");
                        ?>

                    <div class="col-md-12">
                        <label class="labels">Province</label>
                        <select class="form-select rounded-4" id="province">
                                <option value="0" class="fs-7">Select Province</option>
                                <?php
                                $province_num = $province_rs->num_rows;
                                for ($x = 0; $x < $province_num; $x++) {
                                $province_data = $province_rs->fetch_assoc();
                                ?>
                                <option value="<?php echo $province_data["id"]; ?>" <?php
                                    if (!empty($address_data["province_id"])) {

                                        if ($province_data["id"] == $address_data["province_id"]) {
                                ?>selected<?php
                                            }
                                        }

                                ?>><?php echo $province_data["name"]; ?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">District</label>
                        <select class="form-select rounded-4" id="district">
                            <option value="0">Select District</option>
                            <?php
                                $district_num = $district_rs->num_rows;
                                    for ($x = 0; $x < $district_num; $x++) {
                                    $district_data = $district_rs->fetch_assoc();
                            ?>
                                <option value="<?php echo $district_data["id"]; ?>" <?php
                                    if (!empty($address_data["district_id"])) {
                                        if ($district_data["id"] == $address_data["district_id"]) {
                                ?>selected<?php
                                            }
                                        }
                                    ?>><?php echo $district_data["name"]; ?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">City</label>
                        <select class="form-select rounded-4" id="city">
                            <option value="0">Select City</option>
                                <?php
                                $city_rs = Database::search("SELECT * FROM `city`");
                                $city_num = $city_rs->num_rows;
                                    for ($x = 0; $x < $city_num; $x++) {
                                    $city_data = $city_rs->fetch_assoc();
                                ?>
                                <option value="<?php echo $city_data["id"]; ?>" <?php
                                    if (!empty($address_data["city_id"])) {
                                        if ($city_data["id"] == $address_data["city_id"]) {
                                ?>selected<?php
                                        }
                                    }
                                ?>><?php echo $city_data["name"]; ?></option>
                                <?php
                                }
                                ?>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="labels">Gender</label>
                        <input type="text" class="form-control rounded-4" readonly value="<?php echo $data["gender_name"]; ?>">
                    </div>
                </div>
                
                <div class="mt-5 text-center">
                    <button class="btn btn-dark profile-button rounded-4"  onclick="updateProfile();" type="button">Save Profile</button>
                </div>
            </div>
            <div class="pt=2">
                <h6 class="mb-4"><a href="home.php" class="text-body"><i
                class="fas fa-long-arrow-alt-left me-2"></i>Back to Home</a></h6>
            </div>
        </div><hr/>
        
    </div>
</div>

</div>
</div>

</div>
</div>

<?php

} else {

    header("Location:home.php");
}

?>

<?php include "footer.php"; ?>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>
</html>