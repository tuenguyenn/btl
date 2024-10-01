<?php
include('db.php');

if (!isset($_FILES['image']['tmp_name'])) {
    echo "Vui lòng chọn ảnh để tải lên.";
} else {
    $file = $_FILES['image']['tmp_name'];
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);

    if ($image_size == FALSE) {
        echo "Không phải dạng ảnh!";
        exit();
    }

    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        echo "Có lỗi xảy ra khi tải lên ảnh!";
        exit();
    }

    if ($_FILES['image']['size'] > 5 * 1024 * 1024) { // 5MB
        echo "Dung lượng ảnh phải nhỏ hơn hoặc bằng 5MB!";
        exit();
    }

    $target_directory = "reservation/img/products/";
    $target_file = $target_directory . basename($_FILES["image"]["name"]);

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "Không thể di chuyển file tới thư mục đích!";
        exit();
    }

    $location = $_FILES["image"]["name"];
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $cat = mysqli_real_escape_string($conn, $_POST['cat']);

    // Check if product already exists
    $check_query = "SELECT * FROM products WHERE product = '$pname'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        echo "Sản phẩm đã tồn tại!";
        exit();
    }

    $update = mysqli_query($conn, "INSERT INTO products (imgUrl, product, Description, Price, Category)
                                   VALUES ('$location', '$pname', '$desc', '$price', '$cat')");

    if ($update) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Lỗi khi lưu thông tin sản phẩm vào cơ sở dữ liệu!";
    }
}
?>

