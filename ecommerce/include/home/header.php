<?php include('db.php'); ?>
<?php session_start(); ?>

<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
<?php
    $jim = new Data();
    $countproduct = $jim->countproduct();
    
    $cat = $jim->getcategory();
    class Data {
        function countproduct(){
            $count = 0;
            $cart = isset($_SESSION['cart']) ? $_SESSION['cart']:array();
			foreach ($cart as $row) {
				// Kiểm tra xem 'qty' có tồn tại trong $row không
				if (isset($row['qty']) && $row['qty'] != 0) {
					$count = $count + 1;
				}
			}
			return $count;
		}
        function getcategory(){
        	global $conn;
            $result = mysqli_query($conn,"SELECT * FROM category");
            return $result;
        }
    }


// Kiểm tra xem customer_id đã được lưu trong session hay chưa

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TAT Corp.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	
</head>

<body>
    <header id="header">
        <div class="header-bottom navbar navbar-inverse">
            <div class="container" style="max-width:1200px;">
                <div class="row">
                  
                        <div class="col-sm-10">
                            <div class="col-sm-7">
                                <div class="mainmenu ">
                                    <a class="navbar-brand" href="index.php" style="display: flex; ">
                                        <img class="logo" src="images/home/logo.jpg" alt="Bootstrap" width="50px" height="50px">
                                        <div class="vertical-line" style="padding-top: 4px;"></div>
                                    </a>
                                    <ul class="nav navbar-nav collapse navbar-collapse">
                                        <?php
                                        $cat = $jim->getcategory();
                                        while($row = mysqli_fetch_array($cat)){
                                            echo '<li><a href="category.php?filter='.$row['title'].'">'.$row['title'].'</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="search_box col-sm-5">               
                                        <form action="search.php" method="post">
                                            <input type="text" placeholder="Tìm kiếm" name="filter" />
                                        </form>
                            </div>

                            </div>
							<div class="login" style="gap:20px">                                      
							<li>
								<a href="cart.php" class="cart-link">
									<div class="cart-logo-wrapper">
										<i class="fa fa-shopping-cart cart-logo"></i>
										<span class="badge"></span>
									</div>
									<span class="cart-text">Giỏ hàng</span>
								</a>
							</li>



                                        <?php
                                            if(isset($_SESSION['name'])) {
                                                // Nếu đã đăng nhập, hiển thị tên người dùng và dropdown menu
                                                echo '
                                                    <div class="dropdown">
                                                        <li><a class="dropbtn" href="#">' . $_SESSION['name'] . ' <i class="fa fa-caret-down"></i></a></li>
                                                        <div class="dropdown-content" style="display: none;">
															<a href="profile.php"> Tài khoản</a>
                                                            <a href="view_orders.php">Đơn hàng</a>
                                                            <a href="logout.php">Đăng xuất</a>
                                                        </div>
                                                    </div>
                                                ';
                                            } else {
                                                // Nếu chưa đăng nhập, hiển thị liên kết đăng nhập
                                                echo '<li><a href="cuslogin.php"><i class="fa fa-user"></i></a></li>';
                                            }
                                        ?>
                         	</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".dropbtn, .fa-caret-down").click(function(){
                $(".dropdown-content").toggle();
            });

            // Đóng dropdown nếu người dùng click bên ngoài
            $(document).click(function(e) {
                if (!$(e.target).closest(".dropdown").length) {
                    $(".dropdown-content").hide();
                }
            });
        });
    </script>
    <style>
        .search_box{
            padding-top: 5px;
        }
    </style>
</body>
	
    