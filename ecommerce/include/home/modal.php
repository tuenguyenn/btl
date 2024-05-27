<?php
include 'db.php';
// Kiểm tra nếu người dùng nhấn nút "Lưu" trong form thêm địa chỉ mới
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_new_address'])) {
    $customer_id = $_SESSION['customer_id'];
    // Lấy thông tin địa chỉ mới từ form
    $new_name = $_POST['new_name'];
    $new_address = $_POST['new_address'];
    $new_phone_number = $_POST['new_phone_number'];
    // Thực hiện truy vấn để thêm hoặc cập nhật thông tin địa chỉ mới vào cơ sở dữ liệu
    $sql = "UPDATE customer SET name2=?, address2=?, phone_number2=? WHERE customer_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $new_name, $new_address, $new_phone_number, $customer_id);
    // Kiểm tra và thực hiện truy vấn
    if ($stmt->execute()) {
        echo '<script>alert("Địa chỉ mới đã được thêm hoặc cập nhật thành công!");</script>';
    } else {
        echo "Có lỗi xảy ra khi thêm hoặc cập nhật địa chỉ mới: " . $conn->error;
    }
}
$query = "SELECT name,name2, address, address2,phone_number, phone_number2 FROM customer WHERE customer_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $_SESSION['customer_id']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<div class="modal fade" id="checkout_modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-shopping-cart text-success fa-lg"></i> Thanh toán<small class='text-primary'> Thông tin</small></h4>
            </div>
            <div class="modal-body">
                <form id="checkout_form" action="cart/data.php?q=checkout" method="POST">
                    <input type="hidden" name="customer_id" value="<?php echo $_SESSION['customer_id']; ?>">
                    <!-- Hiển thị thông tin địa chỉ 1 -->
                    <div class="form-group">
                        <input type="radio" id="address1" name="selected_address" value="address1" checked>
                        <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ; ?>" readonly>
                        <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>" readonly>
                        <input type="text" name="contact" class="form-control" value="<?php echo $row['phone_number']; ?>" readonly>
                    </div>
                    <!-- Hiển thị thông tin địa chỉ 2 nếu có -->
                    <?php if (!empty($row['name2']) && !empty($row['address2']) && !empty($row['phone_number2'])): ?>
                    <div class="form-group">
                        <input type="radio" id="address2" name="selected_address" value="address2">
                        <input type="text" name="name" class="form-control" value="<?php echo $row['name2'] ; ?>" readonly>
                        <input type="text" name="address" class="form-control" value="<?php echo $row['address2']; ?>" readonly>
                        <input type="text" name="contact" class="form-control" value="<?php echo $row['phone_number2']; ?>" readonly>
                    </div>
                <?php endif; ?>
                    <!-- Thêm nút "Thêm địa chỉ" -->
                    <button type="button" class="them" data-toggle="modal" data-target="#add_address_modal">Thêm địa chỉ</button>
                    <div class="method">
                        <label for="payment_method">Phương thức thanh toán:</label>
                        <select id="payment_method" class="form-control" >
                            <option value="cod">Thanh toán khi nhận hàng</option>
                            <option value="zalopay">Thanh toán qua ZaloPay</option>
                            <option value="bank">Chuyển khoản ngân hàng</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="dong" data-dismiss="modal">Đóng</button>
                <button type="button" class="ok" id="confirm_payment">OK</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="add_address_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm địa chỉ mới</h4>
            </div>
            <div class="modal-body">
                <!-- Thêm phần tử div để hiển thị thông báo -->
                <div id="success_message" class="alert alert-success" style="display: none;">
                    Địa chỉ mới đã được thêm thành công!
                </div>
                <form id="add_address_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="new_name">Tên:</label>
                        <input type="text" name="new_name" class="form-control" id="new_name">
                    </div>
                    <div class="form-group">
                        <label for="new_address">Địa chỉ:</label>
                        <input type="text" name="new_address" class="form-control" id="new_address">
                    </div>
                    <div class="form-group">
                        <label for="new_phone_number">Số điện thoại:</label>
                        <input type="text" name="new_phone_number" class="form-control" id="new_phone_number">
                    </div>
                    <!-- Sử dụng type="submit" cho nút "Lưu" -->
                    <button type="submit" class="btn btn-success" name="save_new_address">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="bankTransferPopup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thông tin chuyển khoản ngân hàng</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <img height="300px" width="300px" src="images/home/bank.jpg" alt="QR Code" class="img-reponsive">
                <p>Tên tài khoản: <strong>NGUYEN MINH TUE</strong></p>
                <p>Số tài khoản: <strong>1127062002</strong></p>
                <p>Ngân hàng: <strong>MB Bank</strong></p>
                <div class="modal-footer">
                <button type="button" class="dong" data-dismiss="modal">Đóng</button>
                <button type="button" class="ok" id="confirm_payment">OK</button>
                </div>      
            </div>
        </div>
    </div>
