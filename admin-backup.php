<?php
session_start();
include './php/core.php';

if(!loggedin()) {
    header('Location: admin-login');
    exit;
}

// Handle backup creation
if(isset($_POST['create_backup'])) {
    $backup_name = 'backup_' . date('Y-m-d_H-i-s') . '.zip';
    $backup_path = 'backups/' . $backup_name;
    
    // Create backups directory if it doesn't exist
    if(!is_dir('backups')) {
        mkdir('backups', 0755, true);
    }
    
    // Create zip archive
    $zip = new ZipArchive();
    if($zip->open($backup_path, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
        // Get all files recursively
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(__DIR__),
            RecursiveIteratorIterator::LEAVES_ONLY
        );
        
        foreach($files as $file) {
            if(!$file->isDir() && strpos($file->getPathname(), 'backups') === false) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen(__DIR__) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        
        $zip->close();
        $success_message = "Backup created successfully!";
        $backup_file = $backup_name;
    } else {
        $error_message = "Failed to create backup.";
    }
}

// Get existing backups
$backups = [];
if(is_dir('backups')) {
    $backup_files = scandir('backups');
    foreach($backup_files as $file) {
        if($file != '.' && $file != '..') {
            $backups[] = [
                'name' => $file,
                'size' => filesize('backups/' . $file),
                'date' => filemtime('backups/' . $file)
            ];
        }
    }
    // Sort by date descending
    usort($backups, function($a, $b) {
        return $b['date'] - $a['date'];
    });
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Backup & Deployment - Injessview Admin</title>
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
        .content-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .backup-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            <h1>Backup & Deployment</h1>
            <a href="/admin-dashboard class="btn btn-sm btn-outline-secondary">← Back to Dashboard</a>
        </div>

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

        <!-- Create Backup -->
        <div class="content-box">
            <h3 class="mb-3">💾 Create Backup</h3>
            <p class="text-muted mb-4">Create a complete backup of your website files and database.</p>
            <form method="POST" action="">
                <button type="submit" name="create_backup" class="btn btn-primary">🔄 Create New Backup</button>
            </form>
        </div>

        <!-- Existing Backups -->
        <div class="content-box">
            <h3 class="mb-3">📦 Available Backups (<?= count($backups) ?>)</h3>
            <?php if(empty($backups)): ?>
                <p class="text-muted">No backups available. Create your first backup above.</p>
            <?php else: ?>
                <?php foreach($backups as $backup): ?>
                    <div class="backup-card">
                        <div>
                            <h5 class="mb-1">📄 <?= htmlspecialchars($backup['name']) ?></h5>
                            <small class="text-muted">
                                Size: <?= round($backup['size'] / 1024 / 1024, 2) ?> MB | 
                                Created: <?= date('Y-m-d H:i:s', $backup['date']) ?>
                            </small>
                        </div>
                        <a href="backups/<?= urlencode($backup['name']) ?>" class="btn btn-sm btn-outline-primary" download>⬇️ Download</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Deployment Options -->
        <div class="content-box">
            <h3 class="mb-3">🚀 Deployment Options</h3>
            <div class="alert alert-info">
                <h5>📝 Deployment Instructions:</h5>
                <ol class="mb-0">
                    <li>Test all changes locally first</li>
                    <li>Create a backup before deploying</li>
                    <li>Upload files via FTP/SFTP or use Git</li>
                    <li>Clear cache after deployment</li>
                    <li>Test the live site thoroughly</li>
                </ol>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-6">
                    <h5>📤 FTP Deployment</h5>
                    <p class="text-muted">Use an FTP client like FileZilla to upload files to your server.</p>
                </div>
                <div class="col-md-6">
                    <h5>🔀 Git Deployment</h5>
                    <p class="text-muted">Push changes to your Git repository and pull on the server.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
