<?php
session_start();
include './php/core.php';

if(!loggedin()) {
    header('Location: admin-login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Analytics - Injessview Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="./img/engineer.png" />
    <style>
        :root {
            --primary: #667eea;
            --secondary: #764ba2;
            --dark: #2d3748;
            --light: #f7fafc;
        }
        body {
            background-color: var(--light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 260px;
            background: linear-gradient(180deg, var(--primary) 0%, var(--secondary) 100%);
            padding: 20px;
            color: white;
            z-index: 1000;
            overflow-y: auto;
        }
        .sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid rgba(255,255,255,0.2);
        }
        .sidebar .logo img {
            max-width: 60px;
            margin-bottom: 10px;
        }
        .sidebar .logo h4 {
            font-weight: 700;
            margin: 0;
        }
        .sidebar-menu {
            list-style: none;
            padding: 0;
        }
        .sidebar-menu li {
            margin-bottom: 5px;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s;
        }
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background: rgba(255,255,255,0.2);
            transform: translateX(5px);
        }
        .main-content {
            margin-left: 260px;
            padding: 30px;
        }
        .top-bar {
            background: white;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .top-bar h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: var(--dark);
        }
        .analytics-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .chart-placeholder {
            background: #f8f9fa;
            padding: 100px;
            text-align: center;
            border-radius: 10px;
            border: 2px dashed #dee2e6;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="./img/INVI_LOGO.png" alt="INVI Logo" onerror="this.style.display='none'">
            <h4>INVI Admin</h4>
        </div>
        <ul class="sidebar-menu">
            <li><a href="admin-dashboard">📊 Dashboard</a></li>
            <li><a href="admin-pages">📄 Manage Pages</a></li>
            <li><a href="admin-media">🖼️ Media Library</a></li>
            <li><a href="admin-settings">⚙️ Settings</a></li>
            <li><a href="admin-users">👥 Users</a></li>
            <li><a href="admin-analytics" class="active">📈 Analytics</a></li>
            <li><a href="home" target="_blank">🌐 View Website</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <h1>Analytics</h1>
            <a href="admin-dashboard" class="btn btn-sm btn-outline-secondary">← Back to Dashboard</a>
        </div>

        <div class="analytics-box">
            <h3 class="mb-4">Website Analytics</h3>
            <div class="chart-placeholder">
                <h4>📊 Analytics Dashboard</h4>
                <p class="text-muted">Connect Google Analytics or integrate a custom analytics solution</p>
                <p class="text-muted mt-3">You can add tracking scripts in the footer.php file</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="analytics-box">
                    <h5 class="mb-3">📈 Page Views</h5>
                    <div class="chart-placeholder" style="padding: 50px;">
                        <p class="text-muted">Page view statistics will appear here</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="analytics-box">
                    <h5 class="mb-3">👥 Visitor Demographics</h5>
                    <div class="chart-placeholder" style="padding: 50px;">
                        <p class="text-muted">Visitor data will appear here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
