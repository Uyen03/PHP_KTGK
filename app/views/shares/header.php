<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Sự</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
        }
        .header {
            background: linear-gradient(to right, #2c3e50, #3498db);
            color: white;
            padding: 15px 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-links {
            display: flex;
            align-items: center;
        }
        .header a {
            color: white;
            text-decoration: none;
            margin: 0 12px;
            font-weight: 300;
            transition: color 0.3s ease;
            position: relative;
        }
        .header a:hover {
            color: #f1c40f;
        }
        .header a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #f1c40f;
            transition: width 0.3s ease;
        }
        .header a:hover::after {
            width: 100%;
        }
        .user-info {
            display: flex;
            align-items: center;
            font-weight: 300;
        }
        .user-greeting {
            margin-right: 15px;
        }
        .logout-link {
            background-color: rgba(255,255,255,0.2);
            padding: 8px 15px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }
        .logout-link:hover {
            background-color: rgba(255,255,255,0.3);
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-links">
            <a href="index.php?controller=employee&action=index">Danh Sách Nhân Viên</a>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                <a href="index.php?controller=employee&action=add">Thêm Nhân Viên</a>
            <?php endif; ?>
        </div>
        <div class="user-info">
            <?php if (isset($_SESSION['user'])): ?>
                <span class="user-greeting">Xin chào, <?php echo htmlspecialchars($_SESSION['user']['fullname']); ?></span>
                <a href="index.php?controller=auth&action=logout" class="logout-link">Đăng Xuất</a>
            <?php else: ?>
                <a href="index.php?controller=auth&action=login">Đăng Nhập</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>