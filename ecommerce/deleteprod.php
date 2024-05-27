<?php
session_start();
include('db.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE Product_ID='$id'";
    if(mysqli_query($conn, $sql)) {
        // Sản phẩm đã được xoá thành công
        $_SESSION['delete_success'] = true;
        header("Location: admin.php"); // Chuyển hướng về trang chính hoặc trang khác
        exit();
    } else {
        // Xảy ra lỗi khi xoá sản phẩm
        $_SESSION['delete_error'] = "Lỗi: " . mysqli_error($conn);
        header("Location: admin.php"); // Chuyển hướng về trang chính hoặc trang khác
        exit();
    }
}
?>
