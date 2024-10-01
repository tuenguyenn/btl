<?php include('include/home/header.php'); ?>

<?php
// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['customer_id'])) {
    echo "Bạn chưa đăng nhập.";
    exit;
}

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $query = "SELECT * FROM `order` WHERE id = $order_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $order = mysqli_fetch_assoc($result);
    } else {
        echo "Lỗi: " . mysqli_error($conn);
        exit;
    }
} else {
    echo "Không có đơn hàng nào được chọn.";
    exit;
}
?>

<section class="order-details-section">
    <div class="container" style="max-width:1200px;">
        <div class="row">
            <?php include('include/home/sidebar.php'); ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Chi tiết đơn hàng</h2>
                    <div class="col-sm-12">
                        <div class="panel order-details-panel">
                            <div class="panel-body">
                                <table class="table order-details-table">
                                    <!-- Product Image -->
                                    <tr>
                                        <td class="text-right"><strong>Ảnh sản phẩm:</strong></td>
                                        <td><img src="reservation/img/products/<?php echo htmlspecialchars($order['imgUrl']); ?>" class="product-image" alt="Product Image"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Khách hàng:</strong></td>
                                        <td class="text-info"><strong><?php echo htmlspecialchars($order['name']); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Liên hệ:</strong></td>
                                        <td class="text-info"><strong><?php echo htmlspecialchars($order['contact']); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Địa chỉ:</strong></td>
                                        <td class="text-info"><strong><?php echo htmlspecialchars($order['address']); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Ngày đặt hàng:</strong></td>
                                        <td class="text-info"><strong><?php echo htmlspecialchars($order['dateOrdered']); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Giá:</strong></td>
                                        <td class="text-danger"><strong><?php echo number_format($order['amount']); ?>đ</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Sản phẩm:</strong></td>
                                        <td class="text-primary"><strong><?php echo htmlspecialchars($order['item']); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Trạng thái:</strong></td>
                                        <td class="text-warning"><strong><?php echo htmlspecialchars($order['status']); ?></strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'include/home/tuvan.php';?>
<?php include('include/home/footer.php'); ?>

<style>
/* CSS mới cho trang chi tiết đơn hàng */
.order-details-panel {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 15px;
    background-color: #f9f9f9;
}

.table {
    width: 100%;
    margin: 0 auto;
    border-collapse: collapse;
}

.table td {
    padding: 10px;
    vertical-align: middle;
}

.product-image {
    max-width: 200px; /* Điều chỉnh kích thước ảnh sản phẩm */
    height: auto; /* Đảm bảo ảnh không bị biến dạng */
}

.text-right {
    text-align: right;
}


.text-danger {
    color: #dc3545;
}

.text-primary {
    color: #007bff;
}

.text-warning {
    color: #ffc107;
}
</style>
