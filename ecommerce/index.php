<?php 
include 'include/home/header.php'; // Bạn có thể thay đổi đường dẫn nếu cần
?>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
<div class="slider">
    <div><a href="index.php"><img src="images/home/header.png" alt="" class="img-responsive"/></a></div>
    <div><a href="index.php"><img src="images/home/banner2.png" alt="" class="img-responsive"/></a></div>
    <div><a href="index.php"><img src="images/home/banner4.png" alt="" class="img-responsive"/></a></div>
</div>

<!-- Thêm link JavaScript của jQuery và thư viện Slick Slider -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script>
    // Khởi tạo Slick Slider
    $(document).ready(function(){
        $('.slider').slick({
            autoplay: true, 
            autoplaySpeed: 3000, 
            dots: true, 
            arrows: true 
        });
    });
</script>

<?php
// Định nghĩa hàm displayProducts
function displayProducts($category, $conn) {
    $query = "SELECT * FROM products WHERE Category = '$category' LIMIT 4";
    $result = mysqli_query($conn, $query);
    if ($result) {
        while ($row = mysqli_fetch_array($result)) {
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
}

// Định nghĩa hàm displayCategory
function displayCategory($category, $label, $conn) {
    echo '<h2 class="text-center" style="padding-bottom: 20px;"><strong>' . $label . '</strong></h2>';
    echo '<div class="container" style="max-width:1200px;">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="row justify-content-center">';
    displayProducts($category, $conn);
    echo '</div>
                    <div class="text-center">
                        <a href="category.php?filter=' . urlencode($category) . '" class="nut">Xem tất cả ' . $label . '</a>
                    </div>
                </div>
            </div>
        </div>';
}

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}

$categories = array(
    "iphone" => "iPhone",
    "Ipad" => "iPad",
    "Watch" => "Watch",
    "Mac" => "Mac",
    "Phụ kiện" => "Phụ kiện"
);

foreach ($categories as $category => $label) {
    displayCategory($category, $label, $conn);
}

mysqli_close($conn); // Đóng kết nối CSDL

?>



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

<?php include 'include/home/tuvan.php';?>


<?php include 'include/home/footer.php';?>
