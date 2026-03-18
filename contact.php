<?php
//set time zone for your country
date_default_timezone_set('Africa/Blantyre');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Injessview</title>
    <link rel="canonical" href="https://injessview.com/contact">
    <meta property="og:url" content="https://injessview.com/contact" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://injessview.com/img/engineer.png" />
    <meta property="og:title" content="Contact Us - Injessview" />
    <meta property="og:description" content="Contact INVI for construction intelligence, SiteSync onboarding, and sustainability collaboration in Malawi." />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/enhanced.css">
    <link rel="icon" type="image/png" href="./img/engineer.png" />
    <script src="./js/sweetalert.min.js"></script>
    
    <meta name="description" content="Get in touch with INVI (Injessview) for construction, SiteSync technology, and sustainable mobility solutions.">
</head>

<body class="bg-light">
    <?php include './nav.php'; ?>

    <div class="container my-5">
        <!-- Hero Section -->
        <div class="text-center mb-5" data-aos="fade-down">
            <h1 class="display-3 mb-3">Get In <span class="highlight-invi">Touch</span></h1>
            <p class="lead">We'd love to hear from you. Let's discuss how we can help your business grow.</p>
        </div>

        <div class="row">
            <!-- Contact Form -->
            <div class="col-md-7 mb-4" data-aos="fade-right">
                <div class="p-4 rounded shadow-custom hover-lift" style="background: white;">
                    <h3 class="mb-4">Send Us a Message</h3>
                    <form id="contactForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name *</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone">
                        </div>
                        <div class="mb-3">
                            <label for="service" class="form-label">Service Interested In</label>
                            <select class="form-control" id="service">
                                <option value="">Select a service...</option>
                                <option value="construction">Construction & Project Management</option>
                                <option value="technology">IT & Technology Solutions</option>
                                <option value="media">Media & Digital Services</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control" id="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">📧 Send Message</button>
                    </form>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-md-5 mb-4" data-aos="fade-left">
                <div class="p-4 rounded shadow-custom hover-lift mb-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                    <h3 class="mb-4">Contact Information</h3>
                    
                    <div class="mb-4">
                        <h5>📍 Location</h5>
                        <p>Blantyre, Malawi</p>
                    </div>
                    
                    <div class="mb-4">
                        <h5>📧 Email</h5>
                        <p><a href="mailto:injessview@gmail.com" style="color: white; text-decoration: none;">injessview@gmail.com</a></p>
                    </div>
                    
                    <div class="mb-4">
                        <h5>📱 Phone</h5>
                        <p>+265 8857 15202</p>
                    </div>
                    
                    <div class="mb-4">
                        <h5>🕐 Business Hours</h5>
                        <p>Monday - Friday: 8:00 AM - 5:00 PM<br>
                        Saturday: 9:00 AM - 1:00 PM<br>
                        Sunday: Closed</p>
                    </div>
                </div>

                <div class="p-4 rounded shadow-custom hover-lift" style="background: white;">
                    <h5 class="mb-3">Quick Links</h5>
                    <div class="d-grid gap-2">
                        <a href="construction-works" class="btn btn-outline-primary">View Tenders</a>
                        <a href="site-sync" class="btn btn-outline-primary">Explore SiteSync</a>
                        <a href="site-diary" class="btn btn-outline-primary">Site Diary</a>
                        <a href="https://injessview.com/ziwilatu/subscribers.php" target="_blank" class="btn btn-outline-primary">Ziwilatu Project</a>
                    </div>
                </div>
            </div>
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

        // Contact form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show success message
            swal("Message Sent!", "Thank you for contacting us. We'll get back to you soon!", "success");
            
            // Reset form
            this.reset();
        });
    </script>
</body>
</html>
