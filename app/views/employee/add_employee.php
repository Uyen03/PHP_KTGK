<?php require_once 'app/views/shares/header.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="antialiased">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white shadow-xl rounded-xl p-8 sm:max-w-lg lg:max-w-xl">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Thêm Nhân Viên Mới
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Vui lòng điền đầy đủ thông tin nhân viên
                </p>
            </div>

            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline"><?php echo $error; ?></span>
                </div>
            <?php endif; ?>

            <form class="mt-8 space-y-6" action="index.php?controller=employee&action=handleAdd" method="POST">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div class="mb-4">
                        <label for="ma_nv" class="block text-sm font-medium text-gray-700">Mã Nhân Viên</label>
                        <input id="ma_nv" name="ma_nv" type="text" required 
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="ten_nv" class="block text-sm font-medium text-gray-700">Tên Nhân Viên</label>
                        <input id="ten_nv" name="ten_nv" type="text" required 
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="phai" class="block text-sm font-medium text-gray-700">Giới Tính</label>
                        <select id="phai" name="phai" required 
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="NAM">Nam</option>
                            <option value="NU">Nữ</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="noi_sinh" class="block text-sm font-medium text-gray-700">Nơi Sinh</label>
                        <input id="noi_sinh" name="noi_sinh" type="text" required 
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div class="mb-4">
                        <label for="ma_phong" class="block text-sm font-medium text-gray-700">Phòng Ban</label>
                        <select id="ma_phong" name="ma_phong" required 
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <?php foreach ($departments as $department): ?>
                                <option value="<?php echo $department['Ma_Phong']; ?>"><?php echo $department['Ten_Phong']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="luong" class="block text-sm font-medium text-gray-700">Lương</label>
                        <input id="luong" name="luong" type="number" required 
                            class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <button type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Thêm Nhân Viên
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>