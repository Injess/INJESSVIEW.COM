<?php
session_start();
include './php/core.php';

if(!loggedin()) {
    header('Location: admin-login');
    exit;
}

include './php/connect.php';

$uid = $_SESSION['uid'];
$username = 'Admin';
$db_error_message = '';
if($conn) {
    $query = "SELECT username FROM users WHERE uid='$uid'";
    $result = mysqli_query($conn, $query);
    $user = $result ? mysqli_fetch_assoc($result) : null;
    $username = $user['username'] ?? 'Admin';
} elseif (!empty($db_connection_error)) {
    $db_error_message = 'Database connection unavailable. Site settings remain editable from the JSON configuration.';
}

// Handle settings update
if(isset($_POST['update_settings'])) {
    // In a production environment, these would be stored in a database
    // For now, we'll use a simple JSON file
    $settings = [
        'site_name' => $_POST['site_name'],
        'site_description' => $_POST['site_description'],
        'contact_email' => $_POST['contact_email'],
        'maintenance_mode' => isset($_POST['maintenance_mode']) ? 1 : 0,
        'ziwilatu_link' => $_POST['ziwilatu_link']
    ];
    
    $settings_file = 'php/site-settings.json';
    if(file_put_contents($settings_file, json_encode($settings, JSON_PRETTY_PRINT))) {
        $success_message = "Settings updated successfully!";
    } else {
        $error_message = "Failed to update settings.";
    }
}

// Load current settings
$settings_file = 'php/site-settings.json';
if(file_exists($settings_file)) {
    $settings = json_decode(file_get_contents($settings_file), true);
} else {
    $settings = [
        'site_name' => 'Injessview',
        'site_description' => 'Construction works, Site Diary',
        'contact_email' => 'info@injessview.com',
        'maintenance_mode' => 0,
        'ziwilatu_link' => 'https://injessview.com/ziwilatu/subscribers.php'
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Settings - Injessview Admin</title>
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
        .settings-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .settings-section {
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #e2e8f0;
        }
        .settings-section:last-child {
            border-bottom: none;
        }
        .settings-section h3 {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 20px;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
        }
        .form-switch .form-check-input {
            width: 3rem;
            height: 1.5rem;
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
            <li><a href="admin-settings" class="active">⚙️ Settings</a></li>
            <li><a href="admin-users">👥 Users</a></li>
            <li><a href="admin-analytics">📈 Analytics</a></li>
            <li><a href="home" target="_blank">🌐 View Website</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <h1>Site Settings</h1>
            <a href="admin-dashboard" class="btn btn-sm btn-outline-secondary">← Back to Dashboard</a>
        </div>

        <?php if($db_error_message): ?>
            <div class="alert alert-warning" role="alert"><?= htmlspecialchars($db_error_message) ?></div>
        <?php endif; ?>

        <?php if(isset($success_message)): ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    swal("Success!", "<?= $success_message ?>", "success");
                });
            </script>
        <?php endif; ?>

        <?php if(isset($error_message)): ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    swal("Error!", "<?= $error_message ?>", "error");
                });
            </script>
        <?php endif; ?>

        <div class="settings-container">
            <form method="POST" action="">
                <!-- General Settings -->
                <div class="settings-section">
                    <h3>⚙️ General Settings</h3>
                    <div class="mb-3">
                        <label for="site_name" class="form-label">Site Name</label>
                        <input type="text" class="form-control" id="site_name" name="site_name" value="<?= htmlspecialchars($settings['site_name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="site_description" class="form-label">Site Description</label>
                        <textarea class="form-control" id="site_description" name="site_description" rows="3" required><?= htmlspecialchars($settings['site_description']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="contact_email" class="form-label">Contact Email</label>
                        <input type="email" class="form-control" id="contact_email" name="contact_email" value="<?= htmlspecialchars($settings['contact_email']) ?>" required>
                    </div>
                </div>

                <!-- Ziwilatu Project -->
                <div class="settings-section">
                    <h3>🌟 Ziwilatu Project</h3>
                    <div class="mb-3">
                        <label for="ziwilatu_link" class="form-label">Ziwilatu Project Link</label>
                        <input type="url" class="form-control" id="ziwilatu_link" name="ziwilatu_link" value="<?= htmlspecialchars($settings['ziwilatu_link']) ?>" required>
                        <div class="form-text">This link appears in the navigation menu</div>
                    </div>
                </div>

                <!-- System Settings -->
                <div class="settings-section">
                    <h3>🔧 System Settings</h3>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="maintenance_mode" name="maintenance_mode" <?= $settings['maintenance_mode'] ? 'checked' : '' ?>>
                        <label class="form-check-label" for="maintenance_mode">
                            <strong>Maintenance Mode</strong><br>
                            <small class="text-muted">Enable this to show a maintenance page to visitors</small>
                        </label>
                    </div>
                </div>

                <!-- PHP & Database Info -->
                <div class="settings-section">
                    <h3>📊 Server Information</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>PHP Version:</strong> <?= phpversion() ?></p>
                            <p><strong>Server Software:</strong> <?= $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown' ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Database:</strong> <?= mysqli_get_host_info($conn) ?></p>
                            <p><strong>MySQL Version:</strong> <?= mysqli_get_server_info($conn) ?></p>
                        </div>
                    </div>
                </div>

                <button type="submit" name="update_settings" class="btn btn-primary">💾 Save Settings</button>
            </form>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
