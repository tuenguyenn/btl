
<?php include('include\home\header.php') ?>

<section>
	<div class="container" style="max-width:1200px">
		<div class="row">
		    <?php if(isset($_POST['filter'])) {
                            // Nếu có, gán giá trị cho biến $filter
                            $filter = $_POST['filter'];};?>     
    		<div class="col-sm-12">
				<div class="features_items">
					<h2 class="text-center" style="font-size: 20px;" >Kết quả tìm kiếm cho <strong><?php echo $filter;?></strong></h2>
					<?php											
						$result = mysqli_query($conn,"SELECT * FROM products where Product like '%$filter%' or Description like '%$filter%' or Category like '%$filter%'");
						if($result){				
						while($row=mysqli_fetch_array($result)){
							$prodID = $row["Product_ID"];   

							$discountPercentage = $row["discount"];
							$salePrice = $row['Price'] + ($row['Price'] * $discountPercentage / 100);
				
							echo '<ul class="col-sm-3">';
							echo '<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<a href="product-details.php?prodid=' . $prodID . '" rel="bookmark" title="' . $row['Product'] . '">
													<img src="reservation/img/products/' . $row['imgUrl'] . '" alt="' . $row['Product'] . '" title="' . $row['Product'] . '" width="150" height="150" />
												</a>
												<h2><a href="product-details.php?prodid=' . $prodID . '" rel="bookmark" title="' . $row['Product'] . '">' . $row['Product'] . '</a></h2>
												<div class="price-wrapper">';
				
							if ($discountPercentage > 0) {
								echo '<span class="price sale-price">' . number_format($row['Price'] * 25000) . '<small>đ</small></span>
									  <span class="price original-price">' . number_format($salePrice * 25000) . '<small>đ</small></span>
									  <span class="discount">-' . $discountPercentage . '%</span>';
							} else {
								echo '<span class="sale-price">' . number_format($row['Price'] * 25000) . '<small>đ</small></span>';
							}
				
							echo '          </div>
											</div>
										</div>
									</div>';
							echo '</ul>';
						}
						}
						?>
					</div>
         	</div>
		</div>
	</div>
	<style>
		.price-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin-top: 60px;
}

.chat-form {
        display: none; /* Ẩn form trò chuyện ban đầu */
        position: fixed;
        bottom: 90px; /* Khoảng cách từ phía dưới của trang */
        right: 20px; /* Khoảng cách từ phía phải của trang */
        z-index: 9999;
        background-color: #fff;
        padding: 20px;
        border: 1px solid #ccc;
    }
.sale-price {
    font-weight: 700;
    font-size: 16px;
    line-height: 24px;
    color: #0066CC;
}

.original-price {
    color: #888;
    text-decoration: line-through;
}

.discount {
    color: #888;
}

	</style>
</section>

<?php include 'include/home/tuvan.php';?>

<?php include('include/home/footer.php'); ?>