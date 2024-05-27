<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    
    
    
    <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

  //Lấy ID của phần tử cần xoá:
var element = $(this);
var del_id = element.attr("id");
//gửi chuỗi thông tin  chứa giá trị "id" để gửi đến server qua yêu cầu Ajax.
var info = 'id=' + del_id;
if(confirm("Bạn có chắc muốn xoá ?")) {
    // Nếu người dùng nhấn OK trong hộp thoại xác nhận
    $.ajax({
        type: "GET",
        url: "../deleteprod.php",
        data: info,
        success: function(){
            // Code xử lý khi yêu cầu xoá thành công
        }
    });
    // Ẩn phần tử cha của nút "delbutton" được nhấp
    $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");
}


return false;

});

});
</script>
<script src="js/script.js"></script>
