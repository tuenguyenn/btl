<?php
include 'db.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `customer` WHERE `cususer` = '$username' AND `cuspass` = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['customer_id'] = $row['customer_id'];
    header("Location: index.php");
} else {
    echo "Tên đăng nhập hoặc mật khẩu không chính xác.";
}

$conn->close();
?>
