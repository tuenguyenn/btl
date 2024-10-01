<?php
    include("db.php");

    $prodID = $_GET['prodid'];

    if (!empty($prodID)) {
        $sqlSelectSpecProd = mysqli_query($conn, "SELECT * FROM products WHERE Product_ID = '$prodID'") or die(mysqli_error($conn));
    
        $getProdInfo = mysqli_fetch_array($sqlSelectSpecProd);
        $prodname = $getProdInfo["Product"];
        $prodcat = $getProdInfo["Category"];
        $prodprice = $getProdInfo["Price"];
        $proddesc = $getProdInfo["Description"];
        $prodimage = $getProdInfo["imgUrl"];
        $discount = $getProdInfo["discount"];
        $oriPrice = $prodprice + ($prodprice * $discount / 100);
        $sqlSelectReviews = mysqli_query($conn, "SELECT * FROM reviews WHERE Product_ID = '$prodID' ORDER BY created_at DESC 
 limit 7 " ) or die(mysqli_error($conn));

        // Truy vấn để đếm số lượng đánh giá và tính số sao trung bình
        $sqlReviewStats = mysqli_query($conn, "SELECT COUNT(*) as review_count, AVG(rating) as average_rating FROM reviews WHERE Product_ID = '$prodID'") or die(mysqli_error($conn));
        $reviewStats = mysqli_fetch_array($sqlReviewStats);
        $reviewCount = $reviewStats['review_count'];
        $averageRating = round($reviewStats['average_rating'], 1); 
    }
?>
<?php include('include/home/header.php'); ?>

<section>
    <div class="container" style="max-width: 1200px;">
        <div class="row">
            <div class="product-details">
                <div class="col-sm-4">
                    <div class="view-product">
                        <img src="reservation/img/products/<?php echo $prodimage; ?>" />
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="product-information">
                        <h2 class="product"><?php echo $prodname; ?></h2>
                        <p><?php echo $prodcat; ?></p>
                        <p>
                            <span class="price"><?php echo str_replace(',', '.', number_format($prodprice * 25000)); ?>đ</span>
                        </p>
                        <?php if ($discount > 0) : ?>
                            <p>
                                <span class="oriprice"><?php echo str_replace(',', '.', number_format($oriPrice * 25000)); ?>đ</span>
                            </p>
                        <?php endif; ?>
                        <br>
                        <a class="btn btn-default add-to-cart" id="add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>

                        <?php if (!isset($_SESSION['customer_id'])) : ?>
                            <p class="info hidethis" style="color:red;"><strong>Vui lòng đăng nhập để mua sắm</strong></p>
                        <?php else : ?>
                            <p class="info hidethis" style="color:green;"><strong>Đã thêm vào giỏ</strong></p>
                        <?php endif; ?>
                        <p><b>Mô tả: </b><?php echo $proddesc; ?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="rate col-sm-12">
                <h4>ĐÁNH GIÁ SẢN PHẨM</h4>
                <?php
                if (mysqli_num_rows($sqlSelectReviews) > 0) {
                    while($review = mysqli_fetch_array($sqlSelectReviews)) {
                        $customer_id = $review['customer_id'];
                        $review_content = $review['review_content'];
                        $rating = $review['rating'];
                        $created_at = $review['created_at'];
                        
                        // Truy vấn để lấy tên khách hàng
                        $sqlSelectCustomer = mysqli_query($conn, "SELECT name FROM customer WHERE customer_id = '$customer_id'") or die(mysqli_error($conn));
                        $customer = mysqli_fetch_array($sqlSelectCustomer);
                        $customer_name = $customer['name'];
                ?>
                        <div class="review">
                            <p><strong><?php echo $customer_name; ?></strong> 
                            <span class="stars">
                                <?php for($i = 0; $i < 5; $i++): ?>
                                    <i class="fa fa-star <?php echo $i < $rating ? 'checked' : ''; ?>"></i>
                                <?php endfor; ?>
                            </span>
                            </p>
                            <p><?php echo $review_content; ?></p>
                            <p><small><?php echo $created_at; ?></small></p>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>Chưa có đánh giá nào cho sản phẩm này.</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <style>
      .price {
            color: #0066cc;
            font-weight: bold;
            font-size: 17px;
        }

        .oriprice {
            color: #aaaaaa;
            text-decoration: line-through;
        }
        
        .review {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        
        .review p {
            margin: 0;
            padding: 5px 0;
        }

        .stars i.checked {
            color: #FFC400;
        }
        
        .stars i {
            color: #ccc;
        }
        
        .rate {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h4 {
            color: #0066cc;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .product {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .product-name {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .review-summary {
            font-size: 16px;
            color: black;
            display: flex;
            align-items: center;
            gap: 5px;
            padding-bottom: 10px;
        }

        .stars {
            display: inline-block;
        }


    </style>
</section>
<?php include('include/home/add.php'); ?>
<?php include 'include/home/tuvan.php'; ?>
<?php include('include/home/footer.php'); ?>
