$(function(){
   
    //when add to cart is clicked
    $('#add-to-cart').on('click', function() {
        $(this).siblings('.info').fadeIn(700).fadeOut(1000);
        var priceWithDot = $(this).siblings('p').children('.price').html(); // Lấy giá có dấu chấm
        var priceWithoutDot = priceWithDot.replace(/\./g, ''); // Loại bỏ tất cả các dấu chấm trong giá
        var price = parseInt(priceWithoutDot); // Chuyển đổi chuỗi thành số nguyên
        var product = $(this).siblings('.product').html();
        $.post('cart/data.php?q=addtocart', {
            price: price,
            product: product,
            qty: 1
        });
    });
    
    
    
    //remove product from cart
    $('.removeproduct').on('click',function(){
        $(this).parent().parent().fadeOut(300);
        var id = $(this).siblings('.proID').val();
        $.post('cart/data.php?q=removefromcart',
               {
                    proID:id
               }
        );

    });    
    //set time
    setInterval(function() {
        $.get("cart/data.php?q=countcart",function(data){
            $('.badge').html(data);
        });
        
        $.get("cart/data.php?q=countorder",function(data){
            $('.order-admin-badge').html(data);
        });
        
        $.get("cart/data.php?q=countproducts",function(data){
            $('.products-admin-badge').html(data);
        });
        
        $.get("cart/data.php?q=countcategory",function(data){
            $('.category-admin-badge').html(data);
        });
        
    }, 500);
    
    //confirmation
    $('.confirm').on('click',function(){
        var confirmation = confirm("Are you sure?");
        if(!confirmation){
            return false;   
        }
    });
    
    //login
    
  
});