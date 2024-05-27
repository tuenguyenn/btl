<?php
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'dbmaytinh'; 
$link = mysqli_connect($db_host,$db_user,$db_pass,$db_database) or die('Không thể kết nối database');
mysqli_query($conn,"SET names UTF8");

?>