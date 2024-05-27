<?php include('include/admin/header.php'); ?>
<section>
    <div class="container" style="max-width:1200px;">
        <div class="row">
            <?php include('include/admin/sidebar.php'); ?>  
            <div class="col-sm-9 padding-right">
                <div class="features_ordersinfors">
                    <h2 class="title text-center">Đơn hàng</h2>
                    <div class="option col-md-12">
                        <div class="status" style="width:100%">
                            <a href="#data1" class="status-link selected" role="tab" data-toggle="tab">Chờ xác nhận</a>
                            <a href="#data2" class="status-link" role="tab" data-toggle="tab">Đang giao</a> 
                            <a href="#data3" class="status-link" role="tab" data-toggle="tab">Thành công</a>
                            <a href="#data4" class="status-link" role="tab" data-toggle="tab">Đã huỷ</a>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane active" id="data1">
                            <table class="table table-bordered">
                                <thead class="bg-primary">
                                    <th>Ngày đặt hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Sản phẩm</th>
                                    <th>Thao tác</th>
                                </thead>
                                <?php $unpaid = $jim->getunpaidorders(); ?>
                                <?php while($row = mysqli_fetch_array($unpaid)){ ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['dateOrdered']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td class="text-center"><a href="ordersinfor.php?id=<?php echo $row['id']?>&&p=unconfirmed" target="_blank"><i class="fa fa-external-link"></i>Xem sản phẩm</a></td>
                                        <td class="text-center"><a href="order.php?p=deliver&&id=<?php echo $row['id']; ?>" class="btn btn-warning">Giao hàng</a></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="tab-pane" id="data2">
                            <table class="table table-bordered">
                                <thead class="bg-primary">
                                    <th>Ngày giao</th>
                                    <th>Khách hàng</th>
                                    <th>Sản Phẩm</th>
                                    <th>Thao tác</th>
                                </thead>
                                <?php $delivered = $jim->getdeliveredorders(); ?>
                                <?php while($row = mysqli_fetch_array($delivered)){ ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['dateDelivered']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td class="text-center"><a href="ordersinfor.php?id=<?php echo $row['id']?>&&p=delivered" target="_blank"><i class="fa fa-external-link"></i>Xem sản phẩm</a></td>
                                        <td class="text-center"><a href="order.php?p=paid&&id=<?php echo $row['id']; ?>" class="btn btn-warning">Đã thanh toán</a></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="tab-pane" id="data3">
                            <table class="table table-bordered">
                                <thead class="bg-primary">
                                    <th>Ngày thanh toán</th>
                                    <th>Khách hàng</th>
                                    <th>Sản phẩm</th>
                                </thead>
                                <?php $paid = $jim->getpaidorders(); ?>
                                <?php while($row = mysqli_fetch_array($paid)){ ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['dateDelivered']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td class="text-center"><a href="ordersinfor.php?id=<?php echo $row['id']?>" target="_blank"><i class="fa fa-external-link"></i> Xem sản phẩm</a></td>                    
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="tab-pane" id="data4">
                            <table class="table table-bordered">
                                <thead class="bg-primary">
                                    <th>Ngày đặt hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Sản phẩm</th>
                                </thead>
                                <?php $paid = $jim->getcancelorders(); ?>
                                <?php while($row = mysqli_fetch_array($paid)){ ?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['dateOrdered']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td class="text-center"><a href="ordersinfor.php?id=<?php echo $row['id']?>" target="_blank"><i class="fa fa-external-link"></i> Xem sản phẩm</a></td>                    
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>

                    <style>
                        .selected {
                            border-bottom: 2px solid #0066CC; /* Đường viền màu xanh dưới chân status được chọn */
                            color: #0066CC;
                        }

                        .status {
                            text-align: center;
                            font-size: large;
                        }

                        .status a {
                            flex: 1;
                            padding: 10px 40px;
                            text-decoration: none;
                           
                            display: inline-block; /* Hiển thị như một phần tử inline-block để nút không chiếm toàn bộ chiều rộng của dòng */
                            transition: color 0.3s, border-bottom 0.3s; /* Thêm hiệu ứng chuyển đổi */
                        }

                        .status a:hover {
                            color: #0066CC; /* Thay đổi màu khi hover */
                            border-bottom: 2px solid #0066CC; /* Thêm đường viền dưới khi hover */
                        }

                        .option {
                            display: flex;
                            flex-direction: column;
                            background-color: white;
                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Thêm bóng đổ nhẹ */
                            border-radius: 8px; /* Thêm bo góc */
                        }
                    </style>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var statusLinks = document.querySelectorAll('.status-link');
                            statusLinks.forEach(function(link) {
                                link.addEventListener('click', function() {
                                    statusLinks.forEach(function(link) {
                                        link.classList.remove('selected');
                                    });
                                    this.classList.add('selected');
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('include/admin/footer.php'); ?>
