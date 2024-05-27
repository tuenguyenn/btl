    <?php include 'include/home/header.php'; ?>

    <section>
        <!-- Tạo các liên kết hoặc nút để người dùng có thể chọn trạng thái -->
        <div class="container" style="max-width:1200px;">
            <?php include 'include/home/sidebar.php'; ?>
            <div class="option col-md-9">
                <div class="status" style="width:100%">
                    <a href="view_orders.php?status=all" class="status-link <?php if(!isset($_GET['status']) || $_GET['status'] == 'all') echo 'selected'; ?>">Tất cả</a>
                    <a href="view_orders.php?status=unconfirmed" class="status-link <?php if(isset($_GET['status']) && $_GET['status'] == 'unconfirmed') echo 'selected'; ?>">Chờ xác nhận</a>
                    <a href="view_orders.php?status=delivered" class="status-link <?php if(isset($_GET['status']) && $_GET['status'] == 'delivered') echo 'selected'; ?>">Đang giao</a> 
                    <a href="view_orders.php?status=confirmed" class="status-link <?php if(isset($_GET['status']) && $_GET['status'] == 'confirmed') echo 'selected'; ?>">Thành công</a>
                    <a href="view_orders.php?status=canceled" class="status-link <?php if(isset($_GET['status']) && $_GET['status'] == 'canceled') echo 'selected'; ?>">Đã huỷ</a>
                </div>
            </div>
            <div class="order-list col-md-9">
                <?php
                include 'db.php';
                if (isset($_SESSION['customer_id'])) {
                    $customer_id = $_SESSION['customer_id'];

                    // Thay đổi điều kiện trong truy vấn SQL nếu người dùng chọn xem tất cả đơn hàng
                    if (isset($_GET['status']) && $_GET['status'] != 'all') {
                        $status = $_GET['status'];
                        $sql = "SELECT * FROM `order` WHERE `customer_id` = $customer_id AND `status` = '$status' ORDER BY STR_TO_DATE(dateOrdered, '%m/%d/%y %h:%i:%s %p') DESC"; // Sắp xếp theo ngày đặt hàng giảm dần
                    } else {
                        $sql = "SELECT * FROM `order` WHERE `customer_id` = $customer_id ORDER BY STR_TO_DATE(dateOrdered, '%m/%d/%y %h:%i:%s %p') DESC"; // Sắp xếp theo ngày đặt hàng giảm dần
                    }

                    $result = $conn->query($sql);
                    $order_count = 1; // Biến đếm đơn hàng

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    ?>
                            <div class="order order-<?php echo $order_count; ?>">
                                <div class="product-info">
                                    <img src="reservation/img/products/<?php echo $row["imgUrl"]; ?>" />
                                    <div class="product-details">
                                        <h4><?php echo $row["item"]  ?></h4>
                                    </div>
                                    <p class="price" style="color: red;"><?php echo number_format($row["amount"]); ?> đ</p>
                                </div>
                                <div class="user-actions">
                                <div style="display: flex; flex-direction: column ;">
                                     <?php
                                        if ($row["status"] == 'unconfirmed') {
                                            echo "CHỜ XÁC NHÂN";
                                        } elseif ($row["status"] == 'confirmed') {
                                            echo "CHỜ GIAO HÀNG";
                                        } elseif ($row["status"] == 'delivered') {
                                            echo "ĐANG VẬN CHUYỂN";
                                        } elseif ($row["status"] == 'canceled') {
                                            echo "ĐÃ HUỶ";
                                        } else {
                                            echo "Không xác định";
                                        }
                                    ?></p>
                                    <p>Ngày đặt: <?php echo $row["dateOrdered"]; ?></p>
                                </div>
                                        <div>
                                        <?php
                                    if ($row["status"] == 'unconfirmed') {
                    ?>
                                       <div style="float: right;">
                                            <a href="#" class="btn cancel" onclick="confirmCancel(<?php echo $row['id']; ?>)">Huỷ</a>
                                            <a href="chitietorder.php?id=<?php echo $row['id']; ?>" class="btn">Xem đơn hàng</a>
                                        </div>
                    <?php
                                    } elseif ($row["status"] == 'confirmed') {
                    ?>
                                        <div style="float: right;">
                                            <a href="cart/data.php?q=voteorder&id=<?php echo $row['id']; ?>" class="btn vote">Đánh giá</a>
                                            <a href="chitietorder.php?id=<?php echo $row['id']; ?>" class="btn ">Xem đơn hàng</a>
                                        </div>
                    <?php
                                    } elseif ($row["status"] == 'canceled') {
                    ?>
                                        <div style="float: right;">
                                            <a href="" class="btn vote">Mua lại</a>
                                            <a href="chitietorder.php?id=<?php echo $row['id']; ?>" class="btn ">Xem đơn hàng</a>
                                        </div>
                    <?php
                                    } else {
                    ?>
                                        <div style="float: right;">
                                            <a href="" class="btn vote">Mua lại</a>
                                            <a href="chitietorder.php?id=<?php echo $row['id']; ?>" class="btn ">Xem đơn hàng</a>
                                        </div>
                    <?php
                                    }
                    ?>
                                        </div>
                                </div>
                            </div>
                    <?php
                            $order_count++; // Tăng biến đếm
                        }
                    
                    
                    
                    } else {
                ?>
                        <div class="col-md-12">
                            <img src="images/home/order.png" alt="" class="img-responsive" style="display: block; margin: 0 auto;">
                        </div>
                        <div class="alert alert-danger text-center">    
                            <p>Chưa có đơn hàng</p>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>Bạn chưa đăng nhập.</p>";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </section>
    <style>
        .selected {
            color: #0066CC;
            border-bottom: 2px solid #0066CC;
        }

        .status {
            text-align: center;
            font-size: large;
        }

        .status a {
            flex: 1;
            padding: 10px 40px;
            text-decoration: none;
            display: inline-block;
        }

        .status a:hover {
            color: #0066CC;
            border-bottom: 2px solid #0066CC;
        }

        .option {
            display: flex;
            flex-direction: column;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .order-list {
            display: flex;
            flex-direction: column;
            padding: 20px;
            border-radius: 8px;
        }

        .order {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            box-shadow: gray;
            margin-bottom: 20px;
        }

        .product-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-details {
            margin-left: 10px;
            padding-top: 10px;
        }

        .product-info img {
            max-width: 100px;
        }

        .price {
            font-size: 20px;
            color: #d9534f;
            margin-left: auto; /* Di chuyển giá sang phải */
        }
        .user-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
        border-top: 1px solid #aaaaaa;
    }
        .user-actions > div {
        display: flex;
    }
    .btn {
        height: 40px;
        margin: 10px 5px;
        text-align: center;
        background-color: #0066cc;
        text-decoration: none;
        color: white;
        border-radius: 4px;
    }
        

        .btn:hover{
            opacity: 0.9;
            color: white;
        }

        .btn-success {
            background-color: #5cb85c;
        }

        .btn-success:hover {
            background-color: #4cae4c;
        }

   

        .img-responsive {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
        }

    </style>
    <script>
    function confirmCancel(orderId) {
        var confirmCancel = confirm("Bạn có chắc muốn huỷ đơn hàng này?");
        if (confirmCancel) {
            window.location.href = "cart/data.php?q=cancelorder&id=" + orderId;
        }
    }
</script>
    <?php include 'include/home/tuvan.php';?>


    <?php include 'include/home/footer.php'; ?>
