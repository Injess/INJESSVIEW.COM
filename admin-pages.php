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
    $db_error_message = 'Database connection unavailable. Page editing remains available because it is file-based.';
}

// Get list of editable pages
$pages = [
    ['file' => 'index.php', 'title' => 'Home Page', 'icon' => '🏠'],
    ['file' => 'construction-works.php', 'title' => 'Construction Works', 'icon' => '🏗️'],
    ['file' => 'site-diary.php', 'title' => 'Site Diary', 'icon' => '📔'],
    ['file' => 'building.php', 'title' => 'Building', 'icon' => '🏢'],
    ['file' => 'irrigation.php', 'title' => 'Irrigation', 'icon' => '💧'],
    ['file' => 'roads-authority.php', 'title' => 'Roads Authority', 'icon' => '🛣️'],
    ['file' => 'nav.php', 'title' => 'Navigation Menu', 'icon' => '📌'],
    ['file' => 'footer.php', 'title' => 'Footer', 'icon' => '⬇️'],
];

// Handle file edit
if(isset($_POST['save_content'])) {
    $file = $_POST['file'];
    $content = $_POST['content'];
    
    // Security check - only allow editing specific files
    $allowed_files = array_column($pages, 'file');
    if(in_array($file, $allowed_files)) {
        $filepath = __DIR__ . '/' . $file;
        if(file_put_contents($filepath, $content)) {
            $success_message = "File updated successfully!";
        } else {
            $error_message = "Failed to update file.";
        }
    } else {
        $error_message = "Unauthorized file access.";
    }
}

// Get current file content for editing
$current_file = $_GET['edit'] ?? null;
$file_content = '';
if($current_file && in_array($current_file, array_column($pages, 'file'))) {
    $filepath = __DIR__ . '/' . $current_file;
    if(file_exists($filepath)) {
        $file_content = file_get_contents($filepath);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Manage Pages - Injessview Admin</title>
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
        .page-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s;
        }
        .page-card:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .page-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .page-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        .editor-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .code-editor {
            font-family: 'Courier New', monospace;
            font-size: 14px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 15px;
            min-height: 500px;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
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
            <li><a href="/admin-pages class="active">📄 Manage Pages</a></li>
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
            <h1><?= $current_file ? 'Edit Page' : 'Manage Pages' ?></h1>
            <a href="/admin-dashboard class="btn btn-sm btn-outline-secondary">← Back to Dashboard</a>
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

        <?php if($current_file): ?>
            <!-- Editor View -->
            <div class="editor-container">
                <h3 class="mb-4">Editing: <?= htmlspecialchars($current_file) ?></h3>
                <form method="POST" action="">
                    <input type="hidden" name="file" value="<?= htmlspecialchars($current_file) ?>">
                    <div class="mb-3">
                        <textarea name="content" class="form-control code-editor" rows="20"><?= htmlspecialchars($file_content) ?></textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" name="save_content" class="btn btn-primary">💾 Save Changes</button>
                        <a href="/admin-pages class="btn btn-secondary">Cancel</a>
                        <a href="<?= htmlspecialchars($current_file) ?>" target="_blank" class="btn btn-outline-primary">👁️ Preview</a>
                    </div>
                </form>
            </div>
        <?php else: ?>
            <!-- List View -->
            <div class="mb-4">
                <p class="text-muted">Select a page to edit its content. Changes will be reflected immediately on the live site.</p>
            </div>

            <?php foreach($pages as $page): ?>
                <div class="page-card">
                    <div class="page-info">
                        <div class="page-icon"><?= $page['icon'] ?></div>
                        <div>
                            <h5 class="mb-0"><?= $page['title'] ?></h5>
                            <small class="text-muted"><?= $page['file'] ?></small>
                        </div>
                    </div>
                    <div>
                        <a href="?edit=<?= urlencode($page['file']) ?>" class="btn btn-primary btn-sm">✏️ Edit</a>
                        <a href="<?= $page['file'] ?>" target="_blank" class="btn btn-outline-secondary btn-sm">👁️ View</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
