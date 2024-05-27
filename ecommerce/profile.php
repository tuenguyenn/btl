<?php
include('include/home/header.php'); 

$successMessage = false; // Khởi tạo biến để lưu trạng thái của thông báo thành công

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

// Hàm cập nhật thông tin cá nhân
function updateProfile($conn, $customerId, $name, $address, $phoneNumber) {
    $query = "UPDATE customer SET name=?, address=?, phone_number=? WHERE customer_id=?";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        return false;
    }

    $stmt->bind_param("sssi", $name, $address, $phoneNumber, $customerId);
    
    if ($stmt->execute()) {
        return true; // Trả về true nếu cập nhật thành công
    } else {
        return false; // Trả về false nếu có lỗi xảy ra
    }
}

// Kiểm tra xem người dùng đã gửi yêu cầu thay đổi thông tin cá nhân hay mật khẩu chưa
if (isset($_POST['update_profile'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phoneNumber = $_POST['phone_number'];

    if (updateProfile($conn, $_SESSION['customer_id'], $name, $address, $phoneNumber)) {
        $successMessage = true; // Đặt biến successMessage thành true nếu cập nhật thành công
    } else {
        echo '<div class="error">Có lỗi xảy ra khi cập nhật thông tin cá nhân.</div>';
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

<div class="bao container" style="max-width: 1200px;">
        <?php include('include/home/sidebar.php'); ?>
        <div class="chua col-md-9">
            <?php if ($successMessage): ?>
                    <div class="success">Cập nhật thông tin cá nhân thành công!</div>
                <?php endif; ?>
            <h2> Hồ sơ</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <!-- Các trường nhập liệu -->
                <div class="form-group">
                    <label for="name">Họ và tên:</label>
                    <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" name="address" id="address" value="<?php echo $row['address']; ?>"><br>
                </div>
                <div class="form-group">
                    <label for="phone_number">Số điện thoại:</label>
                    <input type="text" name="phone_number" id="phone_number" value="<?php echo $row['phone_number']; ?>"><br>
                </div>
                
                <!-- Nút Lưu -->
                <button type="submit" name="update_profile">Lưu</button>
                
                <!-- Hiển thị thông báo nếu cập nhật thành công -->
              
            </form>
        </div>
    </div>
</body>
</section>
<?php include 'include/home/tuvan.php';?>
<?php include 'include/home/footer.php';?>
