<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Sign In | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />
</head>

<body class="adminbg">

    <div class="container-fluid justify-content-center" style="margin-top: 65px;">
        <div class="row">

            <div class="col-12">
                <div class="row">

                    <div class="col-12 logo"></div>
                    <div class="col-12">
                        <p class="text-center title2 fw-light fs-4 text-white"><strong>Hi, Welcome to</strong> Admins</p>
                    </div>

                </div><br>
            </div>

            <div class="col-12">
                <div class="row">

                    <div class="col-1 col-lg-3"></div>
                    <div class="col-lg-6 bg-light border border-info rounded-4">
                        <div class="row">

                            <div class="col-12">
                                <h2 class=" text-dark my-3">Sign In to your Account</h2><hr>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control rounded-5" placeholder="ex : oshan@gmail.com" id="e">&nbsp;&nbsp;
                            </div>
                            <div class="col-12 col-lg-6 d-grid mb-2 mb-lg-0">
                                <button class="btn btn-dark rounded-4" onclick="adminVerification();">Send verification code</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <a href="index.php" class="btn btn-outline-info text-dark rounded-4">Back to Customer Log In</a>
                            </div>

                        </div><br>
                    </div>

                </div>
            </div>

    <!--modal-->
    <div class="modal" tabindex="-1" id="verificationModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Admin Verification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label class="form-label">Enter Your Verification Code</label>
        <input type="text" class="form-control rounded-4" id="vcode">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary rounded-4" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning rounded-4" onclick="verify();">Verify</button>
      </div>
    </div>
  </div>
</div>
    <!--modal-->

    <div class="col-12 fixed-bottom text-center text-secondary">
        <p>&copy; 2024 sounds.lk | All Rights Reserved</p>
        <p class=" text-light">SoundS &trade;</p>
    </div>

    </div>
</div>
    

<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>
</body>
</html>