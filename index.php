<?php
//set time zone for your country
date_default_timezone_set('Africa/Blantyre');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Injessview - Construction, Technology & Media Solutions</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/enhanced.css">
    <link rel="icon" type="image/png" href="./img/engineer.png" />
    <script src="./js/sweetalert.min.js"></script>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="INVI (Injessview) provides innovative solutions in construction, technology, and media. Expert project management, IT systems, and digital services.">
    <meta name="keywords" content="construction management, IT solutions, media services, Malawi, INVI, site diary, tenders">
    <meta name="author" content="Injessview">
    <meta name="robots" content="index, follow">

    <meta property="og:url" content="https://injessview.com/index.php" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://injessview.com/img/online-survey.png" />
    <meta property="og:title" content="INJESS VIEW" />
    <meta property="og:description" content="Construction works, Site Diary" />
    
    <style>
        /* Styles for elegant high contrast and sophisticated look for INVI */
        .highlight-invi {
            font-weight: 900;
            color: #343a40; /* Deep Charcoal for elegance (Standard Color) */
            letter-spacing: 1px; /* Increased letter spacing for sophistication */
        }
        
        /* FIX: Force all text in the h2, including the word "Services," to be white within this section */
        .services-section h2 {
             color: #fff !important; 
        }

        .welcome-section h1 {
            font-size: 3.5rem; 
            font-weight: 900 !important; 
            color: #212529; 
        }
        .welcome-section .lead {
            font-size: 1.3rem; 
            font-weight: 500; 
        }
        /* Minimalistic Curvy Look: subtle border and increased border-radius */
        .welcome-section, .vision-mission-section, .invest-section {
            box-shadow: none !important;
            border: 1px solid #dee2e6; 
            border-radius: 1.5rem !important; /* Made curvey (24px radius) */
        }
        .vision-mission-section h2, .invest-section h2 {
            font-weight: 700 !important;
        }
        .vision-mission-section p {
             font-weight: 500;
        }
    </style>
</head>

