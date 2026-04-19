<?php
session_start();
include './php/core.php';

// Check if user is logged in
if(!loggedin()) {
    header('Location: admin-login');
    exit;
}

include './php/connect.php';

// Get user info
$uid = $_SESSION['uid'];
$username = 'Admin';
$db_error_message = '';
if($conn) {
    $query = "SELECT username FROM users WHERE uid='$uid'";
    $result = mysqli_query($conn, $query);
    $user = $result ? mysqli_fetch_assoc($result) : null;
    $username = $user['username'] ?? 'Admin';
} elseif (!empty($db_connection_error)) {
    $db_error_message = 'Database connection unavailable. Dashboard data is running in limited mode.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Dashboard - Injessview</title>
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
        .sidebar-menu a i {
            margin-right: 10px;
            font-size: 18px;
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
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 18px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .stat-card h3 {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .stat-card .value {
            font-size: 32px;
            font-weight: 700;
            color: var(--dark);
        }
        .stat-card .icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }
        .quick-actions {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .quick-actions h2 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--dark);
        }
        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            text-decoration: none;
            color: var(--dark);
            transition: all 0.3s;
        }
        .action-btn:hover {
            border-color: var(--primary);
            background: #f7fafc;
            transform: translateY(-3px);
        }
        .action-btn .icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .action-btn span {
            font-weight: 600;
        }
        .btn-logout {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-logout:hover {
            background: #dc2626;
            color: white;
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
            <li><a href="/admin-dashboard class="active">📊 Dashboard</a></li>
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
            <h1>Dashboard</h1>
            <div class="user-info">
                <div class="user-avatar"><?= strtoupper(substr($username, 0, 1)) ?></div>
                <div>
                    <div style="font-weight: 600;"><?= htmlspecialchars($username) ?></div>
                    <small style="color: #666;">Administrator</small>
                </div>
                <a href="/php/logout.php" class="btn btn-logout">Logout</a>
            </div>
        </div>

        <?php if($db_error_message): ?>
            <div class="alert alert-warning" role="alert"><?= htmlspecialchars($db_error_message) ?></div>
        <?php endif; ?>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">📄</div>
                <h3>Total Pages</h3>
                <div class="value">8</div>
            </div>
            <div class="stat-card">
                <div class="icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">🖼️</div>
                <h3>Media Files</h3>
                <div class="value">--</div>
            </div>
            <div class="stat-card">
                <div class="icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">👁️</div>
                <h3>Views Today</h3>
                <div class="value">--</div>
            </div>
            <div class="stat-card">
                <div class="icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">⚡</div>
                <h3>System Status</h3>
                <div class="value" style="font-size: 20px; color: #10b981;">Operational</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h2>Quick Actions</h2>
            <div class="action-grid">
                <a href="admin-pages?action=new" class="action-btn">
                    <div class="icon">➕</div>
                    <span>New Page</span>
                </a>
                <a href="admin-media?action=upload" class="action-btn">
                    <div class="icon">📤</div>
                    <span>Upload Media</span>
                </a>
                <a href="/admin-settings class="action-btn">
                    <div class="icon">⚙️</div>
                    <span>Site Settings</span>
                </a>
                <a href="https://injessview.com/ziwilatu/subscribers.php" target="_blank" class="action-btn">
                    <div class="icon">🌟</div>
                    <span>Ziwilatu Project</span>
                </a>
                <a href="/admin-backup class="action-btn">
                    <div class="icon">💾</div>
                    <span>Backup Site</span>
                </a>
                <a href="/admin-deploy class="action-btn">
                    <div class="icon">🚀</div>
                    <span>Deploy Changes</span>
                </a>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
