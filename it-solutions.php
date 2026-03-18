<?php
date_default_timezone_set('Africa/Blantyre');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT & Technology Products - Injessview</title>
    <link rel="canonical" href="https://injessview.com/it-solutions">
    <meta property="og:url" content="https://injessview.com/it-solutions" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://injessview.com/img/engineer.png" />
    <meta property="og:title" content="IT & Technology Products - Injessview" />
    <meta property="og:description" content="Discover INVI technology products: SiteSync, Invi Rides, and Ziwilatu — one connected infrastructure ecosystem." />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/enhanced.css">
    <link rel="icon" type="image/png" href="./img/engineer.png" />
    <script src="./js/sweetalert.min.js"></script>
    <meta name="description" content="INVI Technology Products — SiteSync, Invi Rides, and Ziwilatu. Connected tools built from construction operations in Malawi.">
    <style>
        /* Glassmorphism card style */
        .glass-card {
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 1.5rem;
        }
        /* Plasma hero background */
        .plasma-hero {
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            border-radius: 1.5rem;
            position: relative;
            overflow: hidden;
        }
        .plasma-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(ellipse at 30% 40%, rgba(102,126,234,0.25) 0%, transparent 60%),
                        radial-gradient(ellipse at 70% 60%, rgba(16,185,129,0.2) 0%, transparent 60%);
            animation: plasmaShift 8s ease-in-out infinite alternate;
        }
        @keyframes plasmaShift {
            0%   { transform: translate(0,0) rotate(0deg); }
            100% { transform: translate(3%, 3%) rotate(3deg); }
        }
        .plasma-hero .hero-content {
            position: relative;
            z-index: 2;
        }
        /* Product pill badge */
        .product-badge {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 0.75rem;
        }
        /* Product card border accent */
        .product-card-sitesync  { border-top: 4px solid #667eea; }
        .product-card-invirides { border-top: 4px solid #10b981; }
        .product-card-ziwilatu  { border-top: 4px solid #f59e0b; }
        /* Stat pill */
        .stat-pill {
            background: rgba(102,126,234,0.1);
            border: 1px solid rgba(102,126,234,0.25);
            border-radius: 50px;
            padding: 6px 18px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            margin: 4px;
        }
    </style>
</head>

<body class="bg-light">
    <?php include './nav.php'; ?>

    <div class="container my-5">

        <!-- Plasma Hero -->
        <div class="plasma-hero p-5 mb-5 text-white text-center" data-aos="fade-down">
            <div class="hero-content py-3">
                <p class="product-badge" style="background: rgba(102,126,234,0.35); color: #a5b4fc;">
                    AI-Driven · Built for the Global South
                </p>
                <h1 class="display-3 fw-bold mb-3">
                    <span class="highlight-invi">INVI</span> Technology
                </h1>
                <p class="lead mb-4" style="max-width: 640px; margin: 0 auto; color: rgba(255,255,255,0.85);">
                    Three platforms. One mission — to make infrastructure, mobility, and construction
                    smarter, greener, and more accessible across Malawi and the Global South.
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-2 mt-4">
                    <span class="stat-pill" style="color:#a5b4fc;">🚀 SiteSync — Construction AI</span>
                    <span class="stat-pill" style="color:#6ee7b7;">🚗 Invi Rides — Clean Mobility</span>
                    <span class="stat-pill" style="color:#fcd34d;">🌟 Ziwilatu — Construction Network</span>
                </div>
            </div>
        </div>

        <!-- ───── PRODUCT 1: SiteSync ───── -->
        <div class="row align-items-center mb-5" data-aos="fade-up">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="p-4 p-md-5 rounded-4 shadow-custom hover-lift product-card-sitesync" style="background: white;">
                    <span class="product-badge" style="background: rgba(102,126,234,0.12); color: #667eea;">
                        Construction Tech
                    </span>
                    <h2 class="fw-bold mb-2">🚀 SiteSync</h2>
                    <p class="text-muted mb-3">AI-powered construction & project management platform</p>
                    <p>
                        SiteSync brings your entire project lifecycle into one intelligent dashboard —
                        from resource tracking and labour scheduling to digital site diaries and
                        client-ready PDF reports. Born out of our construction works pipeline and
                        strengthened by Ziwilatu field feedback, it is designed to work in low-connectivity environments
                        across Malawi.
                    </p>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li class="mb-2">✅ Real-time milestone &amp; progress tracking</li>
                        <li class="mb-2">✅ Labour, equipment &amp; materials management</li>
                        <li class="mb-2">✅ Digital site diary with photo evidence</li>
                        <li class="mb-2">✅ Exportable PDF reports for funders &amp; regulators</li>
                        <li class="mb-2">✅ Works on mobile &amp; low-bandwidth connections</li>
                    </ul>
                    <a href="https://injess.pythonanywhere.com/" target="_blank"
                       class="btn btn-lg rounded-pill px-4"
                       style="background: linear-gradient(135deg,#667eea,#764ba2); color: white; border: none;">
                        🚀 Open SiteSync
                    </a>
                    <a href="site-sync" class="btn btn-outline-secondary btn-lg rounded-pill px-4 ms-2">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="150">
                <div class="glass-card p-4 p-md-5" style="background: linear-gradient(135deg,#667eea,#764ba2); color: white;">
                    <h4 class="mb-4">Why SiteSync for Malawi?</h4>
                    <p>
                        Construction projects in Malawi face unique challenges: dispersed teams, paper-heavy
                        reporting, and difficulty accessing funding due to poor documentation.
                        SiteSync solves all three — keeping your records audit-ready at all times.
                    </p>
                    <hr style="border-color:rgba(255,255,255,0.2);">
                    <p class="mb-0 fst-italic" style="color:rgba(255,255,255,0.8);">
                        "Every project under INVI is tracked for performance, cost, and carbon footprint —
                        from groundbreaking to handover."
                    </p>
                </div>
            </div>
        </div>

        <!-- ───── PRODUCT 2: Invi Rides ───── -->
        <div class="row align-items-center flex-lg-row-reverse mb-5" data-aos="fade-up">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="p-4 p-md-5 rounded-4 shadow-custom hover-lift product-card-invirides" style="background: white;">
                    <span class="product-badge" style="background: rgba(16,185,129,0.12); color: #10b981;">
                        Sustainable Mobility
                    </span>
                    <h2 class="fw-bold mb-2">🚗 Invi Rides</h2>
                    <p class="text-muted mb-3">Carbon-neutral carpooling &amp; smart mobility platform</p>
                    <p>
                        Invi Rides co-ordinates shared urban transport across Blantyre, replacing
                        high-emission single-occupancy trips with efficient, app-managed carpools.
                        Every ride generates measurable CO₂ abatement data — feeding directly into
                        our carbon track marketplace.
                    </p>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li class="mb-2">✅ Reduces urban carbon emissions per commuter</li>
                        <li class="mb-2">✅ Generates verified carbon offset certificates</li>
                        <li class="mb-2">✅ App-based ride scheduling &amp; driver matching</li>
                        <li class="mb-2">✅ Real-time CO₂ savings dashboard</li>
                        <li class="mb-2">✅ Links to INVI Carbon Abatement marketplace</li>
                    </ul>
                    <a href="https://invirides.vercel.app/" target="_blank"
                       class="btn btn-lg rounded-pill px-4"
                       style="background: linear-gradient(135deg,#10b981,#059669); color: white; border: none;">
                        🚗 Launch Invi Rides
                    </a>
                    <a href="invi-rides" class="btn btn-outline-success btn-lg rounded-pill px-4 ms-2">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="150">
                <div class="glass-card p-4 p-md-5 rounded-4" style="background: linear-gradient(135deg,#10b981,#059669); color: white;">
                    <h4 class="mb-4">The Mobility–Carbon Connection</h4>
                    <p>
                        Invi Rides is not just a transport app — it is the engine of our carbon
                        abatement model. Each coordinated ride reduces CO₂, which we quantify,
                        certify, and offer as carbon tracks to businesses with ESG commitments.
                    </p>
                    <hr style="border-color:rgba(255,255,255,0.2);">
                    <p class="mb-0 fst-italic" style="color:rgba(255,255,255,0.85);">
                        "Smart mobility and clean infrastructure are the same investment —
                        Invi Rides proves it every day on Blantyre's roads."
                    </p>
                </div>
            </div>
        </div>

        <!-- ───── PRODUCT 3: Ziwilatu ───── -->
        <div class="row align-items-center mb-5" data-aos="fade-up">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="p-4 p-md-5 rounded-4 shadow-custom hover-lift product-card-ziwilatu" style="background: white;">
                    <span class="product-badge" style="background: rgba(245,158,11,0.12); color: #f59e0b;">
                        Construction Network
                    </span>
                    <h2 class="fw-bold mb-2">🌟 Ziwilatu</h2>
                    <p class="text-muted mb-3">Malawi's construction subscriber &amp; networking platform</p>
                    <p>
                        Ziwilatu connects construction professionals, contractors, suppliers, and clients
                        across Malawi. It gives subscribers access to project leads, tender alerts,
                        and a growing network of verified construction industry contacts.
                    </p>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li class="mb-2">✅ Tender &amp; project opportunity alerts</li>
                        <li class="mb-2">✅ Verified industry contacts directory</li>
                        <li class="mb-2">✅ Supplier &amp; contractor networking</li>
                        <li class="mb-2">✅ Subscriber dashboard for personalised feeds</li>
                        <li class="mb-2">✅ Syncs with SiteSync project data</li>
                    </ul>
                    <a href="https://injessview.com/ziwilatu/subscribers.php" target="_blank"
                       class="btn btn-lg rounded-pill px-4"
                       style="background: linear-gradient(135deg,#f59e0b,#d97706); color: white; border: none;">
                        🌟 Open Ziwilatu
                    </a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="150">
                <div class="glass-card p-4 p-md-5 rounded-4" style="background: linear-gradient(135deg,#f59e0b,#d97706); color: white;">
                    <h4 class="mb-4">The INVI Ecosystem</h4>
                    <p>
                        SiteSync, Invi Rides, and Ziwilatu are not standalone apps — they are three
                        layers of a single, interconnected platform. Ziwilatu surfaces the opportunities,
                        SiteSync delivers them, and Invi Rides keeps the whole system moving cleanly.
                    </p>
                    <hr style="border-color:rgba(255,255,255,0.25);">
                    <p class="mb-0 fst-italic" style="color:rgba(255,255,255,0.85);">
                        "From lead to completion to carbon offset — the entire value chain is INVI."
                    </p>
                </div>
            </div>
        </div>

        <!-- Three Pillars Summary -->
        <div class="row mb-5 text-center" data-aos="fade-up">
            <div class="col-12 mb-4">
                <h2 class="fw-bold">The <span class="highlight-invi">Three Pillars</span> of INVI Technology</h2>
                <p class="text-muted">Everything we build serves one of three core mandates.</p>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 rounded-4 shadow-custom h-100" style="background: white; border-top: 4px solid #667eea;">
                    <div class="fs-1 mb-3">🏗️</div>
                    <h5 class="fw-bold">Construction &amp; Engineering</h5>
                    <p class="text-muted">Site management tools for ground-level projects — Area 44, Area 25, Waka Waka and beyond.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 rounded-4 shadow-custom h-100" style="background: white; border-top: 4px solid #10b981;">
                    <div class="fs-1 mb-3">🤖</div>
                    <h5 class="fw-bold">Innovative Technology</h5>
                    <p class="text-muted">AI-driven platforms that digitise construction, mobility, and carbon management for the Global South.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="p-4 rounded-4 shadow-custom h-100" style="background: white; border-top: 4px solid #f59e0b;">
                    <div class="fs-1 mb-3">🌱</div>
                    <h5 class="fw-bold">Sustainable Mobility</h5>
                    <p class="text-muted">Reducing urban emissions through smart carpooling and verified carbon abatement across Blantyre.</p>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-12">
                <div class="plasma-hero p-5 text-white text-center">
                    <div class="hero-content py-2">
                        <h2 class="fw-bold mb-3">Ready to work with <span class="highlight-invi">INVI</span>?</h2>
                        <p class="lead mb-4" style="color:rgba(255,255,255,0.85); max-width:560px; margin:0 auto 1.5rem;">
                            Whether you need a construction management system, a clean mobility solution,
                            or carbon offset certificates — we are ready.
                        </p>
                        <a href="contact" class="btn btn-light btn-lg rounded-pill px-5 me-2">
                            📬 Get In Touch
                        </a>
                        <a href="mailto:injessview@gmail.com" class="btn btn-outline-light btn-lg rounded-pill px-5">
                            📧 injessview@gmail.com
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
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>
</body>
</html>
