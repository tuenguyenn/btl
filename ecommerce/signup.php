<?php
include 'include/home/header.php';
include 'db.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

$error_messages = [
    'general' => '',
    'email' => '',
    'password' => '',
    'confirm_password' => '',
    'name' => '',
    'address' => '',
    'phone_number' => '',
    'birthdate' => '',
];

$success_message = '';

$current_stage = isset($_POST['current_stage']) ? $_POST['current_stage'] : 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['prev'])) {
        $current_stage = 1; 
    } elseif (isset($_POST['next'])) {
        $name = isset($_POST["name"]) ? $_POST["name"] : '';
        $address = isset($_POST["address"]) ? $_POST["address"] : '';
        $phone_number = isset($_POST["phone_number"]) ? $_POST["phone_number"] : '';
        $birthdate = isset($_POST["birthdate"]) ? $_POST["birthdate"] : '';

        if (empty($name) && empty($address) && empty($phone_number) && empty($birthdate)) {
            $error_messages['general'] = "Vui lòng nhập đầy đủ thông tin.";
        } else {
            if (empty($name)) {
                $error_messages['name'] = "Không để trống tên.";
            }
            if (empty($address)) {
                $error_messages['address'] = "Không để trống địa chỉ.";
            }
            if (empty($phone_number)) {
                $error_messages['phone_number'] = "Không để trống số điện thoại.";
            }
            if (empty($birthdate)) {
                $error_messages['birthdate'] = "Không để trống ngày sinh.";
            }

            if (!empty($phone_number)) {
                if (!preg_match('/^0[0-9]{9}$/', $phone_number)) {
                    $error_messages['phone_number'] = "Số điện thoại không hợp lệ.";
                } else {
                    $check_phone_query = "SELECT * FROM customer WHERE phone_number = ?";
                    $stmt_check_phone = $conn->prepare($check_phone_query);
                    $stmt_check_phone->bind_param("s", $phone_number);
                    $stmt_check_phone->execute();
                    $result_check_phone = $stmt_check_phone->get_result();

                    if ($result_check_phone->num_rows > 0) {
                        $error_messages['phone_number'] = "Số điện thoại đã tồn tại.";
                    }
                    $stmt_check_phone->close();
                }
            }

            $current_timestamp = time();
            $birthdate_timestamp = strtotime($birthdate);
            $min_age = strtotime('-80 years');
            $max_age = strtotime('-13 years');
            if (!empty($birthdate) && ($birthdate_timestamp > $current_timestamp)) {
                $error_messages['birthdate'] = "Vui lòng không chọn ngày sinh ở tương lai.";
            } elseif (!empty($birthdate) && ($birthdate_timestamp > $max_age || $birthdate_timestamp < $min_age)) {
                $error_messages['birthdate'] = "Chỉ hỗ trợ khách hàng từ 13-80 tuổi.";
            }

            if (empty(array_filter($error_messages))) {
                $current_stage = 2;
            }
        }
        
    } elseif (isset($_POST['submit'])) {
        $name = isset($_POST["name"]) ? $_POST["name"] : '';
        $address = isset($_POST["address"]) ? $_POST["address"] : '';
        $phone_number = isset($_POST["phone_number"]) ? $_POST["phone_number"] : '';
        $birthdate = isset($_POST["birthdate"]) ? $_POST["birthdate"] : '';
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $password = isset($_POST["password"]) ? $_POST["password"] : '';
        $confirm_password = isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : '';

        if (empty($email) && empty($password) && empty($confirm_password)) {
            $error_messages['general'] = "Vui lòng nhập đầy đủ thông tin.";
        } else {
            if (empty($email)) {
                $error_messages['email'] = "Tên đăng nhập là bắt buộc.";
            } 
            if (empty($password)) {
                $error_messages['password'] = "Mật khẩu là bắt buộc.";
            } 
            if (empty($confirm_password)) {
                $error_messages['confirm_password'] = "Xác nhận mật khẩu là bắt buộc.";
            }

            if (!empty($email) && strlen($email) < 3) {
                $error_messages['email'] = "Tên đăng nhập phải có ít nhất 3 ký tự.";
            }
            if (!empty($email) && strlen($email) > 256 ) {
                $error_messages['email'] = "Tên đăng nhập không được quá 256 ký tự.";
            }
        
            if (!empty($password)) {
                if (preg_match('/\s/', $password)) {
                    $error_messages['password'] = "Mật khẩu không được chứa khoảng trắng.";
                } else {
                    $password_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
                    if (!preg_match($password_pattern, $password)) {
                        $error_messages['password'] = "Mật khẩu phải chứa ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.";
                    }
                }
            }
        
            if (!empty($password) && $password != $confirm_password) {
                $error_messages['confirm_password'] = "Xác nhận mật khẩu không khớp.";
            }

            if (empty($error_messages['email']) && empty($error_messages['password']) && empty($error_messages['confirm_password'] && empty($error_messages['general']) )) {
                $check_email_query = "SELECT * FROM customer WHERE cususer = ?";
                $stmt_check_email = $conn->prepare($check_email_query);
                $stmt_check_email->bind_param("s", $email);
                $stmt_check_email->execute();
                $result_check_email = $stmt_check_email->get_result();

                if ($result_check_email->num_rows > 0) {
                    $error_messages['email'] = "Tên đăng nhập đã tồn tại.";
                
                } else {
                    $sql = "INSERT INTO customer (name, address, cususer, cuspass, birthdate, phone_number) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssss", $name, $address, $email, $password, $birthdate, $phone_number);

                    if ($stmt->execute()) {
                        $success_message = "Đăng ký thành công!";

                    } else {
                        $error_messages['general'] = "Đã xảy ra lỗi trong quá trình đăng ký. Vui lòng thử lại sau.";
                    }
                    $stmt->close();
                }
                $stmt_check_email->close();
            }
        }
    }
}
?>

