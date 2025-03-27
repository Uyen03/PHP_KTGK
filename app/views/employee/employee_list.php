<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Nhân Viên</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .table-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .table-header {
            background-color: #38a169;
            color: white;
        }
        .employee-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }
        .action-btn {
            transition: all 0.3s ease;
        }
        .action-btn:hover {
            transform: scale(1.05);
            opacity: 0.8;
        }
        .pagination-btn {
            margin: 0 4px;
            padding: 8px 12px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        .pagination-btn:hover {
            background-color: #38a169;
            color: white;
        }
        .pagination-btn.active {
            background-color: #38a169;
            color: white;
        }
    </style>
</head>
<body class="bg-gray-100">
    <?php require_once 'app/views/shares/header.php'; ?>
    
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">THÔNG TIN NHÂN VIÊN</h2>
        
        <div class="table-container overflow-x-auto shadow-lg rounded-lg">
            <table class="w-full text-sm text-left">
                <thead class="table-header">
                    <tr>
                        <th class="px-6 py-3">Mã Nhân Viên</th>
                        <th class="px-6 py-3">Tên Nhân Viên</th>
                        <th class="px-6 py-3">Giới tính</th>
                        <th class="px-6 py-3">Nơi Sinh</th>
                        <th class="px-6 py-3">Tên Phòng</th>
                        <th class="px-6 py-3">Lương</th>
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                            <th class="px-6 py-3">Hành Động</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee): ?>
                        <tr class="bg-white border-b hover:bg-gray-50 transition duration-200">
                            <td class="px-6 py-4"><?php echo htmlspecialchars($employee['Ma_NV']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($employee['Ten_NV']); ?></td>
                            <td class="px-6 py-4">
                                <?php
                                $gender_image = ($employee['Phai'] == 'NU') ? 'public/images/woman.jpg' : 'public/images/man.jpg';
                                $gender_alt = ($employee['Phai'] == 'NU') ? 'Nữ' : 'Nam';
                                ?>
                                <img src="<?php echo $gender_image; ?>" alt="<?php echo $gender_alt; ?>" class="employee-avatar">
                            </td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($employee['Noi_Sinh']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($employee['Ten_Phong']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($employee['Luong']); ?></td>
                            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                                <td class="px-6 py-4 flex space-x-2">
                                    <a href="index.php?controller=employee&action=edit&ma_nv=<?php echo $employee['Ma_NV']; ?>" 
                                       class="text-blue-500 hover:text-blue-700 action-btn">Sửa</a>
                                    <a href="index.php?controller=employee&action=delete&ma_nv=<?php echo $employee['Ma_NV']; ?>" 
                                       onclick="return confirm('Bạn có chắc muốn xóa?')" 
                                       class="text-red-500 hover:text-red-700 action-btn">Xóa</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="pagination flex justify-center items-center mt-6 space-x-2">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="index.php?controller=employee&action=index&page=<?php echo $i; ?>" 
                   class="pagination-btn <?php echo $i == $page ? 'active' : 'bg-white text-gray-700 border'; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
    </div>
</body>
</html>