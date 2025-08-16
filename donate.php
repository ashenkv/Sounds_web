<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Donate | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />
</head>
<body>
    <div class="container-fluid">
        <div class="row">

            <?php include "navHome.php"; ?>

            <div class="col-12 mt-1 bg-dark">
                <div class="row mt-2 mb-2">
                    <span class="text-white fs-1 text-center">Donate</span>
                </div>
            </div>

            <div class="col-12 mt-2">
                <div class="row shadow">

                    <div class="col-4 text-center border d1">
                        <label class="fs-2 text-light">Health <i class="bi bi-heart-pulse-fill fs-2 text-light"></i></label>
                    </div>
                    <div class="col-4 text-center border d2">
                        <label class="fs-2 text-light">Education <i class="bi bi-book-half fs-2 text-light"></i></label>
                    </div>
                    <div class="col-4 text-center border d3">
                        <label class="fs-2 text-light">Nature <i class="bi bi-tree-fill fs-2 text-light"></i></label>
                    </div>

                </div>
            </div>

            <!--carousel-->

            <div class="col-12 col-lg-6 offset-lg-3 d-none d-lg-block mt-3 mb-0">
                <div class="row">

                    <div id="carouselExampleIndicators" class="col-12 carousel slide carousel-fade" data-bs-ride="true">
                             <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://www.sjp.ac.lk/wp-content/uploads/2015/05/cancer-hospital-children-arms-giving-2.jpg"
                                         class="d-block slide-1 " />
                                        <div class="carousel-caption d-none d-md-block slide-caption text-start bg-dark text-center border border-light">
                                            <h5 class="slide-title fs-2 ">Donate Hair for Children..</h5>
                                            <a class="slide-txt border btn btn-outline-light rounded-0" href="https://www.ncisl.health.gov.lk/?page_id=84">
                                                Lern more <i class="bi bi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://www.unicef.org/srilanka/sites/unicef.org.srilanka/files/styles/hero_desktop/public/SLK-2014-Noorani-0778.jpg?itok=RQMxRojy" class="d-block slide-1 " />
                                        <div class="carousel-caption d-none d-md-block slide-caption text-center border">
                                            <h5 class="slide-title fs-2 ">Let's strengthen education</h5>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://static.vecteezy.com/system/resources/previews/002/379/544/non_2x/world-environment-day-planting-trees-and-love-the-environment-love-nature-free-photo.jpg" class="d-block slide-1 " />
                                        <div class="carousel-caption d-none d-md-block slide-caption-1 text-center border">
                                            <h5 class="slide-title fs-2 text-light fw-bold ">Green Earth..</h5>
                                            <!-- <h5 class="slide-title text-dark border border-light rounded-4">Enjoy your Way</h5>
                                            <p class="slide-txt text-dark">Experience the Best and Pure Sounds With Us.</p> -->
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

            <div class="col-12 col-lg-8 offset-lg-2 mb-5 mt-5 reveal">
                <div class="row">
                    <h2 class="text-dark text-center fs-4">#
                    Our mission
                    </h2>
                    <p class="text-secondary text-center fs-4">
                    At SoundS, we are committed to creating a better world by investing in the well-being 
                    of people and the planet. Through our donations focused on health, education, and building nature, 
                    we strive to make a positive impact on the lives of individuals and communities, and to protect and 
                    restore the natural environment. Our mission is to create a more sustainable, equitable, and thriving future for all.
                    </p>
                </div>
            </div>

            <div class="col-12">
                <br><hr>
            </div>

            <div class="col-12 col-lg-10 offset-lg-1 reveal">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Financial Assistance</h2>
                    </div><hr><br>
                <div class="col-6 offset-3 col-lg-4 offset-lg-0">
                    <h4>Select one You Want to Donate</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                        Health
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                        Education
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                        Nature
                        </label>
                    </div><br>
                </div>
                <div class="col-12 col-lg-8 text-center">
                    <h4>Donate Amount</h4>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Rs.</span>
                        <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">.00</span>
                    </div>
                    <a href="#" class="btn btn-outline-success">Donate</a>
                </div>
                </div>
            </div>

            <div class="col-12">
                <br><hr>
            </div>

            <div class="col-12 text-center">
                <div class="row">
                    <label class="text-secondary fs-4 fw-bold">SoundS.lk</label>
                </div>
            </div>

            <div class="col-12">
                <br><br>
            </div>

        </div>
    </div>
    
    <?php include "footer.php"; ?>

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