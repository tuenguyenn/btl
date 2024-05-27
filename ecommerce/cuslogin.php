<?php
include 'include/home/header.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

$mysqli_hostname = "localhost";
$mysqli_user = "root";
$mysqli_password = "";
$mysqli_database = "dbmaytinh";
$prefix = "";
$conn = mysqli_connect($mysqli_hostname, $mysqli_user, $mysqli_password,$mysqli_database) or die("Không thể kết nối database");
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin đăng nhập từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mã hóa mật khẩu bằng MD5
    $hashed_password = md5($password);

    // Kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM `customer` WHERE `cususer` = '$username' AND `cuspass` = '$hashed_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['customer_id'] = $row['customer_id']; // Lưu customer_id vào session
        $_SESSION['name']=$row['name'];
        header("Location: index.php");
        exit(); 
    } else {
        $error_message = "Tài khoản hoặc mật khẩu không chính xác.";
    }
}
?>



    
<section  style="display:flex; margin-top:80px">
<style>
        body {
            background-color: #fff; /* Thiết lập màu nền của trang là màu trắng */
            margin: 0; /* Loại bỏ margin mặc định */
            padding: 0; /* Loại bỏ padding mặc định */
        }
        .chua {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
          
            height: 6;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: left;
        }
       
        form {
            text-align: left;
        }

       .cuslog{
            padding-bottom: 5px;
            font-weight: normal;        
       }

       .infor {
            width: 100%;
            padding: 10px;
            height: 50px;
            margin-bottom: 10px;
            border: 1px solid #0066CC;
            border-radius: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #0066CC;
            color: #fff;
            border: none;
            height: 50px;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            
        }
     
        p {
            margin-top: 20px;
            text-align: left;
        }
        a{
            color:#007bff
        }
        .error-message{
            color: red;
        }
       
    </style>
        <div class="container" style="display: flex;">
                    <img  src="https://shopdunk.com/images/uploaded/banner/VNU_M492_08%201.jpeg" alt="Banner" style="max-width: 100%; height: auto; margin-left:100px ;">

            <div class="chua" >
            <h2>Đăng Nhập</h2>
                <?php if (!empty($error_message)) : ?>
                <p class="error-message"><?php echo $error_message; ?></p>
                    <?php endif; ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="POST" >
                <label class="cuslog" for="username">Tên đăng nhập:</label><br>
                <input class= "infor" type="text" id="username" name="username" placeholder="Tên tài khoản"required>
                <label class="cuslog" for="password">Mật khẩu:</label><br> 
                <input class= "infor" type="password" id="password" name="password" placeholder="Mật khẩu"required><br><br>
                <input type="checkbox" id="show-password" class="show-password">
                <label style="color: gray;" for="show-password">Hiện mật khẩu</label><br><br>
                
                
                <input type="submit" value="Đăng Nhập">
            </form>
            <p>Chưa có tài khoản? <a href="signup.php">đăng ký ngay</a>.</p>
            </div>
            
        </div>
       
<script>
 
    document.getElementById("show-password").addEventListener("change", function() {
 
        if (this.checked) {
           
            document.getElementById("password").type = "text";
        } else {
        
            document.getElementById("password").type = "password";
        }
    });
</script>
       
</section>
