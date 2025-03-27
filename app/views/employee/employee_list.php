<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f7fb;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        .card:hover {
            box-shadow: 0 14px 28px rgba(0,0,0,0.15), 0 10px 10px rgba(0,0,0,0.12);
            transform: translateY(-5px);
        }
        .employee-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e2e8f0;
        }
        .table-striped tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }
        .action-button {
            transition: all 0.2s ease-in-out;
            transform: scale(1);
        }
        .action-button:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }
    </style>
</head>
<body class="antialiased">
    <?php require_once 'app/views/shares/header.php'; ?>

    <div class="min-h-screen bg-gray-100">
        <header class="gradient-bg text-white py-6 shadow-md">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl font-extrabold text-center tracking-wide">Quản Lý Nhân Viên</h1>
            </div>
        </header>

        <main class="container mx-auto px-4 py-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden card">
                <div class="p-6">
                    <table class="w-full text-sm text-left table-striped">
                        <thead class="bg-purple-600 text-white">
                            <tr>
                                <th class="px-6 py-4 font-semibold tracking-wider">Mã NV</th>
                                <th class="px-6 py-4 font-semibold tracking-wider">Tên Nhân Viên</th>
                                <th class="px-6 py-4 font-semibold tracking-wider">Giới Tính</th>
                                <th class="px-6 py-4 font-semibold tracking-wider">Nơi Sinh</th>
                                <th class="px-6 py-4 font-semibold tracking-wider">Phòng Ban</th>
                                <th class="px-6 py-4 font-semibold tracking-wider">Lương</th>
                                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                                    <th class="px-6 py-4 font-semibold tracking-wider">Hành Động</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($employees as $employee): ?>
                                <tr class="border-b hover:bg-gray-100">
                                    <td class="px-6 py-4 font-medium text-gray-900"><?php echo htmlspecialchars($employee['Ma_NV']); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($employee['Ten_NV']); ?></td>
                                    <td class="px-6 py-4">
                                        <?php
                                        $gender_image = ($employee['Phai'] == 'NU') ? 'public/images/woman.jpg' : 'public/images/man.jpg';
                                        $gender_alt = ($employee['Phai'] == 'NU') ? 'Nữ' : 'Nam';
                                        ?>
                                        <img src="<?php echo $gender_image; ?>" class="employee-avatar" alt="<?php echo $gender_alt; ?>">
                                    </td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($employee['Noi_Sinh']); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($employee['Ten_Phong']); ?></td>
                                    <td class="px-6 py-4"><?php echo htmlspecialchars($employee['Luong']); ?></td>
                                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin'): ?>
                                        <td class="px-6 py-4 flex space-x-2">
                                            <a href="index.php?controller=employee&action=edit&ma_nv=<?php echo $employee['Ma_NV']; ?>" 
                                               class="text-blue-600 hover:text-blue-800 action-button font-medium">Sửa</a>
                                            <a href="index.php?controller=employee&action=delete&ma_nv=<?php echo $employee['Ma_NV']; ?>" 
                                               onclick="return confirm('Bạn có chắc muốn xóa?')" 
                                               class="text-red-600 hover:text-red-800 action-button font-medium">Xóa</a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        
            <div class="pagination flex justify-center items-center mt-6 space-x-2">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="index.php?controller=employee&action=index&page=<?php echo $i; ?>" 
                       class="px-4 py-2 <?php echo $i == $page ? 'bg-purple-600 text-white' : 'bg-white text-gray-700 border'; ?> rounded-md hover:bg-purple-600 hover:text-white transition-colors">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>
            </div>
        </main>
    </div>
</body>
</html>