<?php include('include/home/header.php')?>

<section id="cart">
    <div class="container" style="max-width:1200px;">
        <div class="row" >
            <?php if(isset($_SESSION['customer_id'])): ?>
                <?php 
                include('db.php');
                $customer_id = $_SESSION['customer_id'];
                $query = "SELECT * FROM cart WHERE customer_id = $customer_id";
                $result = mysqli_query($conn, $query);
                $total = 0;
                // Kiểm tra xem có sản phẩm nào trong giỏ hàng hay không
                if(mysqli_num_rows($result) > 0) { ?>
                
                    <div class="infor col-md-9">
                        <div class="cart-items">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                                            <?php if ($row['Quantity'] > 0): ?>
                                                <?php $itotal = $row['Price'] * $row['Quantity']; ?>
                                                <tr>
                                                    <td><img src="reservation/img/products/<?php echo $row['imgUrl']; ?>" alt="<?php echo $row['Product']; ?>" class="product-image" style="width: 100px; height: 100px;"></td>
                                                    <td><h3><?php echo $row['Product'];?></h3></td>
                                                    <td>
                                                        <form action="cart/data.php?q=updatecart&id=<?php echo $row['ID'];?>" method="POST">
                                                            <input type="number" name="qty" value="<?php echo $row['Quantity'];?>" min="0" style="width:50px;"/>
                                                            <button type="submit" class="capnhat">Cập nhật</button>
                                                        </form>
                                                    </td>
                                                    <td class="price"><?php echo number_format($itotal); ?>đ</td>
                                                    <td><a href="cart/data.php?q=removefromcart&id=<?php echo $row['ID'];?>"><img src="https://shopdunk.com/images/uploaded-source/icon/remove-cart.png" alt=""></a></td>
                                                </tr>
                                                <?php $total += $itotal; 
                                                     $_SESSION['total'] = $total;?>

                                            <?php endif;?>
                                        <?php endwhile; ?> 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" style="text-align: right;">
                                                <a href="cart/data.php?q=emptycart" class="nut text-center">Xoá tất cả</a>
                                                <a href="index.php" class="nut text-center">Tiếp tục mua sắm</a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mua col-md-3">
                        <!-- Discount Code Form -->
                        <div class="discount-container">
                            <label for="discount-code"></label>
                            <input type="text" id="discount-code" class="discount-input" placeholder="Mã voucher"/>
                            <button type="button" class="apdung" onclick="applyDiscount()">Áp dụng</button>
                        </div>

                        <div class="gia-info">
                            <div class="price-row">
                                <h4 class="nabel">Giá:</h4>
                                <span class="value price" id="total-price"><?php echo number_format($total); ?>đ</span>
                            </div>
                            <!-- Display Discount and Updated Total -->
                            <div id="discount-info" class="price-row" style="display: none;">
                                <h4 class="nabel">Voucher:</h4>
                                <span class="value discount" id="discount-amount">0đ</span>
                            </div>
                            <div class="price-row">
                                <h4 class="nabel">Tổng:</h4>
                                <span class="value total" id="discounted-total"><?php echo number_format($total); ?>đ</span>
                            </div>
                        </div>
                        <hr style="color:#aaaaaa">
                        <div style="text-align:center">
                            <a href="#" class="dat text-center" data-toggle="modal" data-target="#checkout_modal">Đặt hàng</a>

                        </div>

                    </div>
                    <?php include('include/home/add.php')?>

                <?php } else { ?>
                    <div class="col-md-12" style="margin-top: 50px;">
                        <img src="images/home/cart.png" alt="" class="img-responsive" style="display: block; margin: 0 auto;">
                        <div class="alert alert-danger text-center">
                            <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
                            <a href="index.php" class="nut">Tiếp tục mua sắm</a>
                        </div>
                    </div>
                <?php } ?>
               
            <?php else: ?>
                <div class="col-md-12">
                    <div class="alert alert-danger text-center" >
                        <p style="font-size: 30px;">Vui lòng đăng nhập...</p>
                        <a href="cuslogin.php" class="btn btn-primary">Đăng nhập</a>
                        <div style="padding: 20px;"><p>Chưa có tài khoản? <a href="signup.php" class="btn btn-secondary">Đăng ký ngay</a>.</p></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <style>
        .infor, .mua {
            background-color: #fff;
            border-radius: 8px;
        }
        section {
            margin-top: 20px;
        }
        .mua {
            margin-left: 20px;
            height: 300px;
        }
        .infor {
            margin-left: 20px;
            width: 820px;
        }
        .capnhat {
            padding: 7px 7px;
            text-decoration: none;
            color: #fff;
            background-color: #0066cc;
            border: 1px solid #0066CC;
            transition: background-color 0.3s ease;
            display: inline-block;
            font-size: 10px;
        }
        .nut {
            width: 180px;
            font-size: 15px;
        }
        .dat {
            width: 260px;
            background-color: #0066cc;
            border-radius:8px;
            padding: 12px 10px;
            text-decoration: none;
            color: #fff;
            transition: background-color 0.3s ease;
            display: inline-block;
            border: none;
            white-space: nowrap;
            margin-top: 10px;
        }
        .dat:hover{
            opacity: 0.9;
            color: #fff;
        }
        .discount-container {
            display: flex;
            align-items: center;
            padding-top: 20px;
            margin-bottom: 10px;
        }
        .discount-input {
            flex: 1;
            padding: 9px;
            border-radius: 8px 0 0 8px;
            border: 1px solid #EBEBEB;
        }
        .apdung {
            background-color: #aaaaaa;
            border-radius: 0 8px 8px 0;
            padding: 10px 10px;
            text-decoration: none;
            color: #fff;
            transition: background-color 0.3s ease;
            display: inline-block;
            border: none;
            white-space: nowrap;
        }
        .gia-info {
            margin-bottom: 10px;
            padding-top: 20px;
        }
        .price-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            padding-left: 10px;
        }
        .price-row .nabel {
            color: #1d1d1f;
            font-size: 15px;
        }
        .price-row .value {
            color: #1d1d1f;
            font-size: 15px;
        }
        .price-row .total {
            color: #0066cc;
            font-weight: bold;
            font-size: 17px;
        }
        .price-row .discount {
            color: #ff0000;
            font-size: 15px;
        }
    </style>
    <script>
        function applyDiscount() {
            var discountCode = document.getElementById('discount-code').value;
            var total = <?php echo $total; ?>;
            if (discountCode.toLowerCase() === 'giamgia') {
                var discountAmount = total * 0.10;
                var discountedTotal = total - discountAmount;
                document.getElementById('discount-amount').innerText = '-' + discountAmount.toLocaleString('vi-VN') + 'đ';
                document.getElementById('discounted-total').innerText = discountedTotal.toLocaleString('vi-VN') + 'đ';
                document.getElementById('discount-info').style.display = 'flex';
            } else {
                alert('Mã giảm giá không hợp lệ.');
                document.getElementById('discount-info').style.display = 'none';
            }
        }
    </script>
</section>

<?php include('include/home/modal.php')?>

<?php include('include/home/footer.php')?>
