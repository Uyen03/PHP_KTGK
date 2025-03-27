<?php require_once 'app/views/shares/header.php'; ?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
        border-radius: 4px;
        font-size: 14px;
    }
    form button {
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    }
    form button:hover {
        background-color: #0056b3;
    }
    .error {
        color: red;
        text-align: center;
        margin-bottom: 15px;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .container {
            margin: 20px;
            padding: 15px;
        }
        form input, form select, form button {
            font-size: 12px;
            padding: 8px;
        }
        h2 {
            font-size: 18px;
        }
    }

    @media (max-width: 480px) {
        .container {
            margin: 10px;
            padding: 10px;
        }
        form input, form select, form button {
            font-size: 10px;
            padding: 6px;
        }
        h2 {
            font-size: 16px;
        }
    }
</style>
<div class="container">
    <h2>SỬA NHÂN VIÊN</h2>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="index.php?controller=employee&action=handleEdit" method="POST">
        <input type="hidden" name="ma_nv" value="<?php echo $employee['Ma_NV']; ?>">
        <label>Mã Nhân Viên:</label>
        <input type="text" value="<?php echo $employee['Ma_NV']; ?>" disabled>
        <label>Tên Nhân Viên:</label>
        <input type="text" name="ten_nv" value="<?php echo $employee['Ten_NV']; ?>" required>
        <label>Giới Tính:</label>
        <select name="phai" required>
            <option value="NAM" <?php echo $employee['Phai'] == 'NAM' ? 'selected' : ''; ?>>Nam</option>
            <option value="NU" <?php echo $employee['Phai'] == 'NU' ? 'selected' : ''; ?>>Nữ</option>
        </select>
        <label>Nơi Sinh:</label>
        <input type="text" name="noi_sinh" value="<?php echo $employee['Noi_Sinh']; ?>" required>
        <label>Phòng Ban:</label>
        <select name="ma_phong" required>
            <?php foreach ($departments as $department): ?>
                <option value="<?php echo $department['Ma_Phong']; ?>" <?php echo $employee['Ma_Phong'] == $department['Ma_Phong'] ? 'selected' : ''; ?>>
                    <?php echo $department['Ten_Phong']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label>Lương:</label>
        <input type="number" name="luong" value="<?php echo $employee['Luong']; ?>" required>
        <button type="submit">Cập Nhật</button>
    </form>
</div>