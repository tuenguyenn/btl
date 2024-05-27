<?php
	include('db.php');
	$id=$_GET['id'];
	$result = mysqli_query($conn,"SELECT * FROM products where Product_ID='$id'");
		while($row = mysqli_fetch_array($result))
			{
				$image=$row['imgUrl'];
			}
?>
<img src="reservation/img/products/<?php echo $image ?>">
<form action="editpicexec.php" method="post" enctype="multipart/form-data">
	<br>
	<input type="hidden" name="prodid" value="<?php echo $id=$_GET['id']; ?>">
	chọn ảnh
	<br>
	<input type="file" name="image"><br>
	<input type="submit" value="Upload">
</form>