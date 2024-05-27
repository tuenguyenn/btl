<?php
// Include file kết nối
include 'include/home/header.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

$mysqli_hostname = "localhost";
$mysqli_user = "root";
$mysqli_password = "";
$mysqli_database = "dbmaytinh";
$prefix = "";
$conn = mysqli_connect($mysqli_hostname, $mysqli_user, $mysqli_password,$mysqli_database) or die("Không thể kết nối database");
$error_message = '';
$email_error = '';
$password_error = '';
$current_stage = isset($_POST['current_stage']) ? $_POST['current_stage'] : 1; // Mặc định giai đoạn là 1

// Xử lý khi form được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nếu người dùng nhấp vào nút "Quay lại"
    if (isset($_POST['prev'])) {
        $current_stage = 1; // Đặt giai đoạn về 1
    } elseif (isset($_POST['next'])) { // Nếu người dùng nhấp vào nút "Tiếp tục"
        $current_stage = 2; // Đặt giai đoạn thành 2
    } elseif (isset($_POST['submit'])) { // Nếu người dùng nhấp vào nút "Đăng Ký"
        // Xử lý đăng ký
        // Lấy dữ liệu từ biểu mẫu và kiểm tra
        $name = isset($_POST["name"]) ? $_POST["name"] : '';
        $address = isset($_POST["address"]) ? $_POST["address"] : '';
        $phone_number = isset($_POST["phone_number"]) ? $_POST["phone_number"] : '';
        $birthdate = isset($_POST["birthdate"]) ? $_POST["birthdate"] : '';

        if ($current_stage == 2) {
            $email = isset($_POST["email"]) ? $_POST["email"] : '';
            $password = isset($_POST["password"]) ? $_POST["password"] : '';
            $confirm_password = isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : '';

            // Kiểm tra xem các trường đã được điền đầy đủ không
            if (empty($name) || empty($address) || empty($email) || empty($password) || empty($confirm_password) || empty($birthdate) || empty($phone_number)) {
                $error_message = "Vui lòng điền đầy đủ thông tin.";
            } elseif ($password != $confirm_password) {
                $password_error = "Xác nhận mật khẩu không khớp.";
            } else {
                // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
                $check_email_query = "SELECT * FROM customer WHERE cususer = ?";
                $stmt_check_email = $conn->prepare($check_email_query);
                $stmt_check_email->bind_param("s", $email);
                $stmt_check_email->execute();
                $result_check_email = $stmt_check_email->get_result();

                if ($result_check_email->num_rows > 0) {
                    $email_error = "Tên đăng nhập đã tồn tại.";
                } else {
      

                    // Chèn dữ liệu vào bảng customer
                    $sql = "INSERT INTO customer (name, address, cususer, cuspass, birthdate, phone_number) VALUES (?, ?, ?, ?, ?, ?)";

                    // Sử dụng Prepared Statement để tránh SQL Injection
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssss", $name, $address, $email, $password, $birthdate, $phone_number);

                    if ($stmt->execute()) {
                        header("Location: cuslogin.php");
                        exit(); // Chắc chắn rằng không có mã HTML nào được gửi kèm theo
                    } else {
                        $error_message = "Đã xảy ra lỗi trong quá trình đăng ký. Vui lòng thử lại sau.";
                    }
                    $stmt->close();
                }
                $stmt_check_email->close();
            }
        }
    }
}
?>

<section style="display:flex; margin-top:70px">
<style>   
 body {
            background-color: #fff; /* Thiết lập màu nền của trang là màu trắng */
            margin: 0; /* Loại bỏ margin mặc định */
            padding: 0; /* Loại bỏ padding mặc định */
        }
        .chua {
            width: 500px;
            margin: 0 auto;
            
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
        input[type="text"],input[type="password"] :hover{
          color:#0066CC
        }

        p {
            margin-top: 20px;
            text-align: left;
        }
        a{
            color:#007bff
        }
</style>
<div class="container" style="display: flex;">
    <img  src="https://shopdunk.com/images/uploaded/banner/TND_M402_010%201.jpeg" alt="Banner" style="max-width: 100%; height: 400px; margin-left:100px ;">
    <div class="chua">
        <?php if ($current_stage == 1): ?>
            <h2>Đăng Ký </h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="hidden" name="current_stage" value="1">
                <label class="cuslog" for="name">Tên:</label>
                <input class="infor" type="text" id="name" name="name" required><br>
                <label class="cuslog" for="address">Địa chỉ:</label>
                <input class="infor" type="text" id="address" name="address" required><br>
                <label class="cuslog" for="phone_number">Số điện thoại:</label>
                <input class="infor" type="text" id="phone_number" name="phone_number" required><br>
                <label class="cuslog" for="birthdate">Ngày sinh:</label>
                <input class="infor" type="date" id="birthdate" name="birthdate" required><br>
                <input type="submit" value="Tiếp tục" name="next">
                <p class="error"><?php echo $error_message; ?></p>
            </form>
        <?php elseif ($current_stage == 2): ?>
            <h2>Đăng Ký </h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="hidden" name="current_stage" value="2">
                <input type="hidden" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                <input type="hidden" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>">
                <input type="hidden" name="phone_number" value="<?php echo isset($_POST['phone_number']) ? $_POST['phone_number'] : ''; ?>">
                <input type="hidden" name="birthdate" value="<?php echo isset($_POST['birthdate']) ? $_POST['birthdate'] : ''; ?>">
                <label class="cuslog" for="email">Tên đăng nhập:</label>
                <input class="infor" type="text" id="email" name="email" required>
                <p><?php echo $email_error; ?></p><br>
                <label class="cuslog" for="password">Mật khẩu:</label>
                <input class="infor" type="password" id="password" name="password" required><br>
                <label class="cuslog" for="confirm_password">Xác nhận mật khẩu:</label>
                <input class="infor" type="password" id="confirm_password" name="confirm_password" required>
                <p><?php echo $password_error; ?></p><br>
                <input type="checkbox" id="show-password" class="show-password">
                <label for="show-password">Hiện mật khẩu</label><br><br>
                <input type="submit" name="prev" value="Quay lại">
                <input type="submit" name="submit" value="Đăng Ký">
                <p class="error"><?php echo $error_message; ?></p>
            </form>
        <?php endif; ?>
    </div>
</div>
<script>
    // Lắng nghe sự kiện thay đổi của checkbox
    document.getElementById("show-password").addEventListener("change", function() {
        // Nếu checkbox được đánh dấu
        if (this.checked) {
            // Hiển thị mật khẩu
            document.getElementById("password").type = "text";
            document.getElementById("confirm_password").type = "text";
        } else {
            // Ẩn mật khẩu
            document.getElementById("password").type = "password";
            document.getElementById("confirm_password").type = "password";
        }
    });
</script>

</section>
