<?php
//set time zone for your country
date_default_timezone_set('Africa/Blantyre');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Diary - Injessview</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/enhanced.css">
    <link rel="icon" type="image/png" href="./img/engineer.png" />
    <script src="./js/sweetalert.min.js"></script>
</head>

<body class="bg-light">

    <?php include './nav.php'; ?>

    <div class="container my-5">
        <div class="text-center mb-5" data-aos="fade-down">
            <h1 class="display-4"><span class="text-gradient">📔 Site Diary</span></h1>
            <p class="lead text-muted">Comprehensive project documentation & tracking</p>
        </div>
        
        <div class="row home-menu d-flex flex-column align-items-center justify-content-center" style="min-height:65vh;">
            <div class="col-12 col-md-8 col-lg-6 mb-3" data-aos="fade-right" data-aos-delay="100">
                <a href="roads-authority-site-dairy" class="btn btn-primary btn-lg menu-btn w-100 hover-lift">
                    <span style="font-size: 1.3rem;">🛣️</span> Roads Authority Site Diary
                </a>
            </div>
            <div class="col-12 col-md-8 col-lg-6 mb-3" data-aos="fade-up" data-aos-delay="200">
                <a href="building-site-dairy" class="btn btn-success btn-lg menu-btn w-100 hover-lift">
                    <span style="font-size: 1.3rem;">🏗️</span> Building Site Diary
                </a>
            </div>
            <div class="col-12 col-md-8 col-lg-6 mb-3" data-aos="fade-left" data-aos-delay="300">
                <a href="irrigation-site-dairy" class="btn btn-secondary btn-lg menu-btn w-100 hover-lift">
                    <span style="font-size: 1.3rem;">💧</span> Irrigation Site Diary
                </a>
            </div>
        </div>
    </div>

    <?php include './footer.php'; ?>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/enhanced.js"></script>
    <script>
        document.querySelectorAll("ul.navbar-nav .nav-link")[2].classList.add("active");
        
        // Initialize AOS
        if (typeof AOS !== 'undefined') {
            AOS.init();
        }
    </script>