<section style="display: flex; margin-top: 70px;">
    <div class="container" style="display: flex;">
        <img src="https://shopdunk.com/images/uploaded/banner/TND_M402_010%201.jpeg" alt="Banner" style="max-width: 100%; height: 400px; margin-left: 100px;">
        <div class="chua">
           
            <?php if ($current_stage == 1): ?>
                <h2>Đăng Ký</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="current_stage" value="1">
                    
                    <label class="cuslog" for="name">Tên:<span class="required">*</span></label>
                    <input class="infor" type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                    <p class="error-message"><?php echo $error_messages['name']; ?></p><br>

                    <label class="cuslog" for="address">Địa chỉ:<span class="required">*</span></label>
                    <input class="infor" type="text" id="address" name="address" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>">
                    <p class="error-message"><?php echo $error_messages['address']; ?></p><br>

                    <label class="cuslog" for="phone_number">Số điện thoại:<span class="required">*</span></label>
                    <input class="infor" type="text" id="phone_number" name="phone_number" value="<?php echo isset($_POST['phone_number']) ? htmlspecialchars($_POST['phone_number']) : ''; ?>">
                    <p class="error-message"><?php echo $error_messages['phone_number']; ?></p><br>

                    <label class="cuslog" for="birthdate">Ngày sinh:<span class="required">*</span></label>
                    <input class="infor" type="date" id="birthdate" name="birthdate" value="<?php echo isset($_POST['birthdate']) ? htmlspecialchars($_POST['birthdate']) : ''; ?>">
                    <p class="error-message"><?php echo $error_messages['birthdate']; ?></p><br>

                    <input type="submit" name="next" value="Tiếp theo">
                    <p class="error-message"><?php echo $error_messages['general']; ?></p>
                </form>
            <?php elseif ($current_stage == 2): ?>
                <h2>Đăng Ký</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="current_stage" value="2">
                    <input type="hidden" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                    <input type="hidden" name="address" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>">
                    <input type="hidden" name="phone_number" value="<?php echo isset($_POST['phone_number']) ? htmlspecialchars($_POST['phone_number']) : ''; ?>">
                    <input type="hidden" name="birthdate" value="<?php echo isset($_POST['birthdate']) ? htmlspecialchars($_POST['birthdate']) : ''; ?>">
                    <label class="cuslog" for="email">Tên đăng nhập:<span class="required">*</span></label>
                    <input class="infor" type="text" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    <p class="error-message"><?php echo $error_messages['email']; ?></p><br>

                    <label class="cuslog" for="password">Mật khẩu:<span class="required">*</span></label>
                    <input class="infor" type="password" id="password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                    <p class="error-message"><?php echo $error_messages['password']; ?></p><br>

                    <label class="cuslog" for="confirm_password">Xác nhận mật khẩu:<span class="required">*</span></label>
                    <input class="infor" type="password" id="confirm_password" name="confirm_password" value="<?php echo isset($_POST['confirm_password']) ? htmlspecialchars($_POST['confirm_password']) : ''; ?>">
                    <p class="error-message"><?php echo $error_messages['confirm_password']; ?></p><br>
                    <input type="checkbox" id="show-password" class="show-password">
                    <label for="show-password">Hiện mật khẩu</label><br><br>
                    <input type="submit" name="prev" value="Quay lại">
                    <input type="submit" name="submit" value="Đăng Ký">
                    <p class="error-message"><?php echo $error_messages['general']; ?></p>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (!empty($success_message)): ?>
    <script>
        alert('<?php echo $success_message; ?>');
        setTimeout(function() {
            window.location.href = 'cuslogin.php';
        });
    </script>
<?php endif; ?>

<style>
    body {
        background-color: #fff; 
        margin: 0; 
        padding: 0; 
    }
    .chua {
        width: 500px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 5px;
        height: auto;
    }
    .error-message {
        margin-top: 10px;
        color: red;
    }
    h2 {
        color: #333;
        text-align: left;
    }
    .required {
        color: red;
        margin-left: 5px;
    }
    form {
        text-align: left;
    }
    .cuslog {
        padding-bottom: 5px;
        font-weight: normal;        
    }
    .infor {
        width: 100%;
        padding: 10px;
        height: 50px;
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
    input[type="text"], input[type="password"]:hover {
        color: #0066CC;
    }
    p {
        text-align: left;
    }
    a {
        color: #007bff;
    }
    /* CSS for popup */
    .popup {
    display: block; /* Temporarily set this to block */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}


.popup-content {
    background-color: white;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 300px;
    text-align: center;
    border-radius: 10px;
}

.close-btn {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close-btn:hover,
.close-btn:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}


</style>

<script>
    document.getElementById("show-password").addEventListener("change", function() {
        if (this.checked) {
            document.getElementById("password").type = "text";
            document.getElementById("confirm_password").type = "text";
        } else {
            document.getElementById("password").type = "password";
            document.getElementById("confirm_password").type = "password";
        }
    });
    


</script>
