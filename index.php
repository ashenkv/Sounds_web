<?php

require "connection.php";

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SoundS</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css">

        <link rel="icon" href="resource/logo.png" />

    </head>

    <body class="main-body">

        <div class="container-fluid vh-100 d-flex justify-content-center">
            <div class="row align-content-center mr">

            <!--header-->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 logo"></div>
                    <div class="col-12">
                        <!-- <p class="text-center title1 text-light rounded-2">Hi, Welcome to SoundS</p> -->
                    </div>
                </div>
            </div>
            <!--header-->

            <!--content-->
            <div class="col-12 p-4">
                <div class="row">

                    <div class="col-12 col-lg-3"></div>    
                    <div class="col-12 col-lg-6 bg-light rounded-4 d-none" id="signUpBox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title2 text-dark text-center">Create a New Account</p>
                            </div>

                            <div class="col-12 d-none" id="msgdiv">
                                <div class="alert alert-danger" role="alert" id="alertdiv">
                                    <i class="bi bi-x-octagon-fill fs-5" id="msg">
                                    </i>
                                </div>
                            </div>

                            <div class="col-6">
                                <!-- <label class="form-label text-dark">First Name</label> -->
                                <input type="text" class="form-control rounded-4" placeholder="First Name" id="f">
                            </div>
                            <div class="col-6">
                                <!-- <label class="form-label text-dark">Last Name</label> -->
                                <input type="text" class="form-control rounded-4" placeholder="Last Name" id="l">
                            </div>
                            <div class="col-12 col-lg-12">
                                <!-- <label class="form-label text-dark" >Email</label> -->
                                <input type="text" class="form-control rounded-4" placeholder="Email" id="e">
                            </div>
                            <div class="col-12 col-lg-12">
                                <!-- <label class="form-label text-dark">Password</label> -->
                                <input type="text" class="form-control rounded-4" placeholder="Password" id="p">
                            </div>
                            <div class="col-6">
                                <!-- <label class="form-label text-dark">Mobile</label> -->
                                <input type="text" class="form-control rounded-4" placeholder="Mobile" id="m">
                            </div>
                            <div class="col-6">
                                <!-- <label class="form-label text-dark">Gender</label> -->
                                <select class="form-select rounded-4" name="Gender" id="g">
                                    <?php

                                    // $db = new mysqli("localhost", "root", "", "sounds", "3306");
                                    

                                    $rs =  Database::search("SELECT * FROM `gender`");
                                    $n = $rs->num_rows;

                                    for($x = 0;$x < $n; $x++){
                                        $d = $rs->fetch_assoc();
                                        ?>

                                        <option value="<?php echo $d["id"]; ?>"><?php echo $d["gender_name"]; ?></option>

                                        <?php
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6 d-grid mt-3">
                                <button class="btn btn-dark rounded-5" onclick="signUp();">Sign Up</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid mt-3">
                                <button class="btn btn-warning rounded-5" onclick="changeV();">Already Sign In</button>
                            </div>
                            <div class="col-12"></div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-6 bg-light rounded-4" id="signInBox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title2">Sign In</p>
                                <span class="text-danger" id="msg2"></span>
                            </div>

                            <?php

                            $email = "";
                            $password = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }

                            ?>

                            <div class="col-12">
                                <!-- <label class="form-label">Email</label> -->
                                <input type="email" class="form-control rounded-4" placeholder="Email" id="email2" value="<?php echo $email; ?>" />
                            </div>
                            <div class="col-12">
                                <!-- <label class="form-label">Password</label> -->
                                <input type="password" class="form-control rounded-4 mb-2" id="password2" placeholder="Password" value="<?php echo $password; ?>" />
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberme">
                                    <label class="form-check-label" onclick="signIn();">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#" class="link-primary text-primary" onclick="forgotPassword();">Forgot Password</a>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-dark rounded-5" onclick="signIn();">Sign In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="ui teal button rounded-5" onclick="changeV();">New to SoundS? Join Now</button>
                            </div>
                            <div class="col-12"></div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4"></div>
            <!--content-->

            <!-- Model Box -->
            <div class="modal" tabindex="-1" id="PasswordModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Password Reset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-0">
                        <div class="col-12">
                            <!-- <label class="form-label">New Password</label> -->
                            <div class="input-group mb-3">
                                <input type="password" class="form-control rounded-0" placeholder="New Password" id="np" />
                                <button class="btn btn-outline-light border text-secondary" type="button" id="npb"
                                    onclick="showPassword1();">Show</button>
                            </div>
                        </div>

                        <div class="col-12">
                            <!-- <label class="form-label">Re-Type Password</label> -->
                            <div class="input-group mb-3">
                                <input type="password" class="form-control rounded-0" placeholder="Confirm Password" id="rnp" />
                                <button class="btn btn-outline-light border text-secondary" type="button" id="rnpb"
                                    onclick="showPassword2();">Show</button>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Verification Code</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control rounded-4" id="vc" />
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-dark rounded-4" onclick="resetPassword();">Reset</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Model Box -->

            <!--footer-->
            <div class="col-12 fixed-bottom d-none d-lg-block">
                <p class="text-center text-dark">&copy; 2022 SoundS.lk || All Right Reserved</p>
            </div>
            <!--footer-->

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
        <script src="bootstrap.bundle.js"></script>          
        <script src="script.js"></script>
    </body>
</html>