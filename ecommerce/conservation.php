<?php
include 'db.php';
session_start();
// Hàm lưu hội thoại vào cơ sở dữ liệu
function luuHoiThoai($customer_id, $nguoiBanID, $noiDung, $conn) {

    // Sử dụng Prepared Statements để tránh tấn công SQL Injection
    $query = "INSERT INTO hoithoai (customer_id, ID_nguoiban, NoiDung, NgayTao) VALUES (?, ?, ?, NOW())";
    $stmt = mysqli_prepare($conn, $query);

    // Kiểm tra xem truy vấn đã được chuẩn bị thành công chưa
    if ($stmt) {
        // Gắn các tham số vào truy vấn
        mysqli_stmt_bind_param($stmt, "iis", $customer_id, $nguoiBanID, $noiDung);

        // Thực thi truy vấn
        if (mysqli_stmt_execute($stmt)) {
            // Hội thoại đã được lưu thành công
            return true;
        } else {
            // Đã xảy ra lỗi khi thực thi truy vấn
            return false;
        }
    } else {
        // Đã xảy ra lỗi khi chuẩn bị truy vấn
        return false;
    }
}
function hienLichSuChat($customer_id, $nguoiBanID, $conn) {
    // Viết truy vấn SQL để lấy lịch sử trò chuyện từ bảng hoithoa
    $query = "SELECT * FROM hoithoai WHERE (customer_id = ? AND ID_nguoiban = ?)  ORDER BY NgayTao ASC";
    $stmt = mysqli_prepare($conn, $query);

    // Kiểm tra xem truy vấn đã được chuẩn bị thành công chưa
    if ($stmt) {
        // Gắn các tham số vào truy vấn
        mysqli_stmt_bind_param($stmt, "iiii", $customer_id, $nguoiBanID);

        // Thực thi truy vấn
        mysqli_stmt_execute($stmt);

        // Lấy kết quả trả về
        $result = mysqli_stmt_get_result($stmt);

        // Kiểm tra xem có kết quả trả về hay không
        if (mysqli_num_rows($result) > 0) {
            // Hiển thị lịch sử trò chuyện
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div>';
                echo 'Nội dung: ' . $row['NoiDung'] . '<br>';
                echo '</div>';
            }
        } else {
            echo 'Không có lịch sử trò chuyện.';
        }
    } else {
        echo 'Đã xảy ra lỗi khi truy vấn cơ sở dữ liệu.';
    }
}

// Kiểm tra xem dữ liệu từ form đã được gửi lên chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect("localhost", "root", "", "dbmaytinh");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }

    // Nhận dữ liệu từ form
    $customer_id = $_SESSION['customer_id'];
    $noiDung = $_POST['noiDung'];

    // Gọi hàm để lưu hội thoại
    if (luuHoiThoai($customer_id, 1, $noiDung, $conn)) {
        echo "Hội thoại đã được lưu thành công!";
    } else {
        echo "Đã xảy ra lỗi khi lưu hội thoại.";
    }

    // Đóng kết nối CSDL
    mysqli_close($conn);
}
?>

<!-- Hiển thị lịch sử trò chuyện -->
<div class="chat-history">
    <?php
    // Gọi hàm hiển thị lịch sử trò chuyện
    hienLichSuChat($_SESSION['customer_id'], 1, $conn);
    ?>
</div>