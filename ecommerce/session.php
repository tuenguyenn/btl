<?php

session_start();
//Kiểm tra xem biến session SESS_MEMBER_ID có tồn tại hay không
if (!isset($_SESSION['login']) || (trim($_SESSION['login']) == '')) {
    header("location: login.php");
    exit();
}
$session_id=$_SESSION['login'];
?>