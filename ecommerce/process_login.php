<?php
include 'db.php';
session_start();

// Lấy thông tin đăng nhập từ form
$username = $_POST['username'];
$password = $_POST['password'];

// Kiểm tra thông tin đăng nhập
$sql = "SELECT * FROM `customer` WHERE `cususer` = '$username' AND `cuspass` = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Đăng nhập thành công
    $row = $result->fetch_assoc();
    $_SESSION['customer_id'] = $row['customer_id'];
    // Chuyển hướng đến trang chủ
    header("Location: index.php");
} else {
    // Đăng nhập thất bại
    echo "Tên đăng nhập hoặc mật khẩu không chính xác.";
}

$conn->close();
?>
