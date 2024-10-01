<?php include('include/admin/header.php'); ?>
<?php
    $error_message = ''; 

    if(isset($_POST['addcategory'])){
        $category = trim($_POST['category']); 
        if(empty($category)){
            $error_message = "Tên loại hàng không được để trống!"; 
        } elseif(strlen($category) > 70) {
            $error_message = "Tên loại hàng không được vượt quá 70 ký tự!"; 
        } else {
            $jim->addcategory($category); 
        }
    }
?>

<section>
    <div class="container" style="max-width:1200px">
        <div class="row">
            <?php include('include/admin/sidebar.php'); ?>
            <div class="col-sm-9 padding-right">
                <div class="features_items">

                    <!-- Form thêm loại hàng -->
                    <form method="POST" action="admincategory.php">
                        <div class="form-group">
                            <div class="input-group" style="padding-top: 10px;">
                                <div class="input-group-addon">Thêm loại:</div>
                                <input name="category" class="form-control" type="text" placeholder="Nhập tên loại hàng.">
                            </div>
                            <!-- Hiển thị thông báo lỗi nếu có -->
                            <?php if (!empty($error_message)): ?>
                                <small class="text-danger"><?php echo $error_message; ?></small>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn" name="addcategory" style="background-color: #0066cc; color:white">Thêm</button>
                        </div>
                    </form>

                    <table class="table table-bordered">
                        <thead class="bg-primary" style="background-color: #0066cc; color:white">
                            <th>Tên</th>
                            <th colspan="2">Tuỳ chọn</th>
                        </thead>
                        <tbody>
                        <?php $category = $jim->getcategory();?>
                        <?php while($row = mysqli_fetch_array($category)):?>
                            <tr>
                                <td><?php echo $row['title'];?></td>    
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
    </style>
</section>

<?php include('include/admin/footer.php'); ?>
