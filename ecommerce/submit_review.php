<?php
include('db.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $customer_id = $_POST['customer_id'];
    $review_content = $_POST['review_content'];
    $rating = $_POST['rating'];

    // Truy vấn để lấy Product_ID từ tên sản phẩm
    $sql_get_product_id = "SELECT Product_ID FROM products WHERE Product like ?";
    $stmt_get_product_id = $conn->prepare($sql_get_product_id);
    $stmt_get_product_id->bind_param("s", $product_name);
    $stmt_get_product_id->execute();
    $stmt_get_product_id->bind_result($product_id);
    $stmt_get_product_id->fetch();
    $stmt_get_product_id->close();

    if ($product_id) {
        // Chèn đánh giá vào bảng reviews
        $sql_insert_review = "INSERT INTO reviews (product_id, customer_id, review_content, rating) VALUES (?, ?, ?, ?)";
        $stmt_insert_review = $conn->prepare($sql_insert_review);
        $stmt_insert_review->bind_param("iisi", $product_id, $customer_id, $review_content, $rating);

        if ($stmt_insert_review->execute()) {
            // Cập nhật cột has_rated trong bảng products
            $sql_update_has_rated = "UPDATE reviews SET has_rated = TRUE WHERE Product_ID = ?";
            $stmt_update_has_rated = $conn->prepare($sql_update_has_rated);
            $stmt_update_has_rated->bind_param("i", $product_id);
            $stmt_update_has_rated->execute();
            $stmt_update_has_rated->close();
            
            // Đánh giá đã được gửi thành công, thông báo và chuyển hướng về trang view_order.php
            echo '<script>alert("Đánh giá của bạn đã được gửi!"); window.location.href = "view_orders.php?status=confirmed";</script>';
        } else {
            echo "Có lỗi xảy ra: " . $conn->error;
        }

        $stmt_insert_review->close();
    } else {
        echo "Không tìm thấy sản phẩm.";
    }

    $conn->close();
}
?>
