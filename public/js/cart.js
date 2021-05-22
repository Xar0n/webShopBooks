$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    load_cart_data();
   function load_cart_data()
   {
       $.ajax({

          url:"/cart/item",
           method: "POST",
           dataType:"json",
           success: function (data)
           {
               $('#product-list').html(data.cart_details);
               $('#total_price').html(data.total_price);
               $('#total_count').html(data.total_count);
           }
       });
   }

    $(document).on('click', '.add_to_cart', function(){
        var id = $(this).attr("id");
        var title = $('#title'+id+'').val();
        var price = $('#price'+id+'').val();
        var product_quantity = 1;
        var action = "add";
            $.ajax({
                url:"/cart/add",
                method:"POST",
                data:{id:id, title:title, price:price, product_quantity:product_quantity, action:action},
                success:function(data)
                {
                    load_cart_data();
                }
            });
    });
});