<body class="bg-light">

    <div id="preloader" class="d-flex justify-content-center align-items-center flex-column" 
         style="height: 100vh; position: fixed; top: 0; left: 0; width: 100%; z-index: 1050; background: #f8f9fa;">
        <h1 class="display-4 text-center mb-4">Welcome to <span class="highlight-invi">INVI</span>: Solutions for Your Success</h1>
        <p class="lead text-center">At <span class="highlight-invi">INVI</span>, we're a team of construction experts, tech innovators, and media creators dedicated to making your business simpler and more efficient. We provide intelligent solutions for construction clients, robust computer systems for users, and powerful media services for those who need to get their message out. Our business is to make your business easier.</p>
        <div class="progress w-50 my-4" style="height: 25px;">
            <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;"></div>
        </div>
        <p class="text-muted">Loading...</p>
    </div>

    <div id="main-content" style="display: none;">

        <?php include './nav.php'; ?>

        <div class="container my-5">
            <div class="p-4 my-5 rounded text-center welcome-section" data-aos="fade-up">
                <div class="transparent-container">
                    <h1 class="animate-fadeInUp">Welcome to <span class="highlight-invi">INVI</span>: Pioneering AI-First Infrastructure</h1>
                    <p class="lead">At <span class="highlight-invi">INVI</span>, we are pioneering the future of infrastructure. By merging <strong>Civil Engineering expertise with AI-driven technology</strong>, we simplify complex construction, reduce urban carbon footprints through smart mobility, and empower businesses with robust digital systems. Our mission is to build a more efficient, sustainable Malawi.</p>
                </div>
            </div>

            <div class="row my-5 vision-mission-section p-4 rounded" data-aos="fade-right">
                <div class="transparent-container">
                    <div class="col-md-12 mb-4 mb-md-0">
                        <h2>We <span class="highlight-invi">INVI</span>_SION</h2>
                        <p>
                            To be Malawi's leading AI-first infrastructure and mobility hub — transforming how communities build, move, and sustain themselves through intelligent systems and clean technology.
                        </p>
                    </div>
                    <div class="col-md-12">
                        <h2><span class="highlight-invi">INVI</span> Mission</h2>
                        <p>
                            To deliver seamless, technology-driven solutions that simplify complex infrastructure projects, reduce carbon footprints through smart mobility, and empower businesses with AI-powered digital tools.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row home-menu d-flex flex-column align-items-center justify-content-center services-section p-4 my-5" 
                 style="
                    /* Image moved up by -150px */
                    margin-top: -150px;
                    background-image: url('img/Our_services.png'); 
                    background-size: cover; 
                    background-position: center; 
                    background-repeat: no-repeat;
                    min-height: 400px; 
                    border-radius: 1.5rem; /* Made Curvey */
                 ">
                
                <div style="background-color: rgba(0, 0, 0, 0.4); border-radius: 1.5rem; padding: 1.5rem; width: 100%; max-width: 600px; text-align: center;">

                    <div class="col-12 text-center mb-4 text-white">
                        <h2 class="display-3 font-weight-bolder"><span class="highlight-invi">INVI</span> Services</h2>
                    </div>
                    
                    <div class="mb-3">
                        <a href="site-sync.php" class="btn btn-primary btn-lg menu-btn w-100 py-3">Construction & Project Management</a>
                    </div>
                    <div class="mb-3">
                        <a href="it-solutions.php" class="btn btn-info btn-lg menu-btn w-100 py-3">IT & Computer Systems</a>
                    </div>
                    <div class="mb-3">
                        <a href="media.php" class="btn btn-secondary btn-lg menu-btn w-100 py-3">Media & Digital Solutions</a>
                    </div>
                    <div class="mb-3">
                        <a href="carbon-abatement.php" class="btn btn-outline-success btn-lg menu-btn w-100 py-3">🌱 Carbon Abatement & Sustainability</a>
                    </div>
                </div>
            </div>
            <div class="my-5 p-4 rounded invest-section text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="transparent-container">
                    <h2 class="display-4 mb-4"><span class="highlight-invi">INVI</span> Projects !!!</h2>
                    
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 col-lg-6 mb-3">
                            <a href="http://injess.pythonanywhere.com" class="btn btn-success btn-lg menu-btn w-100 py-3 rounded-pill" target="_blank">🚀 Site Sync</a>
                        </div>
                        
                        <div class="col-12 col-md-8 col-lg-6 mb-3">
                            <a href="https://injessview.com/ziwilatu/subscribers.php" class="btn btn-primary btn-lg menu-btn w-100 py-3 rounded-pill" target="_blank">🌟 Ziwilatu: Construction Platform</a>
                        </div>
                        
                        <div class="col-12 col-md-8 col-lg-6 mb-3">
                            <a href="/site-diary.php" class="btn btn-info btn-lg menu-btn w-100 py-3 rounded-pill">📔 Online Site Diary</a>
                        </div>
                        
                        <div class="col-12 col-md-8 col-lg-6 mb-3">
                            <a href="https://invirides.vercel.app/" class="btn btn-dark btn-lg menu-btn w-100 py-3 rounded-pill" target="_blank">🚗 Invi Rides: Sustainable Mobility</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        <?php include './footer.php'; ?>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/enhanced.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const preloader = document.getElementById('preloader');
            const mainContent = document.getElementById('main-content');
            const progressBar = document.getElementById('progress-bar');

            let width = 0;
            const interval = setInterval(function() {
                if (width >= 100) {
                    clearInterval(interval);
                    // Hide the preloader with a smooth fade-out effect
                    preloader.style.opacity = '0';
                    setTimeout(() => {
                        preloader.style.display = 'none';
                        preloader.style.visibility = 'hidden';
                        preloader.style.pointerEvents = 'none'; 
                        
                        // Show the main content
                        mainContent.style.display = 'block';
                    }, 500); // Wait for the fade-out transition to finish
                } else {
                    // Simulate loading progress
                    width += 5;
                    progressBar.style.width = width + '%';
                }
            }, 100); // Update every 100 milliseconds
        });
    </script>
</body>
</html>