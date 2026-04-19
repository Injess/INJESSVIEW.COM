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
$users_result = false;
if($conn) {
    $query = "SELECT username FROM users WHERE uid='$uid'";
    $result = mysqli_query($conn, $query);
    $user = $result ? mysqli_fetch_assoc($result) : null;
    $username = $user['username'] ?? 'Admin';
} elseif (!empty($db_connection_error)) {
    $db_error_message = 'Database connection unavailable. User management is temporarily disabled.';
}

// Handle user creation
if($conn && isset($_POST['create_user'])) {
    $new_username = mysqli_real_escape_string($conn, htmlentities($_POST['new_username']));
    $new_password = mysqli_real_escape_string($conn, htmlentities($_POST['new_password']));
    $pword_hash = md5($new_password);
    
    $check_query = "SELECT * FROM users WHERE username='$new_username'";
    if(mysqli_num_rows(mysqli_query($conn, $check_query)) > 0) {
        $error_message = "Username already exists!";
    } else {
        $insert_query = "INSERT INTO users (username, password) VALUES ('$new_username', '$pword_hash')";
        if(mysqli_query($conn, $insert_query)) {
            $success_message = "User created successfully!";
        } else {
            $error_message = "Failed to create user.";
        }
    }
}

// Handle user deletion
if($conn && isset($_GET['delete_user'])) {
    $delete_id = intval($_GET['delete_user']);
    if($delete_id != $uid) { // Prevent deleting self
        $delete_query = "DELETE FROM users WHERE uid='$delete_id'";
        if(mysqli_query($conn, $delete_query)) {
            $success_message = "User deleted successfully!";
        } else {
            $error_message = "Failed to delete user.";
        }
    } else {
        $error_message = "You cannot delete your own account!";
    }
}

// Get all users
if($conn) {
    $users_query = "SELECT uid, username FROM users ORDER BY uid DESC";
    $users_result = mysqli_query($conn, $users_query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>User Management - Injessview Admin</title>
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
        .user-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 20px;
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
            <li><a href="/admin-dashboard>📊 Dashboard</a></li>
            <li><a href="/admin-pages>📄 Manage Pages</a></li>
            <li><a href="/admin-media>🖼️ Media Library</a></li>
            <li><a href="/admin-settings>⚙️ Settings</a></li>
            <li><a href="/admin-users class="active">👥 Users</a></li>
            <li><a href="/admin-analytics>📈 Analytics</a></li>
            <li><a href="/home target="_blank">🌐 View Website</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <h1>User Management</h1>
            <a href="/admin-dashboard class="btn btn-sm btn-outline-secondary">← Back to Dashboard</a>
        </div>

        <?php if($db_error_message): ?>
            <div class="alert alert-warning" role="alert"><?= htmlspecialchars($db_error_message) ?></div>
        <?php endif; ?>

        <?php if(isset($success_message)): ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    swal("Success!", "<?= $success_message ?>", "success").then(() => {
                        window.location.href = "admin-users";
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

        <!-- Create New User -->
        <div class="content-box">
            <h3 class="mb-3">Create New User</h3>
            <form method="POST" action="" class="row g-3">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="new_username" placeholder="Username" <?= !$conn ? 'disabled' : '' ?> required>
                </div>
                <div class="col-md-5">
                    <input type="password" class="form-control" name="new_password" placeholder="Password" <?= !$conn ? 'disabled' : '' ?> required>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="create_user" class="btn btn-primary w-100" <?= !$conn ? 'disabled' : '' ?>>➕ Create</button>
                </div>
            </form>
        </div>

        <!-- Users List -->
        <div class="content-box">
            <h3 class="mb-3">All Users</h3>
            <?php if($users_result): ?>
                <?php while($u = mysqli_fetch_assoc($users_result)): ?>
                    <div class="user-card">
                        <div class="user-info">
                            <div class="user-avatar"><?= strtoupper(substr($u['username'], 0, 1)) ?></div>
                            <div>
                                <h5 class="mb-0"><?= htmlspecialchars($u['username']) ?></h5>
                                <small class="text-muted">User ID: <?= $u['uid'] ?></small>
                                <?php if($u['uid'] == $uid): ?>
                                    <span class="badge bg-success ms-2">You</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($u['uid'] != $uid): ?>
                            <a href="?delete_user=<?= $u['uid'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this user?')">🗑️ Delete</a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-muted mb-0">User records are unavailable until the database connection is restored.</p>
            <?php endif; ?>
        </div>
    </div>

    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
