<?php include('db.php'); ?>
<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); ?>
<?php
    $jim = new Admin();
    $p = isset($_GET['p']) ? $_GET['p'] : null;
    if($p == 'deliver'){
        $jim->deliver(); 
    }else if($p == 'paid'){
        $jim->paid();   
    }else if($p == 'delete'){
        $jim->delete();   
    }
    
    class Admin {
        
        function getunpaidorders(){
            global $conn;
                $q = "SELECT * FROM dbmaytinh.order where status='unconfirmed' order by dateOrdered desc";
                $result = mysqli_query($conn,$q);
            
                return $result;
        }
        function getdeliveredorders(){
            global $conn;
                $q = "SELECT * FROM dbmaytinh.order where status='delivered' order by dateDelivered desc";
                $result = mysqli_query($conn,$q);
            
                return $result;
        }
        function getpaidorders(){
            global $conn;
                $q = "SELECT * FROM dbmaytinh.order where status='confirmed' order by dateDelivered desc";
                $result = mysqli_query($conn,$q);
            
                return $result;
        }
        function getcancelorders(){
            global $conn;
                $q = "SELECT * FROM dbmaytinh.order where status='canceled' order by dateOrdered desc";
                $result = mysqli_query($conn,$q);
            
                return $result;
        }
        
        
        function getorder(){
            global $conn;
            $id = $_GET['id'];
            $q = "SELECT * FROM dbmaytinh.order where id=$id";
            $result = mysqli_query($conn,$q);
            
            return $result;
        }
        
        function deliver(){
            global $conn;
            $date = date('m/d/y h:i:s A');
            $id = $_GET['id'];
            $q = "UPDATE dbmaytinh.order set dateDelivered='$date', status='delivered' where id=$id";
            mysqli_query($conn,$q);
            
            return true;
        }
        function paid(){
            global $conn;
            $id = $_GET['id'];
            $date = date('m/d/y h:i:s A');
            $q = "UPDATE dbmaytinh.order set dateDelivered='$date', status='confirmed' where id=$id";
            mysqli_query($conn,$q);
            
            return true;
        }
        
        function getcategory(){
            global $conn;
            $q = "SELECT * from dbmaytinh.category order by title asc";
            $result = mysqli_query($conn,$q);
            
            return $result;
        }
        function addcategory($cat){
            global $conn;
            $q = "INSERT INTO dbmaytinh.category values('','$cat')";
            mysqli_query($conn,$q);
            return true;
        }
        
        function delete(){
            global $conn;
            $table = $_GET['table'];
            $id = $_GET['id'];
            
            mysqli_query($conn,"DELETE FROM dbmaytinh.$table where id=$id");
            return true;
        }
        
        function getcategorybyid($id){
            global $conn;
            $q = "Select * from dbmaytinh.category where id=$id";
            $result = mysqli_query($conn,$q);
            if($row = mysqli_fetch_array($result)){
                $category = $row['title'];
            }
            return $category;
        }
        
        function updatecategory($cat,$id){
            global $conn;
            $q = "update dbmaytinh.category set title='$cat' where id=$id";   
            mysqli_query($conn,$q);
            return true;
        }
        function getOrdersByDateRange($startDate, $endDate) {
            global $conn;
            $sql = "SELECT * FROM orders WHERE dateOrdered BETWEEN '$startDate' AND '$endDate'";
            $result = mysqli_query($conn, $sql);
            return $result;
        }
    
        // Tạo báo cáo doanh thu theo ngày
        function generateDailyRevenueReport($date) {
            $startDate = date('Y-m-d', strtotime($date));
            $endDate = date('Y-m-d', strtotime($date . ' + 1 day'));
            $revenue = $this->calculateRevenue($startDate, $endDate);
            return array('date' => $date, 'revenue' => $revenue);
        }
    
        // Tạo báo cáo doanh thu cho 7 ngày gần nhất
        function generateLast7DaysRevenueReport() {
            // Lấy ngày kết thúc là ngày hiện tại
            $endDate = date('Y-m-d');
            
            // Lấy ngày bắt đầu là ngày 7 ngày trước đó
            $startDate = date('Y-m-d', strtotime('-7 days'));
            
            // Gọi hàm tính doanh thu với khoảng thời gian từ ngày bắt đầu đến ngày kết thúc
            $revenue = $this->calculateRevenue($startDate, $endDate);
            
            // Trả về một mảng chứa ngày bắt đầu, ngày kết thúc và doanh thu
            return array('start_date' => $startDate, 'end_date' => $endDate, 'revenue' => $revenue);
        }
        
    
        // Tạo báo cáo doanh thu cho 30 ngày gần nhất
        function generateLast30DaysRevenueReport() {
            $endDate = date('Y-m-d');
            $startDate = date('Y-m-d', strtotime('-30 days'));
            $revenue = $this->calculateRevenue($startDate, $endDate);
            return array('start_date' => $startDate, 'end_date' => $endDate, 'revenue' => $revenue);
        }
    
        // Tính tổng doanh thu trong một khoảng thời gian cụ thể
        function calculateRevenue($startDate, $endDate) {
            global $conn;
            $sql = "SELECT SUM(amount) AS totalRevenue FROM `order` WHERE dateOrdered BETWEEN '$startDate' AND '$endDate'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            return $row['totalRevenue'];
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('session.php'); ?>
<link rel="stylesheet" href="css/style1.css" type="text/css" media="screen" charset="utf-8">
<script src="admin.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	

<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin|Quản lý</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
       
    
    

<body>
<header id="header">
     
	</header>
    