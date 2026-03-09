<?php
//set time zone for your country
date_default_timezone_set('Africa/Blantyre');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Injessview</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/enhanced.css">
    <link rel="icon" type="image/png" href="./img/engineer.png" />
    <script src="./js/sweetalert.min.js"></script>
    
    <meta name="description" content="Learn about INVI (Injessview) - Your partner in construction, technology, and media solutions.">
</head>

<body class="bg-light">
    <?php include './nav.php'; ?>

    <div class="container my-5">
        <!-- Hero Section -->
        <div class="text-center mb-5" data-aos="fade-down">
            <h1 class="display-3 mb-3">About <span class="highlight-invi">INVI</span></h1>
            <p class="lead">Transforming businesses through innovation and excellence</p>
        </div>

        <!-- Company Overview -->
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-md-12">
                <div class="p-5 rounded shadow-custom hover-lift" style="background: white;">
                    <h2 class="mb-4">Who We Are</h2>
                    <p class="lead">
                        <strong>INVI (Injessview)</strong> is a dynamic, multi-disciplinary company operating at the intersection 
                        of construction, technology, and media. We specialize in delivering intelligent, integrated solutions 
                        that simplify complex challenges and drive business success.
                    </p>
                    <p>
                        Founded with a vision to revolutionize how businesses operate in Malawi and beyond, we combine 
                        deep industry expertise with cutting-edge technology to create value for our clients.
                    </p>
                </div>
            </div>
        </div>

        <!-- Our Services -->
        <div class="row mb-5">
            <div class="col-md-4 mb-4" data-aos="fade-right">
                <div class="p-4 rounded shadow-custom hover-lift h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🏗️</div>
                    <h3>Construction</h3>
                    <p>Expert project management, site supervision, and construction consulting services tailored to your needs.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up">
                <div class="p-4 rounded shadow-custom hover-lift h-100" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">💻</div>
                    <h3>Technology</h3>
                    <p>Innovative IT solutions, custom software development, and digital transformation services.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-left">
                <div class="p-4 rounded shadow-custom hover-lift h-100" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">📱</div>
                    <h3>Media</h3>
                    <p>Professional media production, digital marketing, and content creation that amplifies your message.</p>
                </div>
            </div>
        </div>

        <!-- Our Values -->
        <div class="row mb-5" data-aos="zoom-in">
            <div class="col-md-12">
                <div class="p-5 rounded shadow-custom" style="background: #f8f9fa;">
                    <h2 class="text-center mb-5">Our Core Values</h2>
                    <div class="row">
                        <div class="col-md-3 text-center mb-4">
                            <div style="font-size: 3rem; color: #667eea;">🎯</div>
                            <h5 class="mt-3">Excellence</h5>
                            <p>Commitment to the highest quality in everything we do</p>
                        </div>
                        <div class="col-md-3 text-center mb-4">
                            <div style="font-size: 3rem; color: #667eea;">💡</div>
                            <h5 class="mt-3">Innovation</h5>
                            <p>Embracing new ideas and technologies</p>
                        </div>
                        <div class="col-md-3 text-center mb-4">
                            <div style="font-size: 3rem; color: #667eea;">🤝</div>
                            <h5 class="mt-3">Integrity</h5>
                            <p>Honest, transparent, and ethical practices</p>
                        </div>
                        <div class="col-md-3 text-center mb-4">
                            <div style="font-size: 3rem; color: #667eea;">🌟</div>
                            <h5 class="mt-3">Client Focus</h5>
                            <p>Your success is our priority</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Choose Us -->
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-md-12">
                <div class="p-5 rounded shadow-custom hover-lift" style="background: white;">
                    <h2 class="mb-4 text-center">Why Choose <span class="highlight-invi">INVI</span>?</h2>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h5>✅ Proven Track Record</h5>
                            <p>Years of successful project delivery across multiple industries</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5>✅ Expert Team</h5>
                            <p>Skilled professionals with deep industry knowledge</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5>✅ Integrated Solutions</h5>
                            <p>Comprehensive services under one roof</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h5>✅ Local Understanding</h5>
                            <p>Deep knowledge of the Malawian market and context</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="text-center my-5" data-aos="zoom-in">
            <h3 class="mb-4">Ready to Transform Your Business?</h3>
            <a href="construction-works" class="btn btn-primary btn-lg me-2 mb-2">View Projects</a>
            <a href="site-diary" class="btn btn-outline-primary btn-lg mb-2">Explore Solutions</a>
        </div>
    </div>

    <?php include './footer.php'; ?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/enhanced.js"></script>
    <script>
        if (typeof AOS !== 'undefined') {
            AOS.init();
        }
    </script>
</body>
</html>
