<style>
    .nav-ecosystem-toggle {
        transition: color 0.2s ease, opacity 0.2s ease;
    }

    .nav-ecosystem-toggle.show,
    .nav-ecosystem-toggle.active {
        color: #ffffff;
    }

    .nav-ecosystem-menu {
        min-width: 260px;
        margin-top: 0.75rem;
        padding: 0.5rem;
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 1rem;
        background: rgba(18, 24, 48, 0.96);
        box-shadow: 0 18px 38px rgba(13, 18, 38, 0.28);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
    }

    .nav-ecosystem-menu .dropdown-item {
        border-radius: 0.85rem;
        padding: 0.75rem 0.95rem;
        color: #eef2ff;
        font-weight: 600;
        transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
    }

    .nav-ecosystem-menu .dropdown-item:hover,
    .nav-ecosystem-menu .dropdown-item:focus,
    .nav-ecosystem-menu .dropdown-item.active {
        color: #ffffff;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9));
        transform: translateX(2px);
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="home">
            <div style="background: white; border-radius: 50%; padding: 5px; display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; margin-right: 10px;">
                <img src="/img/INVI_LOGO.png" alt="INVI Logo" class="logo" style="width: 35px; height: 35px; object-fit: contain;">
            </div>
            <strong>INJESSVIEW</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home" data-route="home">🏠 Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about" data-route="about">ℹ️ About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="site-sync" data-route="site-sync">🚀 SiteSync</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="invi-rides" data-route="invi-rides">🚗 Invi Rides</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="carbon-abatement" data-route="carbon-abatement">🌱 Carbon Abatement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact" data-route="contact">📧 Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Spacer for fixed navbar -->
<div style="height: 70px;"></div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const currentPath = (window.location.pathname.replace(/\/+$/, "").split("/").pop() || "home").toLowerCase();
        const routeAliases = {
            home: ["", "home", "index.php"],
            about: ["about", "about.php"],
            "construction-works": ["construction-works", "construction-works.php", "construction-jobs-and-tenders"],
            "site-sync": ["site-sync", "site-sync.php"],
            "site-diary": [
                "site-diary",
                "site-diary.php",
                "building-site-diary",
                "building-site-dairy",
                "building.php",
                "irrigation-site-diary",
                "irrigation-site-dairy",
                "irrigation.php",
                "roads-authority-site-diary",
                "roads-authority-site-dairy",
                "roads-authority.php"
            ],
            contact: ["contact", "contact.php"],
            "it-solutions": ["it-solutions", "it-solutions.php"],
            "invi-rides": ["invi-rides", "invi-rides.php"],
            "carbon-abatement": ["carbon-abatement", "carbon-abatement.php"]
        };

        const routeGroups = {
            ecosystem: [
                "construction-works",
                "site-sync",
                "site-diary",
                "it-solutions",
                "invi-rides",
                "carbon-abatement"
            ]
        };

        document.querySelectorAll("ul.navbar-nav [data-route]").forEach(function(link) {
            link.classList.remove("active");

            const route = link.getAttribute("data-route");
            const aliases = routeAliases[route] || [route];

            if (aliases.includes(currentPath)) {
                link.classList.add("active");
            }
        });

        document.querySelectorAll("ul.navbar-nav [data-route-group]").forEach(function(link) {
            link.classList.remove("active");

            const group = link.getAttribute("data-route-group");
            const groupRoutes = routeGroups[group] || [];
            const isActive = groupRoutes.some(function(route) {
                const aliases = routeAliases[route] || [route];
                return aliases.includes(currentPath);
            });

            if (isActive) {
                link.classList.add("active");
            }
        });
    });
</script>