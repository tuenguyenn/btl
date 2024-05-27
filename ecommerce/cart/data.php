<?php 
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh'); 
ini_set('display_errors', 1);
$jim = new Shopping();
$q = $_GET['q'];


    


if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array(); 
    $_SESSION['proID'] = 0;
}
if($q == 'addtocart'){
    $product = $_POST['product'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $jim->addtocart($product,$price,$qty);
}else if($q == 'emptycart'){
   $jim->emptycart();
}else if($q == 'removefromcart'){
    $id = $_GET['id'];
    $jim->removefromcart($id);
}else if($q == 'updatecart'){
    $id = $_GET['id'];
    $qty = $_POST['qty'];
    $product = $_GET['product'];
    $jim->updatecart($id,$qty,$product);
}else if($q == 'countcart'){  
    $jim->countcart();
}else if($q == 'countorder'){
    $jim->countorder();
}else if($q == 'countproducts'){
    $jim->countproducts();
}else if($q == 'countcategory'){
    $jim->countcategory();
}else if($q == 'checkout'){
    $jim->checkout();
    
}else if($q == 'verify'){
    $jim->verify();   
}else if($q == 'cancelorder'){
    $jim->cancelorder();   
}

class Shopping {
    private $conn;
   public function __construct() {
    include('../db.php');
    $this->conn = $conn;
    }
    function addtocart($product, $price, $qty) {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['customer_id'])) {
            header("Location: cuslogin.php");
            exit(); 
        }

        $customer_id = $_SESSION['customer_id'];
        // Lấy đường dẫn ảnh của sản phẩm từ cơ sở dữ liệu
        $sql_get_img = "SELECT imgUrl FROM products WHERE Product = '$product'";    
        $result_img = mysqli_query($this->conn, $sql_get_img);
        $row_img = mysqli_fetch_assoc($result_img);
        $imgUrl = $row_img['imgUrl'];
    
        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
        if (isset($_SESSION['cart'][$product])) {
            $_SESSION['cart'][$product]['qty'] += 1;
            $new_qty = $_SESSION['cart'][$product]['qty'];
            $q = "UPDATE cart SET Quantity = $new_qty WHERE customer_id = '$customer_id' AND Product = '$product'";
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới vào giỏ hàng
            $_SESSION['cart'][$product] = array(
                'proID' => $_SESSION['proID'],
                'product' => $product,
                'price' => $price,
                'qty' => $qty,
                'imgUrl' => $imgUrl
            );
            $q = "INSERT INTO cart (customer_id, Product, Price, Quantity, imgUrl) VALUES ('$customer_id', '$product', '$price', '$qty', '$imgUrl')";
        }
        mysqli_query($this->conn, $q);
        $_SESSION['proID']++;
        return true;
    }
    
     
    
    function removefromcart($id) {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]); // Remove the item from the cart array
        }
        $customer_id = $_SESSION['customer_id'];
        // Remove the item from the database cart of the current customer
        $q = "DELETE FROM cart WHERE ID='$id' AND customer_id='$customer_id'";
        mysqli_query($this->conn, $q);
        header("location: ../cart.php");
        exit();
    }
    
    function updatecart($id, $qty, $product) {
        $customer_id = $_SESSION['customer_id'];
    
        if ($qty == 0) {
            // Remove the item from the session cart if quantity is 0
            unset($_SESSION['cart'][$product]); 
            $q = "DELETE FROM cart WHERE ID='$id' AND customer_id='$customer_id'";
        } else {
            $_SESSION['cart'][$product]['qty'] = $qty;
            $q = "UPDATE cart SET Quantity='$qty' WHERE ID='$id' AND customer_id='$customer_id'";
        }
        
        mysqli_query($this->conn, $q);
        // Redirect to the cart page
        header("location: ../cart.php");
        exit();
    }
    
    function countcart() {
        // Kiểm tra xem session 'customer_id' đã được thiết lập hay chưa
        if(isset($_SESSION['customer_id'])) {
            $customer_id = $_SESSION['customer_id'];
            $count = 0;
    
            // Query để đếm tổng số lượng mặt hàng trong giỏ hàng cho khách hàng hiện tại
            $q = "SELECT SUM(Quantity) AS total_qty FROM cart WHERE customer_id='$customer_id'";
            $result = mysqli_query($this->conn, $q);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $count = $row['total_qty'] ? $row['total_qty'] : 0; // Nếu không có hàng trả về, mặc định là 0
            }
            
            echo $count;
        } else {
            echo 0; // Nếu 'customer_id' không được thiết lập, mặc định số lượng là 0
        }
    }
    function emptycart(){
       
    // Lấy customer_id từ session
    if(isset($_SESSION['customer_id'])) {
        
        
        $customer_id = $_SESSION['customer_id'];
        $query = "DELETE FROM cart WHERE customer_id = $customer_id";
        mysqli_query($this->conn, $query);
        mysqli_close($this->conn);
    }
        unset($_SESSION['cart']); 
        unset($_SESSION['proID']); 
        header("location:../cart.php"); 
    }
    function countorder(){
        $q = "select * from dbmaytinh.order where status='unconfirmed'";
        $result = mysqli_query($this->conn,$q);
        echo mysqli_num_rows($result);
    }
    function countproducts(){
        $q = "select * from dbmaytinh.products";
        $result = mysqli_query($this->conn,$q);
        echo mysqli_num_rows($result);
    }
    function countcategory(){
        $q = "select * from dbmaytinh.category";
        $result = mysqli_query($this->conn,$q);
        echo mysqli_num_rows($result);
    }
    function cancelorder(){
        $date = date('m/d/y h:i:s A');
        $id = $_GET['id'];
        $q = "UPDATE dbmaytinh.order set dateDelivered='$date', status='canceled' where id=$id";
        mysqli_query($this->conn, $q);
        header("location:../view_orders.php?status=unconfirmed");
    }
    function checkout() {
        // Kết nối đến cơ sở dữ liệu
        $customer_id = $_SESSION['customer_id'];
        $khach_id = $customer_id;
        $contact = $_POST['contact'];   
        $address = $_POST['address'];   
        $fullname = $_POST['name'];
        $date = date('m/d/y h:i:s A');
        $item = '';
        foreach($_SESSION['cart'] as $row):
            if($row['qty'] != 0){
                $product = '('.$row['qty'].') '.$row['product'];
                $item = $product.', '.$item;
                $sql_get_img = "SELECT imgUrl FROM products WHERE Product = '" . $row['product'] . "'";
                $result_img = mysqli_query($this->conn, $sql_get_img);
                $row_img = mysqli_fetch_assoc($result_img);
                $imgUrl = $row_img['imgUrl'];
            }
        endforeach;
        $amount = $_SESSION['total'];
        $q = "INSERT INTO dbmaytinh.order VALUES (NULL, '$khach_id', '$fullname', '$contact', '$address', '$item','$imgUrl', '$amount', 'unconfirmed', '$date', '')";
        mysqli_query($this->conn, $q);
        
        $query_delete_cart = "DELETE FROM cart WHERE customer_id = $customer_id";
        mysqli_query($this->conn, $query_delete_cart);
        
        // Xoá session giỏ hàng
        unset($_SESSION['cart']); 
        
        echo "<script>alert('Cảm ơn quý khách đã đặt hàng!'); setTimeout(function(){ window.location.href = '../cart.php'; });</script>";

    }
    
    function addReview($product, $comment, $rating) {
        $mysqli_hostname = "localhost";
        $mysqli_user = "root";
        $mysqli_password = "";
        $mysqli_database = "dbmaytinh";

        $conn = mysqli_connect($mysqli_hostname, $mysqli_user, $mysqli_password, $mysqli_database) or die("Không thể kết nối database");
        
        if (!isset($_SESSION['customer_id'])) {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            header("Location: cuslogin.php");
            exit(); 
        }
        
        // Lấy customer_id từ session
        $customer_id = $_SESSION['customer_id'];
        
        // Cập nhật cột comment trong bảng products
        $q = "UPDATE products SET comment = '$comment' & SET rating='$rating' WHERE Product = '$product'";
        
        // Thực thi câu lệnh SQL
        mysqli_query($this->conn, $q);
        
        // Trả về true để cho biết quá trình thêm đánh giá đã thành công
        return true;
    }
    
    function verify(){
        $username = $_POST['username'];   
        $password = $_POST['password'];   
        
        $q = "SELECT * from dbmaytinh.user where username='$username' and password='$password'";
        $result = mysqli_query($this->conn,$q);
        $_SESSION['login']='yes';
        echo mysqli_num_rows($result);
    }
    
    
}

?>
