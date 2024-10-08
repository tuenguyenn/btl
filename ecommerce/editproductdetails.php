
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
        <form action="execeditproduct.php" method="post" enctype="multipart/form-data" name="editproduct" onsubmit="return validateForm()">
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
                <input type="text" name="price" value="<?php echo $price ?>" onkeypress="return isNumberKey(event)"/>
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
                <input type="text" name="discount" value="<?php echo $dis ?>"onkeypress="return isNumberKey(event)" />
            </div>
            <input type="submit" value="Lưu">
        </form>
        <script>
            function validateForm() {
                var a = document.forms["editproduct"]["pname"].value.trim();;
                if (a == null || a == "") {
                    alert("Nhập tên sản phẩm");
                    return false;
                }
                var b = document.forms["editproduct"]["desc"].value.trim();;
                if (b == null || b == "") {
                    alert("Nhập mô tả sản phẩm");
                    return false;
                }
                var c = document.forms["editproduct"]["price"].value.trim();;
                if (c == null || c == "") {
                    alert("Nhập giá");
                    return false;
                }
                var d = document.forms["editproduct"]["cat"].value.trim();;
                if (d == null || d == "") {
                    alert("Nhập loại hàng");
                    return false;
                }
               
            
            }

            function isNumberKey(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;

                return true;
            }
    </script>
</body>
</html>
