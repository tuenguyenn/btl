<?php include('include/admin/header.php'); ?>
<?php
    $categoryvalue = '';
    $categoryID = isset($_GET['id']) ? $_GET['id'] : null;
    $error_message = ''; 
    if(isset($_POST['editcategory'])){
        $category = trim($_POST['category']); 
        
        if(empty($category)){
            $error_message = "Tên loại hàng không được để trống!"; 
        }elseif(mb_strlen($category) < 3 || mb_strlen($category) >= 70){
            $error_message = "Tên loại hàng phải có độ dài từ 3 đến 70 kí tự!"; 
        } else {
            $jim->updatecategory($category, $id); 
        }
    }
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $categoryvalue = $jim->getcategorybyid($id);
    }
?>
<section>
    <div class="container" style="max-width:1000px;">
        <div class="row">
            <?php include('include/admin/sidebar.php'); ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!-- Form chỉnh sửa loại hàng -->
                    <form method="POST" action="editcategory.php?id=<?php echo $categoryID;?>" onsubmit="return validateForm()">
                        <div class="form-group" style="padding-top: 10px;">
                            <div class="input-group">
                                <div class="input-group-addon">Tên loại:</div>
                                <input name="category" value="<?php echo htmlspecialchars($categoryvalue); ?>" class="form-control" type="text" placeholder="Nhập tên loại hàng..." minlength="3" maxlength="70" required>
                            </div>
                            <!-- Hiển thị thông báo lỗi nếu có -->
                            <?php if (!empty($error_message)): ?>
                                <small class="text-danger"><?php echo $error_message; ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="editcategory">Cập nhật</button>
                            <a href="admincategory.php" class="btn btn-success">Thêm loại hàng</a>
                        </div>
                    </form>
                    <hr />
                    <!-- Bảng danh sách loại hàng -->
                    <table class="table table-bordered">
                        <thead class="bg-primary">
                            <tr>
                                <th>Tên</th>
                                <th colspan="2">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $category = $jim->getcategory();?>
                        <?php while($row = mysqli_fetch_array($category)):?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['title']);?></td>    
                                <td><a href="editcategory.php?p=edit&&id=<?php echo $row['id']; ?>"><i class="fa fa-edit fa-lg text-success"></i><small>Sửa</small></a></td>    
                                <td><a href="admincategory.php?p=delete&&table=category&&id=<?php echo $row['id']; ?>" class="confirm"><i class="fa fa-times-circle fa-lg text-danger"></i> <small>Xoá</small></a></td>    
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        .col-sm-9 {
            background-color: #FFFFFF; 
            margin-top: 10px;
            padding-left: 5px;
            border: 1px solid  #ddd;
            border-radius: 10px;
        }
        .text-danger {
            color: #dc3545;
        }
    </style>

    <script>
        function validateForm() {
            var category = document.querySelector('[name="category"]').value.trim();
            if (category.length < 3 || category.length > 70) {
                alert("Tên loại hàng phải có độ dài từ 3 đến 70 kí tự!");
                return false;
            }
            return true;
        }
    </script>
</section>

<?php include('include/admin/footer.php'); ?>
