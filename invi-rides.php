<?php
date_default_timezone_set('Africa/Blantyre');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invi Rides - Sustainable Mobility | Injessview</title>
    <link rel="canonical" href="https://injessview.com/invi-rides">
    <meta property="og:url" content="https://injessview.com/invi-rides" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://injessview.com/img/engineer.png" />
    <meta property="og:title" content="Invi Rides - Sustainable Mobility | Injessview" />
    <meta property="og:description" content="Invi Rides powers measurable carbon reduction and connects with INVI's Site InviSion and sustainability ecosystem." />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/enhanced.css">
    <link rel="icon" type="image/png" href="./img/engineer.png" />
    <script src="./js/sweetalert.min.js"></script>
    <meta name="description" content="Invi Rides — INVI's carbon-neutral carpooling and smart mobility platform, reducing Blantyre's urban emissions one ride at a time.">
    <style>
        .plasma-hero {
            background: linear-gradient(135deg, #064e3b 0%, #065f46 50%, #047857 100%);
            border-radius: 1.5rem;
            position: relative;
            overflow: hidden;
        }
        .plasma-hero::before {
            content: '';
            position: absolute;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(ellipse at 30% 40%, rgba(16,185,129,0.3) 0%, transparent 60%),
                        radial-gradient(ellipse at 75% 65%, rgba(5,150,105,0.2) 0%, transparent 55%);
            animation: plasmaShift 8s ease-in-out infinite alternate;
        }
        @keyframes plasmaShift {
            0%   { transform: translate(0,0) rotate(0deg); }
            100% { transform: translate(3%,3%) rotate(3deg); }
        }
        .plasma-hero .hero-content { position: relative; z-index: 2; }
        .stat-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            border-top: 4px solid #10b981;
        }
        .stat-card .stat-num {
            font-size: 2.2rem;
            font-weight: 900;
            color: #10b981;
            line-height: 1;
        }
        .how-step {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.06);
            border-left: 5px solid #10b981;
            margin-bottom: 1rem;
        }
        .how-step .step-num {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            width: 36px; height: 36px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1rem;
            margin-right: 0.75rem;
            flex-shrink: 0;
        }
    </style>
</head>

