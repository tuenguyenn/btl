<?php
	include('db.php');
	$prodid = $_POST['prodid'];
	$pname=$_POST['pname'];
	$desc=$_POST['desc'];
	$price=$_POST['price'];
	$cat=$_POST['cat'];
	$dis =$_POST['discount'];
	mysqli_query($conn,"UPDATE products SET Product='$pname', Description='$desc', Price='$price', Category='$cat' ,discount='$dis'   WHERE Product_ID='$prodid'");
	header("location: admin.php");
?>