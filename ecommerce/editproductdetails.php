
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

		form{
			width: 400px;
		}
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        select {
            width: calc(100% - 12px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0066CC;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    
        <?php
            include('db.php');
            $id=$_GET['id'];
            $result = mysqli_query($conn,"SELECT * FROM products where Product_ID='$id'");
            while($row = mysqli_fetch_array($result)) {
                $pname=$row['Product'];
                $desc=$row['Description'];
                $price=$row['Price'];
                $cat=$row['Category'];
                $dis=$row['discount'];
            }
        ?>
        <form action="execeditproduct.php" method="post">
            <input type="hidden" name="prodid" value="<?php echo $_GET['id']; ?>">
            <div class="form-group">
                <label for="pname">Tên:</label>
                <input type="text" name="pname" value="<?php echo $pname ?>" />
            </div>
            <div class="form-group">
                <label for="desc">Mô tả:</label>
                <input type="text" name="desc" value="<?php echo $desc ?>" />
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="text" name="price" value="<?php echo $price ?>" />
            </div>
            <div class="form-group">
                <label for="cat">Loại:</label>
                <select name="cat">
                    <?php
                        include('db.php');
                        $r = mysqli_query($conn,"select * from category"); 
                        while($row = mysqli_fetch_array($r)){
                            $selected = ($cat == $row['title']) ? " selected='selected'" : "";
                            echo '<option'.$selected.'>'.$row['title'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="discount">Khuyến mãi:</label>
                <input type="text" name="discount" value="<?php echo $dis ?>" />
            </div>
            <input type="submit" value="Lưu">
        </form>
    
</body>
</html>
