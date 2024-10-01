<?php
include 'include/home/header.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
include 'db.php';

$error_messages = [
    'username' => '',
    'password' => '',
    'login' => '', 
    'gen'=> '',
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) && empty($password)){
        $error_messages['gen'] = 'Vui lòng nhập đầy đủ thông tin';
    } elseif (empty($username)) {
        $error_messages['username'] = "Tên đăng nhập không được để trống.";
    } elseif (empty($password)) {
        $error_messages['password'] = "Mật khẩu không được để trống.";
    } else {
        $hashed_password = md5($password);
        $sql = "SELECT * FROM `customer` WHERE `cususer` = '$username' AND `cuspass` = '$hashed_password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['customer_id'] = $row['customer_id'];
            $_SESSION['name'] = $row['name'];
            header("Location: index.php");
            exit(); 
        } else {
            $error_messages['login'] = "Tài khoản hoặc mật khẩu không chính xác.";
        }
    }
}
?>

<section style="display:flex; margin-top:80px">
    <div class="container" style="display: flex;">
        <img src="https://shopdunk.com/images/uploaded/banner/VNU_M492_08%201.jpeg" alt="Banner" style="max-width: 100%; height: auto; margin-left:100px ;">

        <div class="chua">
            <h2>Đăng Nhập</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <label class="cuslog" for="username">Tên đăng nhập:</label><br>
                <input class="infor" type="text" id="username" name="username" placeholder="Tên tài khoản" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>">
                <?php if (!empty($error_messages['username'])) : ?>
                    <p class="error-message"><?php echo $error_messages['username']; ?></p>
                <?php endif; ?><br>

                <label class="cuslog" for="password">Mật khẩu:</label><br>
                <input class="infor" type="password" id="password" name="password" placeholder="Mật khẩu">
                <?php if (!empty($error_messages['password'])) : ?>
                    <p class="error-message"><?php echo $error_messages['password']; ?></p>
                <?php endif; ?><br><br>

                <input type="checkbox" id="show-password" class="show-password">
                <label style="color: gray;" for="show-password">Hiện mật khẩu</label><br><br>

                <input type="submit" value="Đăng Nhập">
                <p class="error-message"><?php echo $error_messages['gen']; ?></p>

                
                <?php if (!empty($error_messages['login'])) : ?>
                    <p class="error-message"><?php echo $error_messages['login']; ?></p>
                <?php endif; ?>
            </form>
            <p>Chưa có tài khoản? <a href="signup.php">đăng ký ngay</a>.</p>
        </div>
    </div>
</section>

        <style>
        body {
            background-color: #fff; 
            margin: 0; 
            padding: 0; 
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
