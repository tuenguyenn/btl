<?php include('include/admin/header.php'); ?>
<section>
		<div class="container" style="max-width:1200px">
			<div class="row">
                <?php include('include/admin/sidebar.php'); ?>
                <div class="col-sm-9 padding-right">
					<div class="features_items">
                        
                        <?php $item = $jim->getorder(); ?>
                        <?php while($row = mysqli_fetch_array($item)): ?>
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Thông tin đặt hàng</h3>
                                
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td class="text-right"><strong>Ảnh sản phẩm:</strong></td>
                                        <td><img src="reservation/img/products/<?php echo $row['imgUrl']; ?>" class="product-image" alt="Product Image"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Khách hàng :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['name'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Liên hệ :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['contact'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Địa chỉ :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['address'];?></strong></td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-right"><strong>Ngày đặt hàng :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['dateOrdered'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Giá :</strong></td>
                                        <td class="text-danger"><strong><?php echo number_format($row['amount']);?>đ</strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Sản phẩm:</strong></td>
                                        <td class="text-primary"><strong><?php echo $row['item'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Trạng thái:</strong></td>
                                        <td class="text-warning"><strong><?php echo $row['status']; ?></strong></td>
                                    </tr>
                                    <tr>
                                    <?php if($p == 'unconfirmed'){ ?>
                                        <td class="text-right" colspan="2"><a href="order.php?p=deliver&&id=<?php echo $row['id']; ?>" class="btn btn-warning">Giao hàng</a></td>
                                    <?php }else if($p == 'delivered'){?>
                                        <td class="text-right" colspan="2"><a href="order.php?p=paid&&id=<?php echo $row['id']; ?>" class="btn btn-warning">Đã thanh toán</a></td>
                                    <?php } ?>
                                        
                                    </tr>
                                </table>
                            </div>
                            </div>
                        
                        <?php endwhile; ?>
              </section>
<style>
    .col-sm-9 {
            background-color: #FFFFFF; 
            margin-top: 10px;
            padding-left: 5px;
            border: 1px solid  #ddd;
            border-radius: 10px;
        }
        .product-image {
            max-width: 200px; /* Điều chỉnh kích thước ảnh sản phẩm */
            height: auto; /* Đảm bảo ảnh không bị biến dạng */
            }
</style>



<?php include('include/admin/footer.php'); ?>