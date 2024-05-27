<?php
// Include file kết nối đến cơ sở dữ liệu và khởi động session
include('include/home/header.php');
$passwordChanged = false;
$confirmPasswordError = false;
$currentPasswordError = false;

// Kiểm tra xem người dùng đã đăng nhập chưa
if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
    $query = "SELECT name, address, phone_number FROM customer WHERE customer_id = $customer_id";
    $result = mysqli_query($conn, $query);

    // Kiểm tra xem truy vấn có thành công không
    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // Xử lý lỗi khi truy vấn không thành công
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    echo "Bạn chưa đăng nhập.";
}

// Hàm để cập nhật mật khẩu của người dùng
function updatePassword($conn, $customerId, $currentPassword, $newPassword ,$confirmNewPassword)
{
    global $currentPasswordError, $confirmPasswordError;
    
    // Trước tiên, kiểm tra xem mật khẩu hiện tại có khớp với mật khẩu đã lưu trong cơ sở dữ liệu không
    $query = "SELECT cuspass FROM customer WHERE customer_id=?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        // Xử lý lỗi khi prepare không thành công
        echo "Lỗi prepare: " . $conn->error;
        return false;
    }
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    // Nếu mật khẩu không khớp, trả về false
    if ($row['cuspass'] != md5($currentPassword)) {
        $currentPasswordError = true;
        return false;
    }

    // Kiểm tra mật khẩu mới và mật khẩu xác nhận có khớp nhau không
    if ($newPassword != $confirmNewPassword) {
        $confirmPasswordError = true;
        return false;
    }

    // Nếu mật khẩu khớp, thực hiện cập nhật mật khẩu mới trong cơ sở dữ liệu
    $query = "UPDATE customer SET cuspass=? WHERE customer_id=?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        // Xử lý lỗi khi prepare không thành công
        echo "Lỗi prepare: " . $conn->error;
        return false;
    }

    // Mã hóa mật khẩu mới bằng MD5
    $hashedPassword = md5($newPassword);

    // Gọi hàm bind_param với biến trung gian
    $stmt->bind_param("si", $hashedPassword, $customerId);

    // Kiểm tra và thực hiện truy vấn
    if ($stmt->execute()) {
        return true; // Trả về true nếu cập nhật thành công
    } else {
        return false; // Trả về false nếu có lỗi xảy ra
    }
}

if (isset($_POST['update_password'])) {
    // Lấy dữ liệu từ form
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmNewPassword = $_POST['confirm_new_password'];

    // Gọi hàm để cập nhật mật khẩu
    if (updatePassword($conn, $_SESSION['customer_id'], $currentPassword, $newPassword, $confirmNewPassword)) {
        // Nếu cập nhật thành công, chuyển hướng người dùng đến trang thông tin cá nhân hoặc hiển thị thông báo
        $passwordChanged = true;
    } 
}
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
            flex-grow: 1; /* Input sẽ mở rộng để lấp đầy không gian còn lại */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
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
        background-color: #FA8072;
        border-color: #c3e6cb;
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
</head>
<body>
<body>
        <div class="bao container" style="max-width: 1200px;">
            <?php include('include/home/sidebar.php'); ?>
            <div class="chua col-md-9">
                <?php if ($passwordChanged): ?>
                    <div class="success">Đổi mật khẩu thành công!</div>
                <?php endif; ?>
                <?php if ($currentPasswordError): ?>
                    <div class="error">Mật khẩu hiện tại không đúng</div>
                <?php endif; ?>
                <?php if ($confirmPasswordError): ?>
                    <div class="error">Mật khẩu xác nhận không khớp</div>
                <?php endif; ?>
                <h2> Đổi Mật Khẩu</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="current_password">Mật khẩu hiện tại:</label>
                        <input type="password" name="current_password" id="current_password" required>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Mật khẩu mới:</label>
                        <input type="password" name="new_password" id="new_password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_new_password">Xác nhận mật khẩu mới:</label>
                        <input type="password" name="confirm_new_password" id="confirm_new_password" required>
                    </div>
                    <button type="submit" name="update_password">Đổi Mật Khẩu</button>
                </form>
                <?php if (!empty($passwordError)): ?>
                    <div class="error"><?php echo $passwordError; ?></div>
                <?php endif; ?>
            </div>
        </div>
    </body>
    
</body>
</section>
<?php include 'include/home/tuvan.php';?>
<?php include 'include/home/footer.php';?>

