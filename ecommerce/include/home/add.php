

<section id="phu_kien">
    <div class="container" style="max-width:1200px">
        <div class="row">
            <div class="col-md-12">
                <h2 >Gợi ý phụ kiện đi kèm</h2>
                <div class="row">
                    <?php
                    // Truy vấn SQL để lấy thông tin các sản phẩm có category là 'phụ kiện'
                    $kqua = mysqli_query($conn,"SELECT * FROM products where  Category like 'phụ kiện' limit 4");
                    if($kqua){
                        while($row=mysqli_fetch_array($kqua)){
                            $prodID = $row["Product_ID"];   
                            $discountPercentage = $row["discount"];
                            $salePrice = $row['Price'] - ($row['Price'] * $discountPercentage / 100);
                
                            echo '<ul class="col-sm-3">';
                            echo '<div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="product-details.php?prodid=' . $prodID . '" rel="bookmark" title="' . $row['Product'] . '">
                                                    <img src="reservation/img/products/' . $row['imgUrl'] . '" alt="' . $row['Product'] . '" title="' . $row['Product'] . '" width="150" height="150" />
                                                </a>
                                                <h2><a href="product-details.php?prodid=' . $prodID . '" rel="bookmark" title="' . $row['Product'] . '">' . $row['Product'] . '</a></h2>
                                                <div class="boc-gia">
                                                    <span class="gia gia-ban">' . number_format($salePrice * 25000) . '<small>đ</small></span>
                                                    <span class="gia gia-goc">' . number_format($row['Price'] * 25000) . '<small>đ</small></span>
                                                    <span class="giam-gia">-' . $discountPercentage . '%</span>
                                                </div>
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
</section>

<?php mysqli_close($conn); ?>

<style>
    .boc-gia {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin-top: 60px;
}

.gia-ban {
    font-weight: 700;
    font-size: 16px;
    line-height: 24px;
    color: #0066CC;
}

.gia-goc {
    color: #888;
    text-decoration: line-through;
}

.giam-gia {
    color: #888;
}
</style>
