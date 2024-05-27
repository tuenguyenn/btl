<?php
include 'db.php';

// Kiểm tra nếu dữ liệu được gửi từ form thêm địa chỉ mới
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_new_address'])) {
    // Lấy customer_id của người dùng hiện tại từ session
    $customer_id = $_SESSION['customer_id'];
    
    // Lấy thông tin địa chỉ mới từ form
    $new_name = $_POST['new_name'];
    $new_address = $_POST['new_address'];
    $new_phone_number = $_POST['new_phone_number'];
    
    // Thực hiện truy vấn để thêm địa chỉ mới vào cơ sở dữ liệu
    $sql = "INSERT INTO customer_address (customer_id, name, address, phone_number) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $customer_id, $new_name, $new_address, $new_phone_number);
    
    // Kiểm tra và thực hiện truy vấn
    if ($stmt->execute()) {
        // Địa chỉ mới đã được thêm thành công
        echo "Địa chỉ mới đã được thêm thành công!";
    } else {
        // Xảy ra lỗi khi thêm địa chỉ mới
        echo "Có lỗi xảy ra khi thêm địa chỉ mới: " . $conn->error;
    }
}
?>
