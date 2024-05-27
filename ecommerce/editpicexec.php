<?php
include('db.php');
	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		if ($image_size==FALSE) {
		
			echo '<script>alert("Không phải dạng ảnh.");</script>';
			
		}else{
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"reservation/img/products/" . $_FILES["image"]["name"]);
			
			$location=$_FILES["image"]["name"];
			$prodid=$_POST['prodid'];
			
			if(!$update=mysqli_query($conn,"UPDATE products SET imgUrl = '$location' WHERE Product_ID='$prodid'")) {
			
				echo mysqli_error($conn);
				
			}
			else{
			
			header("location: admin.php");
			exit();
			}
			}
	}


?>