</div>
<style>
    .form-group {
        display: inline-flex;
        align-items: center;
    }

    .form-group label {
        margin-right: 10px;
    }

    .form-control[readonly] {
        background-color: #f9f9f9;
        border: none;
        box-shadow: none;
        outline: none;
        color: black;
    }
    .form-control[readonly]:focus {
        outline: none;
        box-shadow: none;
    }
    .them{
        width: 120px;
        background-color: #0066cc;
        border-radius: 8px;
        padding: 12px 10px;
        text-decoration: none;
        color: #fff;
        transition: background-color 0.3s ease;
        display: inline-block;
        border: none;
        white-space: nowrap;
        margin-top: 10px;
    }
    .method{
        padding-top: 10px;
    }
        .ok{
        width: 120px;
        background-color: #0066cc;
        border-radius: 8px;
        padding: 12px 10px;
        text-decoration: none;
        color: #fff;
        transition: background-color 0.3s ease;
        display: inline-block;
        border: none;
        white-space: nowrap;
        margin-top: 10px;
        }
    .dong{
        width: 120px;
        background-color: #fff;
        border-radius: 8px;
        padding: 10px 10px;
        text-decoration: none;
        color: #0066cc;
        transition: background-color 0.3s ease;
        display: inline-block;
        border: none;
        white-space: nowrap;
        margin-top: 10px;
        border: 1px solid #0066cc;
    }
        .modal-body img,p{
        display: block; /* Hiển thị ảnh dưới dạng block để căn giữa */
        margin: 0 auto; /* Căn giữa ảnh theo chiều ngang */
        padding-bottom: 10px;
    }
</style>

<script>
    document.getElementById("add_address_form").addEventListener("submit", function(event) {
        document.getElementById("success_message").style.display = "block";
    });
    document.getElementById("confirm_payment").addEventListener("click", function() {
    // Lấy giá trị của địa chỉ mà người dùng đã chọn
    var selectedAddress = document.querySelector('input[name="selected_address"]:checked').value;
    // Tạo biến để lưu trữ thông tin của địa chỉ được chọn
    var selectedName, selectedAddress, selectedContact;
    if (selectedAddress === "address1") {
        selectedName = "<?php echo $row['name']; ?>";
        selectedAddress = "<?php echo $row['address']; ?>";
        selectedContact = "<?php echo $row['phone_number']; ?>";
    } 
    // Nếu người dùng đã chọn địa chỉ 2
    else if (selectedAddress === "address2") {
        selectedName = "<?php echo $row['name2']; ?>";
        selectedAddress = "<?php echo $row['address2']; ?>";
        selectedContact = "<?php echo $row['phone_number2']; ?>";
    }
    var formData = new FormData();
    formData.append('name', selectedName);
    formData.append('address', selectedAddress);
    formData.append('contact', selectedContact);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'cart/data.php?q=checkout', true);
    xhr.send(formData);
    // Xử lý kết quả sau khi gửi dữ liệu
    xhr.onload = function() {
        if (xhr.status == 200) {
            // Xử lý kết quả ở đây (nếu cần)
            console.log(xhr.responseText);
            alert("Cảm ơn quý khách đã đặt hàng!");
            window.location.href = 'cart.php';
        } else {
            // Xử lý lỗi (nếu có)
            console.error(xhr.responseText);
        }
    };
    
});
document.getElementById("payment_method").addEventListener("change", function() {
        var paymentMethod = this.value;
        document.querySelectorAll(".payment_option").forEach(function(el) {
            el.style.display = "none";
        });
        if (paymentMethod === "cod") {
            document.getElementById("cod_option").style.display = "block";
        } else if (paymentMethod === "zalopay") {
            document.getElementById("zalopay_option").style.display = "block";
        } else if (paymentMethod === "paypal") {
            document.getElementById("paypal_option").style.display = "block";
        }
    });

    document.getElementById("payment_method").addEventListener("change", function() {
        var selectedMethod = this.value;
        if (selectedMethod === "bank") {
            // Hiển thị popup khi chọn phương thức thanh toán là "Chuyển khoản ngân hàng"
            $('#bankTransferPopup').modal('show');
        }
    });
</script>

