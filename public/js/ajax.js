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
                if(data === "empty") {
                    $('#product-list').html('<tr>\n' +
                        '     <td colspan="5" align="center">\n' +
                        '      Ваша корзина пуста!\n' +
                        '     </td>\n' +
                        '    </tr>');
                    $('#pay').prop("disabled",true);
                    $('#total_price').html(0+"₽");
                    $('#total_count').html(0);
                } else {
                    $('#pay').prop("disabled",false);
                    $('#product-list').html(data.cart_details);
                    $('#total_price').html(data.total_price+"₽");
                    $('#total_count').html(data.total_item);
                }
            }
        });
    }

    $(document).on('click', '.add_to_cart', function(){
        var id = $(this).attr("id");
        var product_quantity = 1;
        var action = "add";
        $.ajax({
            url:"/cart/add",
            method:"POST",
            data:{id:id, product_quantity:product_quantity, action:action},
            success:function(data)
            {
                load_cart_data();
            }
        });
    });

    $(document).on('click', '.delete', function(){
        var id = $(this).attr("id");
        var action = 'delete';
        $.ajax({
            url:"/cart/delete",
            method:"POST",
            data:{id:id, action:action},
            success:function(data)
            {
                load_cart_data();
            }
        });
    });

    $(document).on('click', '#pay', function(){
        var action = "show_payment";
        $.ajax({
            url:"/payment/show",
            method:"POST",
            data:{action:action},
            success:function(data)
            {
                $('#total_price_payment').html(data+"₽");
            }
        });
    });

    $(document).on('click', '#add_payment', function(){
        var action = "add_payment";
        var FIO = $('#inputFio').val();
        var number = $('#inputNumber').val();
        var delivery = 0;
        if($('#checkboxDelivery').prop('checked')) {
            delivery = 1;
        }
        var address = $('#inputAddress').val();
        $.ajax({
            url:"/payment/add",
            method:"POST",
            data:{action:action, FIO:FIO, number:number, delivery:delivery, address:address},
            success:function(data)
            {
                alert('Номер вашего заказа: '+data);
                load_cart_data();
            }
        });
    });

    $(document).on('click', '#status', function(){
        var action = "status_payment";
        var number = $('#number_payment').val();
        $.ajax({
            url:"/payment/status",
            method:"POST",
            data:{action:action, number_payment:number},
            success:function(data)
            {
                $('#status_payment').html(data);
            }
        });
    });
});
