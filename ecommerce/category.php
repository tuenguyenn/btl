
<?php include 'include/home/header.php'; ?>

<section>
    <div class="container" style="max-width:1200px">
        <div class="row">
            <?php $filter = isset($_GET['filter']) ? $_GET['filter'] : '';?>

            <?php
                // Xác định banner dựa trên sản phẩm được tìm kiếm
                $banner_src = '';
                if ($filter == 'Iphone') {
                    $banner_src = 'https://shopdunk.com/images/uploaded/banner/banner%202024/Thang_4/15t4dm.png';
                } elseif ($filter == 'Ipad') {
                    $banner_src = 'https://shopdunk.com/images/uploaded/banner/banner%202024/Thang_4/banner%20ipad%20gen%2010%20T4_Danh%20m%E1%BB%A5c.jpg';
                } elseif ($filter == 'Mac') {
                    $banner_src = 'https://shopdunk.com/images/uploaded/banner/banner%202024/Thang_4/airm1t4dm.png';
                } elseif ($filter == 'Watch') {
                    $banner_src = 'https://shopdunk.com/images/uploaded/banner/banner%202024/Thang_4/banner%20apple%20watch%209%20T4_Danh%20m%E1%BB%A5c.jpg';
                } elseif ($filter == 'Máy cũ') {
                    $banner_src = 'https://shopdunk.com/images/uploaded/banner/banner%202024/thang_3/1200x400%20(23)-Copy-1.png';
                } elseif ($filter == 'Phụ kiện') {
                    $banner_src = 'https://shopdunk.com/images/uploaded/banner/banner%202024/Thang_4/banner%20ph%E1%BB%A5%20ki%E1%BB%87n%20T4_Danh%20m%E1%BB%A5c.jpg';
                } 
            ?>
            <div class="col-sm-12" style="padding:10px;">
				<h2 class="text-center"><strong><?php echo $filter;?></strong></h2>
                <a href="category.php?filter=<?php echo $filter; ?>"><img src="<?php echo $banner_src; ?>" alt="" class="img-responsive"/></a>
            </div>

            <div class="col-sm-12" >
				<div class="features_items">
					<div class="row " style="margin-bottom: 20px; text-align:right ; padding-right:20px">
							<button onclick="sortProducts('asc')" class="nut sort-button">Thấp đến cao</button>
							<button onclick="sortProducts('desc')" class="nut sort-button">Cao đến thấp</button>
							</div>
						
						<?php
							$result = mysqli_query($conn,"SELECT * FROM products where  Category like '%$filter%'");
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
<script>
    function sortProducts(order) {
        var productsContainer = document.querySelector('.features_items');
        var products = Array.from(productsContainer.querySelectorAll('.col-sm-3'));
        products.sort(function(a, b) {
            var salePriceA = parseFloat(a.querySelector('.sale-price').textContent.replace('đ', '').replace(',', ''));
            var salePriceB = parseFloat(b.querySelector('.sale-price').textContent.replace('đ', '').replace(',', ''));
            if (order === 'asc') {
                return salePriceA - salePriceB;
            } else {
                return salePriceB - salePriceA;
            }
        });
        products.forEach(function(product) {
            productsContainer.appendChild(product);
        });
    }
</script>

</section>
<?php include 'include/home/tuvan.php';?>


<?php include('include/home/footer.php'); ?>
