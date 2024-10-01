<?php
ob_start();

include('include/home/header.php');

$passwordChanged = false;
$confirmPasswordError = '';
$currentPasswordError = '';
$newPasswordError = '';
$generalError = ''; // Biến này sẽ chứa thông báo lỗi chung nếu có trường nào bị bỏ trống

if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
    $query = "SELECT name, address, phone_number FROM customer WHERE customer_id = $customer_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    echo "Bạn chưa đăng nhập.";
}

// Hàm để cập nhật mật khẩu của người dùng
function updatePassword($conn, $customerId, $currentPassword, $newPassword, $confirmNewPassword)
{
    global $currentPasswordError, $confirmPasswordError, $newPasswordError, $generalError;

    // Kiểm tra mật khẩu hiện tại
    $query = "SELECT cuspass FROM customer WHERE customer_id=?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        echo "Lỗi prepare: " . $conn->error;
        return false;
    }
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['cuspass'] != md5($currentPassword)) {
        $currentPasswordError = "Mật khẩu hiện tại không đúng";
        return false;
    }

    // Kiểm tra điều kiện mật khẩu mới
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).{8,}$/', $newPassword)) {
        $newPasswordError = "Mật khẩu phải chứa ít nhất 8 ký tự, 
                            bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.";
        return false;
    }

    // Kiểm tra mật khẩu mới và mật khẩu xác nhận có khớp nhau không
    if ($newPassword != $confirmNewPassword) {
        $confirmPasswordError = "Mật khẩu xác nhận không khớp";
        return false;
    }

    // Cập nhật mật khẩu mới
    $query = "UPDATE customer SET cuspass=? WHERE customer_id=?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        echo "Lỗi prepare: " . $conn->error;
        return false;
    }
    $hashedPassword = md5($newPassword);
    $stmt->bind_param("si", $hashedPassword, $customerId);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['update_password'])) {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmNewPassword = $_POST['confirm_new_password'];

    // Kiểm tra xem tất cả các trường có được điền đầy đủ hay không
    if (empty($currentPassword) || empty($newPassword) || empty($confirmNewPassword)) {
        $generalError = "Vui lòng điền đầy đủ thông tin.";
    } else {
        if (updatePassword($conn, $_SESSION['customer_id'], $currentPassword, $newPassword, $confirmNewPassword)) {
            echo "<script>
                    alert('Đổi mật khẩu thành công!');
                    window.location.href = 'logout.php';
                  </script>";
            exit();
        }
    }
}
ob_end_flush();
?>

<section>
<style>
       body {
            margin: 0; /* Loại bỏ margin mặc định */
            padding: 0; /* Loại bỏ padding mặc định */
        }
        .chua {
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
          
            height: 6;
        }
        h1, h2 {
            text-align: center;
        }
       
       
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-left: 20%;
            background-color: #428bca;
            float:right;

        }
        button[type="submit"]:hover {
                    opacity: 0.8; /* Giảm độ mờ khi hover */
            }
        .error {
            color: red;
            margin-top: 10px;
        }
        .sidebar {
            width: 200px;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #f1f1f1;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px;
            display: block;
            text-decoration: none;
            color: #000;
        }
        .sidebar a:hover {
            background-color: #ddd;
        }
        /* CSS cho nội dung */
        .content {
            margin-left: 200px; /* Để nội dung không bị che bởi sidebar */
            padding: 20px;
        }
        /* CSS cho tiêu đề sidebar */
        .sidebar h3 {
            margin-left: 10px;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .form-group label {
            flex-basis: 20%; /* Thiết lập kích thước cho tiêu đề */
            margin-right: 20px;
        }
        .form-group input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 300px;
        }
        .success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
        text-align: center;
        }
        .error {
       
        color: red;
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
        text-align: center;
    }

.success::before {
    content: "\2713"; /* Biểu tượng checkmark Unicode */
    font-size: 20px;
    margin-right: 10px;
}
       
    </style>
    <div class="bao container" style="max-width: 1200px;">
        <?php include('include/home/sidebar.php'); ?>
        <div class="chua col-md-9">
            <h2>Đổi Mật Khẩu</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Mật khẩu hiện tại:</label>
                    <input type="password" name="current_password" id="current_password">
                    <?php if ($currentPasswordError): ?>
                        <div class="error"><?php echo $currentPasswordError; ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="new_password">Mật khẩu mới:</label>
                    <input type="password" name="new_password" id="new_password">
                    
                </div>
                    <?php if ($newPasswordError): ?>
                        <div class="error"><?php echo $newPasswordError; ?></div>
                    <?php endif; ?>
                <div class="form-group">
                    <label for="confirm_new_password">Xác nhận mật khẩu mới:</label>
                    <input type="password" name="confirm_new_password" id="confirm_new_password">
                    <?php if ($confirmPasswordError): ?>
                        <div class="error"><?php echo $confirmPasswordError; ?></div>
                    <?php endif; ?>
                </div>
                <button type="submit" name="update_password">Đổi Mật Khẩu</button>
                <div class="form-group">
                                    <span class="error"><?php echo $generalError; ?></span>

                </div>

            </form>
        </div>
    </div>
</section>

<?php include 'include/home/tuvan.php'; ?>
<?php include 'include/home/footer.php'; ?>
