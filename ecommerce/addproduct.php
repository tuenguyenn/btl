

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
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

<body>
    <form action="addexec.php" method="post" enctype="multipart/form-data" name="addproduct" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="pname">Tên sản phẩm</label>
            <input name="pname" type="text" class="ed" placeholder="Nhập tên sản phẩm">
        </div>
        <div class="form-group">
            <label for="desc">Mô tả sản phẩm</label>
            <input name="desc" type="text" id="rate" class="ed" placeholder="Nhập mô tả sản phẩm">
        </div>
        <div class="form-group">
            <label for="price">Giá</label>
            <input name="price" type="text" id="qty" class="ed" onkeypress="return isNumberKey(event)" placeholder="Nhập giá">
        </div>
        <div class="form-group">
            <label for="cat">Loại hàng</label>
            <select name="cat" class="ed">
                <?php
                    include('db.php');
                    $r = mysqli_query($conn,"select * from category"); 
                    while($row = mysqli_fetch_array($r)){
                        echo '<option>'.$row['title'].'</option>';
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Chọn Ảnh sản phẩm</label>
            <input type="file" name="image" class="ed">
        </div>
        <input type="submit" name="Submit" value="Lưu" id="button1">
    </form>

    <script>
        function validateForm() {
            var a = document.forms["addproduct"]["pname"].value;
            if (a == null || a == "") {
                alert("Nhập tên sản phẩm");
                return false;
            }
            var b = document.forms["addproduct"]["desc"].value;
            if (b == null || b == "") {
                alert("Nhập mô tả sản phẩm");
                return false;
            }
            var c = document.forms["addproduct"]["price"].value;
            if (c == null || c == "") {
                alert("Nhập giá");
                return false;
            }
            var d = document.forms["addproduct"]["cat"].value;
            if (d == null || d == "") {
                alert("Nhập loại hàng");
                return false;
            }
            var e = document.forms["addproduct"]["image"].value;
            if (e == null || e == "") {
                alert("Chọn ảnh sản phẩm");
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
