<?php require_once 'app/views/shares/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color: #555;
        }
        form input, form select, form button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        form button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thêm Nhân Viên</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="index.php?controller=employee&action=handleAdd" method="POST">
            <label for="ma_nv">Mã Nhân Viên:</label>
            <input type="text" id="ma_nv" name="ma_nv" required>

            <label for="ten_nv">Tên Nhân Viên:</label>
            <input type="text" id="ten_nv" name="ten_nv" required>

            <label for="phai">Giới Tính:</label>
            <select id="phai" name="phai" required>
                <option value="NAM">Nam</option>
                <option value="NU">Nữ</option>
            </select>

            <label for="noi_sinh">Nơi Sinh:</label>
            <input type="text" id="noi_sinh" name="noi_sinh" required>

            <label for="ma_phong">Phòng Ban:</label>
            <select id="ma_phong" name="ma_phong" required>
                <?php foreach ($departments as $department): ?>
                    <option value="<?php echo $department['Ma_Phong']; ?>"><?php echo $department['Ten_Phong']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="luong">Lương:</label>
            <input type="number" id="luong" name="luong" required>

            <button type="submit">Thêm</button>
        </form>
    </div>
</body>
</html>