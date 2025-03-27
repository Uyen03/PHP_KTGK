<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Nhân Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .pagination {
            text-align: center;
            margin: 20px 0;
        }
        .pagination a {
            margin: 0 5px;
            text-decoration: none;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }
        .pagination a:hover {
            background-color: #4CAF50;
            color: white;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
            transition: color 0.3s;
        }
        a:hover {
            color: #333;
        }
        .action-links a {
            margin: 0 5px;
        }
    </style>
</head>
<body>
<?php require_once 'app/views/shares/header.php'; ?>
    <h2>THÔNG TIN NHÂN VIÊN</h2>
    
    <table>
        <tr>
            <th>Mã Nhân Viên</th>
            <th>Tên Nhân Viên</th>
            <th>Giới tính</th>
            <th>Nơi Sinh</th>
            <th>Tên Phòng</th>
            <th>Lương</th>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                <th>Hành Động</th>
            <?php endif; ?>
        </tr>
        
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?php echo htmlspecialchars($employee['Ma_NV']); ?></td>
                <td><?php echo htmlspecialchars($employee['Ten_NV']); ?></td>
                <td>
                    <?php
                    if ($employee['Phai'] == 'NU') {
                        echo '<img src="public/images/woman.jpg" alt="Woman">';
                    } else {
                        echo '<img src="public/images/man.jpg" alt="Man">';
                    }
                    ?>
                </td>
                <td><?php echo htmlspecialchars($employee['Noi_Sinh']); ?></td>
                <td><?php echo htmlspecialchars($employee['Ten_Phong']); ?></td>
                <td><?php echo htmlspecialchars($employee['Luong']); ?></td>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                    <td class="action-links">
                        <a href="index.php?controller=employee&action=edit&ma_nv=<?php echo $employee['Ma_NV']; ?>">Sửa</a> |
                        <a href="index.php?controller=employee&action=delete&ma_nv=<?php echo $employee['Ma_NV']; ?>" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
                    
    <!-- Phân trang -->
    <div class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="index.php?controller=employee&action=index&page=<?php echo $i; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>">
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
    </div>
</body>
</html>