<div class="scroll-to-top" id="scrollToTop" style="display: none;">
    <a href="#"><img src="https://ps.w.org/wpfront-scroll-top/assets/icon.svg?rev=1534312"  height="50px" width="50px" 
 alt="Scroll To Top"></a>
</div>
<div class="chat">
    <div><a href="#" class="open-chat"><img height="50px" width="50px" src="https://shopdunk.com/images/uploaded-source/icon/hotline.png" alt="Hotline"></a></div>
    <div><a href="#" class="open-chat"><img width="70px" height="70px" src="https://vcdn.subiz-cdn.com/widget-v4/public/assets/img/bubble_default.7d5e4ab.svg" alt="Chat"></a></div>
</div>

<div class="chat-options" id="chatOptions" style="display: none;">
    <a href="https://zalo.me/0828427851" target="_blank">
        <img src="https://cdn.haitrieu.com/wp-content/uploads/2022/01/Logo-Zalo-App-Rec.png" alt="Messenger" width="50px" height="50px" class="chat-option-2">
    </a>
    <a href="https://www.facebook.com/profile.php?id=100045745680963" target="_blank">
        <img src="https://shopdunk.com/images/uploaded-source/icon/ic_messenger.png" alt="Facebook" width="50x" height="50px " class="chat-option">
    </a>
</div>
<style>
    .chat { 
    align-items: center;
    display: flex;
    flex-direction: column;
    gap: 30px;
    position: fixed; 
    bottom: 20px; 
    right: 20px; 
    z-index: 9999; 
    color: white;
}

.chat-options {
    display: flex;
    flex-direction: column;
    gap: 10px;
    position: fixed;
    bottom: 25px; 
    right: 90px; /* Di chuyển về bên trái so với phần chat */
    z-index: 9999; 
}


.chat-option {
    background-color: #fff;
    border-radius: 50%;
    overflow: hidden;
   
}

.chat-option-2 {
    background-color: #fff;
    border-radius: 50%;
    overflow: hidden;
   
    
    margin-left: 20px;
}
.scroll-to-top {
    position: fixed;
    bottom: 180px; /* Điều chỉnh vị trí để nằm trên nút chat option */
    right: 20px;
    z-index: 9999;
}
.scroll-to-top a {
    display: block;
    padding: 10px;
    color: white;
    border-radius: 50%;
    text-align: center;
    text-decoration: none;
   
}



</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.open-chat').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
            var chatOptions = document.getElementById('chatOptions');
            // Kiểm tra nếu form đang ẩn thì hiển thị, ngược lại ẩn đi
            if (chatOptions.style.display === 'none' || chatOptions.style.display === '') {
                chatOptions.style.display = 'flex'; // Hiển thị tùy chọn trò chuyện
            } else {
                chatOptions.style.display = 'none'; // Ẩn tùy chọn trò chuyện
            }
        });
    });
});
document.addEventListener("DOMContentLoaded", function() {
    var scrollToTopButton = document.getElementById('scrollToTop');

    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            // Hiển thị nút cuộn lên đầu trang khi cuộn xuống
            scrollToTopButton.style.display = 'block';
        } else {
            // Ẩn nút cuộn lên đầu trang khi lên trên
            scrollToTopButton.style.display = 'none';
        }
    });

    scrollToTopButton.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Cuộn mềm mại
        });
    });
});

</script>