<body class="bg-light">
    <?php include './nav.php'; ?>

    <div class="container my-5">

        <!-- Hero -->
        <div class="plasma-hero p-5 mb-5 text-white text-center" data-aos="fade-down">
            <div class="hero-content py-3">
                <span class="badge rounded-pill px-3 py-2 mb-3"
                      style="background:rgba(16,185,129,0.3); font-size:0.8rem; letter-spacing:1px;">
                    SUSTAINABLE MOBILITY · BLANTYRE, MALAWI
                </span>
                <h1 class="display-3 fw-bold mb-3">🚗 Invi <span class="highlight-invi">Rides</span></h1>
                <p class="lead mb-4" style="max-width:620px; margin:0 auto; color:rgba(255,255,255,0.9);">
                    Carbon-neutral carpooling for Malawi. Every shared ride reduces emissions,
                    generates verified carbon offsets, and keeps Blantyre moving efficiently.
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                    <a href="https://invirides.vercel.app/" target="_blank"
                       class="btn btn-light btn-lg rounded-pill px-5 fw-bold">
                        🚗 Launch Invi Rides
                    </a>
                    <a href="/carbon-abatement
                       class="btn btn-outline-light btn-lg rounded-pill px-5">
                        🌱 Carbon Abatement
                    </a>
                </div>
            </div>
        </div>

        <!-- Impact Stats -->
        <div class="row mb-5 text-center" data-aos="fade-up">
            <div class="col-12 mb-4">
                <h2 class="fw-bold">Why <span class="highlight-invi">Invi Rides</span> Matters</h2>
                <p class="text-muted">Every coordinated ride is a measurable step toward a cleaner Malawi.</p>
            </div>
            <div class="col-6 col-md-3 mb-3" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <div class="stat-num">↓CO₂</div>
                    <p class="mt-2 mb-0 text-muted small">Per shared ride vs. single-occupancy</p>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <div class="stat-num">📊</div>
                    <p class="mt-2 mb-0 text-muted small">Real-time emissions tracking dashboard</p>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <div class="stat-num">🌍</div>
                    <p class="mt-2 mb-0 text-muted small">Carbon tracks fed to the INVI marketplace</p>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-3" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-card">
                    <div class="stat-num">📱</div>
                    <p class="mt-2 mb-0 text-muted small">Mobile-first, works on any device</p>
                </div>
            </div>
        </div>

        <!-- What is Invi Rides -->
        <div class="row align-items-center mb-5" data-aos="fade-up">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="p-4 p-md-5 rounded-4 shadow-custom hover-lift" style="background: white; border-top: 4px solid #10b981;">
                    <h2 class="fw-bold mb-3">What is Invi Rides?</h2>
                    <p>
                        <strong>Invi Rides</strong> is INVI's smart carpooling platform — a web-based system that
                        matches commuters travelling the same routes across Blantyre, replacing multiple
                        single-occupancy trips with coordinated, efficient shared journeys.
                    </p>
                    <p>
                        Unlike a taxi service, Invi Rides is a <strong>mobility coordination layer</strong>:
                        it uses route intelligence to pair drivers with passengers heading the same way,
                        cutting fuel use, road congestion, and CO₂ emissions simultaneously.
                    </p>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2">✅ App-managed ride scheduling &amp; driver matching</li>
                        <li class="mb-2">✅ Real-time CO₂ savings per ride</li>
                        <li class="mb-2">✅ Verified carbon offset certificate generation</li>
                        <li class="mb-2">✅ Feeds directly into INVI's carbon track marketplace</li>
                        <li class="mb-2">✅ Built for Blantyre's road network and commuter patterns</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="150">
                <div class="p-4 p-md-5 rounded-4" style="background: linear-gradient(135deg, #10b981, #059669); color: white; border-radius: 1.5rem !important;">
                    <h4 class="mb-4">The Carbon−Mobility Loop</h4>
                    <p>
                        Every Invi Ride generates a data point: distance covered, passengers carried, and
                        estimated CO₂ avoided versus the equivalent number of single-occupancy trips.
                        These data points are aggregated, verified, and converted into <strong>carbon tracks</strong>
                        — sellable offset units for businesses with ESG or regulatory commitments.
                    </p>
                    <hr style="border-color:rgba(255,255,255,0.25);">
                    <p class="mb-0 fst-italic" style="color:rgba(255,255,255,0.88);">
                        "Invi Rides does not just move people — it builds the financial case
                        for sustainable infrastructure in Malawi."
                    </p>
                </div>
            </div>
        </div>

        <!-- How It Works -->
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-12 mb-4">
                <h2 class="fw-bold">How It Works</h2>
                <p class="text-muted">Simple for riders, powerful under the hood.</p>
            </div>
            <div class="col-md-6">
                <div class="how-step d-flex align-items-start">
                    <span class="step-num">1</span>
                    <div>
                        <strong>Register &amp; Set Your Route</strong><br>
                        <span class="text-muted small">Commuters sign up and enter their regular origin and destination in Blantyre.</span>
                    </div>
                </div>
                <div class="how-step d-flex align-items-start">
                    <span class="step-num">2</span>
                    <div>
                        <strong>Get Matched</strong><br>
                        <span class="text-muted small">The platform matches riders with drivers heading the same way at the same time.</span>
                    </div>
                </div>
                <div class="how-step d-flex align-items-start">
                    <span class="step-num">3</span>
                    <div>
                        <strong>Ride &amp; Track</strong><br>
                        <span class="text-muted small">The ride is completed and CO₂ savings vs. solo trips are automatically calculated.</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="how-step d-flex align-items-start">
                    <span class="step-num">4</span>
                    <div>
                        <strong>Generate Carbon Data</strong><br>
                        <span class="text-muted small">Verified emissions data is logged and aggregated across all rides into carbon tracks.</span>
                    </div>
                </div>
                <div class="how-step d-flex align-items-start">
                    <span class="step-num">5</span>
                    <div>
                        <strong>Offset &amp; Sell</strong><br>
                        <span class="text-muted small">Carbon tracks are offered on the INVI marketplace for businesses seeking verified offsets.</span>
                    </div>
                </div>
                <div class="how-step d-flex align-items-start">
                    <span class="step-num">6</span>
                    <div>
                        <strong>Revenue Reinvested</strong><br>
                        <span class="text-muted small">Carbon offset revenue funds platform growth, driver incentives, and green infrastructure.</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- For Investors / Grant Committees -->
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-12">
                <div class="p-4 p-md-5 rounded-4 shadow-custom" style="background: white; border-top: 4px solid #667eea;">
                    <h2 class="fw-bold mb-4">For Investors &amp; Grant Committees</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                Invi Rides is positioned at the intersection of three high-growth areas:
                                <strong>urban mobility</strong>, <strong>climate finance</strong>, and
                                <strong>digital infrastructure</strong> — all in a market (sub-Saharan Africa)
                                where these solutions are acutely needed and underserved.
                            </p>
                            <p>
                                As a Malawian-built platform, Invi Rides qualifies for green mobility grants,
                                African Development Bank sustainability funding, and international carbon
                                credit frameworks — making it both commercially viable and grant-attractive.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <strong class="text-success">🌱 Climate Finance:</strong><br>
                                    <span class="text-muted small">Eligible for Green Climate Fund and African carbon market frameworks.</span>
                                </li>
                                <li class="mb-3">
                                    <strong style="color:#667eea;">🤖 AI Integration:</strong><br>
                                    <span class="text-muted small">Route optimisation and emissions calculation powered by machine learning.</span>
                                </li>
                                <li class="mb-3">
                                    <strong class="text-warning">📈 Scalable Model:</strong><br>
                                    <span class="text-muted small">Built to expand beyond Blantyre to Lilongwe, Mzuzu, and regional cities.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-12">
                <div class="plasma-hero p-5 text-white text-center">
                    <div class="hero-content py-2">
                        <h2 class="fw-bold mb-3">Ready to Ride or Partner with <span class="highlight-invi">INVI</span>?</h2>
                        <p class="lead mb-4" style="color:rgba(255,255,255,0.88); max-width:560px; margin:0 auto 1.5rem;">
                            Whether you are a commuter, a business buying carbon offsets, or an investor in clean mobility —
                            Invi Rides is open.
                        </p>
                        <a href="https://invirides.vercel.app/" target="_blank"
                           class="btn btn-light btn-lg rounded-pill px-5 me-2 fw-bold">
                            🚗 Open Invi Rides
                        </a>
                        <a href="/contact
                           class="btn btn-outline-light btn-lg rounded-pill px-5">
                            📬 Partner With Us
                        </a>
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
        AOS.init({ duration: 800, easing: 'ease-in-out', once: true });
    </script>
</body>
</html>
