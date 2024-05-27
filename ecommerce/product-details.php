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
    </style>
</section>
<?php include('include/home/add.php'); ?>
<?php include 'include/home/tuvan.php'; ?>
<?php include('include/home/footer.php'); ?>
