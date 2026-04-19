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
    <title>Deployment - Injessview Admin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="./img/engineer.png" />
    <script src="./js/sweetalert.min.js"></script>
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
        .deploy-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .deploy-step {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 15px;
            border-left: 4px solid var(--primary);
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
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
            <li><a href="/admin-dashboard>📊 Dashboard</a></li>
            <li><a href="/admin-pages>📄 Manage Pages</a></li>
            <li><a href="/admin-media>🖼️ Media Library</a></li>
            <li><a href="/admin-settings>⚙️ Settings</a></li>
            <li><a href="/admin-users>👥 Users</a></li>
            <li><a href="/admin-analytics>📈 Analytics</a></li>
            <li><a href="/home target="_blank">🌐 View Website</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <h1>🚀 Deploy Changes</h1>
            <a href="/admin-dashboard class="btn btn-sm btn-outline-secondary">← Back to Dashboard</a>
        </div>

        <div class="deploy-box">
            <h3 class="mb-4">Deployment Checklist</h3>
            
            <div class="deploy-step">
                <h5>1. ✅ Pre-Deployment Checklist</h5>
                <ul class="mb-0">
                    <li>Test all changes locally</li>
                    <li>Review code for errors</li>
                    <li>Create a backup (recommended)</li>
                    <li>Document changes made</li>
                </ul>
            </div>

            <div class="deploy-step">
                <h5>2. 📤 Upload Methods</h5>
                <p class="mb-2"><strong>Option A: FTP/SFTP</strong></p>
                <ul>
                    <li>Use FileZilla or similar FTP client</li>
                    <li>Connect to: injessview.com</li>
                    <li>Upload modified files to the server</li>
                </ul>
                
                <p class="mb-2 mt-3"><strong>Option B: Git</strong></p>
                <ul class="mb-0">
                    <li>Commit changes: <code>git add . && git commit -m "Update"</code></li>
                    <li>Push to repository: <code>git push origin main</code></li>
                    <li>Pull on server: <code>git pull origin main</code></li>
                </ul>
            </div>

            <div class="deploy-step">
                <h5>3. 🔄 Post-Deployment</h5>
                <ul class="mb-0">
                    <li>Clear browser cache</li>
                    <li>Test all pages on live site</li>
                    <li>Check responsive design</li>
                    <li>Verify all links work (especially Ziwilatu Project link)</li>
                    <li>Test admin interface functionality</li>
                </ul>
            </div>

            <div class="deploy-step">
                <h5>4. 🛠️ Quick Actions</h5>
                <div class="mt-3">
                    <a href="/admin-backup class="btn btn-primary me-2">💾 Create Backup First</a>
                    <a href="/home target="_blank" class="btn btn-outline-primary">👁️ Preview Site</a>
                </div>
            </div>
        </div>

        <div class="alert alert-success">
            <h5>✅ Deployment Ready!</h5>
            <p class="mb-0">Your website is configured and ready for deployment. All admin features have been implemented and the Ziwilatu Project link has been added to the navigation.</p>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
