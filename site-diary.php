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
    <meta name="description" content="Access Injessview's online site diary system for roads authority, building, and irrigation projects with structured daily reporting and project tracking.">
    <link rel="canonical" href="https://injessview.com/site-diary">
    <meta property="og:url" content="https://injessview.com/site-diary" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://injessview.com/img/engineer.png" />
    <meta property="og:title" content="Site Diary - Injessview" />
    <meta property="og:description" content="Choose a project diary and track daily work, personnel, materials, incidents, and site progress online." />
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

        <div class="alert alert-light shadow-custom text-center" data-aos="fade-up">
            These diaries are the field intelligence layer for <a href="site-sync" class="alert-link">SiteSync</a>.
            Daily entries from building, roads, and irrigation contribute to stronger project reporting and decision-making.
        </div>
        
        <div class="row home-menu d-flex flex-column align-items-center justify-content-center" style="min-height:65vh;">
            <div class="col-12 col-md-8 col-lg-6 mb-3" data-aos="fade-right" data-aos-delay="100">
                <a href="roads-authority-site-diary" class="btn btn-primary btn-lg menu-btn w-100 hover-lift">
                    <span style="font-size: 1.3rem;">🛣️</span> Roads Authority Site Diary
                </a>
            </div>
            <div class="col-12 col-md-8 col-lg-6 mb-3" data-aos="fade-up" data-aos-delay="200">
                <a href="building-site-diary" class="btn btn-success btn-lg menu-btn w-100 hover-lift">
                    <span style="font-size: 1.3rem;">🏗️</span> Building Site Diary
                </a>
            </div>
            <div class="col-12 col-md-8 col-lg-6 mb-3" data-aos="fade-left" data-aos-delay="300">
                <a href="irrigation-site-diary" class="btn btn-secondary btn-lg menu-btn w-100 hover-lift">
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
        // Initialize AOS
        if (typeof AOS !== 'undefined') {
            AOS.init();
        }
    </script>