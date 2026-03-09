<?php
session_start();
include './php/core.php';
include './php/connect.php';

if(!loggedin()) {
    header('Location: admin-login.php');
    exit;
}

$uid = $_SESSION['uid'];
$query = "SELECT username FROM users WHERE uid='$uid'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
$username = $user['username'] ?? 'Admin';

// Handle file upload
if(isset($_POST['upload_media'])) {
    $upload_dir = 'img/';
    if(isset($_FILES['media_file']) && $_FILES['media_file']['error'] == 0) {
        $filename = basename($_FILES['media_file']['name']);
        $target_file = $upload_dir . $filename;
        
        // Check file type
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $file_type = $_FILES['media_file']['type'];
        
        if(in_array($file_type, $allowed_types)) {
            if(move_uploaded_file($_FILES['media_file']['tmp_name'], $target_file)) {
                $success_message = "File uploaded successfully!";
            } else {
                $error_message = "Failed to upload file.";
            }
        } else {
            $error_message = "Invalid file type. Only images are allowed.";
        }
    }
}

// Handle file deletion
if(isset($_GET['delete'])) {
    $file_to_delete = 'img/' . basename($_GET['delete']);
    if(file_exists($file_to_delete) && unlink($file_to_delete)) {
        $success_message = "File deleted successfully!";
    } else {
        $error_message = "Failed to delete file.";
    }
}

// Get media files
$media_dir = 'img/';
$media_files = [];
if(is_dir($media_dir)) {
    $files = scandir($media_dir);
    foreach($files as $file) {
        if($file != '.' && $file != '..' && !is_dir($media_dir . $file)) {
            $media_files[] = [
                'name' => $file,
                'path' => $media_dir . $file,
                'size' => filesize($media_dir . $file),
                'modified' => filemtime($media_dir . $file)
            ];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Library - Injessview Admin</title>
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
        .upload-section {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .media-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .media-item {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }
        .media-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .media-preview {
            width: 100%;
            height: 180px;
            object-fit: cover;
            background: #f1f5f9;
        }
        .media-info {
            padding: 15px;
        }
        .media-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .media-size {
            font-size: 12px;
            color: #666;
        }
        .media-actions {
            padding: 10px 15px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            gap: 10px;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            padding: 10px 25px;
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
            <li><a href="admin-dashboard.php">📊 Dashboard</a></li>
            <li><a href="admin-pages.php">📄 Manage Pages</a></li>
            <li><a href="admin-media.php" class="active">🖼️ Media Library</a></li>
            <li><a href="admin-settings.php">⚙️ Settings</a></li>
            <li><a href="admin-users.php">👥 Users</a></li>
            <li><a href="admin-analytics.php">📈 Analytics</a></li>
            <li><a href="index.php" target="_blank">🌐 View Website</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <h1>Media Library</h1>
            <a href="admin-dashboard.php" class="btn btn-sm btn-outline-secondary">← Back to Dashboard</a>
        </div>

        <?php if(isset($success_message)): ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    swal("Success!", "<?= $success_message ?>", "success").then(() => {
                        window.location.href = "admin-media.php";
                    });
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

        <!-- Upload Section -->
        <div class="upload-section">
            <h3 class="mb-3">Upload New Media</h3>
            <form method="POST" enctype="multipart/form-data" class="row g-3">
                <div class="col-md-10">
                    <input type="file" name="media_file" class="form-control" accept="image/*" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="upload_media" class="btn btn-primary w-100">📤 Upload</button>
                </div>
            </form>
        </div>

        <!-- Media Grid -->
        <h3 class="mb-3">Media Files (<?= count($media_files) ?>)</h3>
        <div class="media-grid">
            <?php foreach($media_files as $file): ?>
                <div class="media-item">
                    <img src="<?= $file['path'] ?>" alt="<?= htmlspecialchars($file['name']) ?>" class="media-preview">
                    <div class="media-info">
                        <div class="media-name" title="<?= htmlspecialchars($file['name']) ?>">
                            <?= htmlspecialchars($file['name']) ?>
                        </div>
                        <div class="media-size">
                            <?= round($file['size'] / 1024, 2) ?> KB
                        </div>
                    </div>
                    <div class="media-actions">
                        <button class="btn btn-sm btn-outline-primary flex-fill" onclick="copyPath('<?= $file['path'] ?>')">📋 Copy Path</button>
                        <a href="?delete=<?= urlencode($file['name']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this file?')">🗑️</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
    <script>
        function copyPath(path) {
            navigator.clipboard.writeText(path).then(() => {
                swal("Copied!", "File path copied to clipboard", "success");
            });
        }
    </script>
</body>
</html>
