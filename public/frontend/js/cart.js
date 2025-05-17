function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

function getDataCart() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/get-data-cart",
        method: "GET",
        success: function (response) {
            $(".cart-sidebar").html(response);

        },
    });
}


function shopnow(proId,qty) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if(qty == 0){
        var qty = $( "#inputqty"+proId ).val();
        $.ajax({
            url: "/update-cart",
            method: "POST",
            data: {
                'quantity': qty,
                'id': proId,
            },
            success: function (response) {

            },
        });

    }else{
        var qty = $( "#inputqty").val();
        $.ajax({
            url: "/add-to-cart",
            method: "POST",
            data: {
                'quantity': qty,
                'product_id': proId,
            },
            success: function (response) {
                window.location.href = '/gio-hang.html';
            },
        });
    }
}
function addToCart(proId,qty, type = null) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if(qty == 0){
        var qty = $( "#inputqty"+proId ).val();
        if(type && type == 'increment') {
            qty++;
        } else if(type && type == 'decrement') {
            qty--;
        }

        $.ajax({
            url: "/update-cart",
            method: "POST",
            data: {
                'quantity': qty,
                'id': proId,
            },
            success: function (response) {
                // console.log(response);
                var html = '';
                var total = 0;
                var qtys = 0;
                Object.keys(response.cart).forEach(function (key){
                    total += (response.cart[key].price - (response.cart[key].price*(response.cart[key].discount/100))) * response.cart[key].quantity
                    qtys += parseInt(response.cart[key].quantity)
                });

                $('.cart_count').html(qtys);
                $(".cart-sidebar").html(response.view);
                // $.notify("Thêm giỏ hàng thành công",'success');
            }
        });

    }else{
        var qty = $( "#inputqty").val() || 1;
        $.ajax({
            url: "/add-to-cart",
            method: "POST",
            data: {
                'quantity': qty,
                'product_id': proId,
            },
            success: function (response) {
                // console.log(response);
                var html = '';
                var total = 0;
                var qtys = 0;
                Object.keys(response.cart).forEach(function (key){
                    total += (response.cart[key].price - (response.cart[key].price*(response.cart[key].discount/100))) * response.cart[key].quantity
                    qtys += parseInt(response.cart[key].quantity)
                });

                $('.cart_count').html(qtys);
                $(".cart-sidebar").html(response.view);
                // $.notify("Thêm giỏ hàng thành công",'success');
            },
        });
    }
}
function removeCart(cart_id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/remove-from-cart",
        method: "POST",
        data: {
            'id': cart_id
        },
        success: function (response) {
            var total = 0;
            var qtys = 0;
            Object.keys(response.cart).forEach(function (key){
                total += (response.cart[key].price - (response.cart[key].price*(response.cart[key].discount/100))) * response.cart[key].quantity
                qtys += parseInt(response.cart[key].quantity)
            });

            $('.cart_count').html(qtys);
            $(".cart-sidebar").html(response.view);
        },
    });
}

function removeCartFromList(cart_id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/remove-from-cart?view=list",
        method: "POST",
        data: {
            'id': cart_id
        },
        success: function (response) {
            var total = 0;
            var qtys = 0;
            Object.keys(response.cart).forEach(function (key){
                total += (response.cart[key].price - (response.cart[key].price*(response.cart[key].discount/100))) * response.cart[key].quantity
                qtys += parseInt(response.cart[key].quantity)
            });

            $('.cart_count').html(qtys);
            $(".cart-list").html(response.view);

            if(response.cart.length == 0) {
                $(".cart-list").empty();
                $(".cart-empty").html(response.view);
            }
        },
    });
}

function qtyminus(id){
    const input = document.getElementById('quantity-' + id);

    const min = parseInt(input.min, 10) || 1;
    let val = parseInt(input.value, 10) || min;

    if (val > min) {
        input.value = val - 1;
    }

    $.ajax({
        url: "/update-cart?view=list",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'quantity': $('#quantity-'+id).val(),
            'id': id,
        },
        success: function (response) {
            // console.log(response);
            var total = 0;
            var qtys = 0;
            Object.keys(response.cart).forEach(function (key){
                total += (response.cart[key].price - (response.cart[key].price*(response.cart[key].discount/100))) * response.cart[key].quantity
                qtys += parseInt(response.cart[key].quantity)
                var price = formatNumber((response.cart[key].price - (response.cart[key].price*(response.cart[key].discount/100))) * response.cart[key].quantity)+"₫";
                $('#cartprice-'+key).html(price);
            });

            $('.cart_count').html(qtys);
            $(".cart-list").html(response.view);
            $(".total-price").html(formatNumber(total)+"₫");
        },
    });

}
function qtyplus(id){
    var quantity = parseInt($('#quantity-'+id).val());
    $('#quantity-'+id).val(quantity + 1)
    $.ajax({
        url: "/update-cart?view=list",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'quantity': $('#quantity-'+id).val(),
            'id': id,
        },
        success: function (response) {
            var total = 0;
            var qtys = 0;
            Object.keys(response.cart).forEach(function (key){
                total += (response.cart[key].price - (response.cart[key].price*(response.cart[key].discount/100))) * response.cart[key].quantity
                qtys += parseInt(response.cart[key].quantity)
                var price = formatNumber((response.cart[key].price - (response.cart[key].price*(response.cart[key].discount/100))) * response.cart[key].quantity)+"₫";
                $('#cartprice-'+key).html(price);
            });
            $('.cart_count').html(qtys);
            $(".cart-list").html(response.view);
            $(".total-price").html(formatNumber(total)+"₫");
        },
    });
}
function qtyplushome(id){
    var quantity = parseInt($('#inputqty-'+id).val());
    $('#inputqty-'+id).val(quantity+1)
    $.ajax({
        url: "/update-cart",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'quantity': $('#inputqty-'+id).val(),
            'id': id,
        },
        success: function (response) {
            // console.log(response);
            var html = '';
            var total = 0;
            var qtys = 0;
            Object.keys(response).forEach(function (key){
                html +=               '<div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">';
                html +=                   '<div class="ajaxcart__row">';
                html +=                       '<div class="ajaxcart__product cart_product" data-line="1">';
                html +=                           '<a href="javascript:;" class="ajaxcart__product-image cart_image" title="'+JSON.parse(response[key].name)[0].content+'">';
                html +=                                    '<img width="80" height="80" src="'+response[key].image+'" alt="Samsung Galaxy Note 21">';
                html +=                            '</a>';

                html +=                          ' <div class="grid__item cart_info">';
                html +=                               '<div class="ajaxcart__product-name-wrapper cart_name">';
                html +=                                   '<a href="javascript:;" class="ajaxcart__product-name h4" title="'+JSON.parse(response[key].name)[0].content+'">'+JSON.parse(response[key].name)[0].content+'</a>';
                html +=                               '</div>';
                html +=                               '<div class="grid">';
                html +=                                   '<div class="grid__item one-half cart_select cart_item_name">';
                html +=                                       '<label class="cart_quantity">Số lượng x'+ response[key].quantity +'</label>';
                html +=                                       '<div class="ajaxcart__qty input-group-btn">';
                html +=                                  '</div>';
                html +=                              '</div>';
                html +=                              '<div class="grid__item one-half text-right cart_prices">';
                html +=                                  '<span class="cart-price">'+ formatNumber((response[key].price - (response[key].price*(response[key].discount/100)))) +'₫</span>';
                html +=                              '</div>';
                html +=                          '</div>';
                html +=                      '</div>';
                html +=                  '</div>';
                html +=              '</div>';
                html +=          '</div>';
                total += (response[key].price - (response[key].price*(response[key].discount/100))) * response[key].quantity
                qtys += parseInt(response[key].quantity)
                var price = formatNumber((response[key].price - (response[key].price*(response[key].discount/100))) * response[key].quantity)+"₫";
                $('#cartprice-'+key).html(price);
            });
            html +=          '<div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer">';
            html +=              '<div class="ajaxcart__subtotal">';
            html +=                  '<div class="cart__subtotal">';
            html +=                      '<div class="cart__col-6">Tổng tiền:</div>';
            html +=                      '<div class="text-right cart__totle">';
            html +=                             '<span class="total-price">'+formatNumber(total)+'₫</span>';
            html +=                       '</div>';
            html +=                  '</div>';
            html +=              '</div>';
            html +=              '<div class="cart__btn-proceed-checkout-dt">';
            html += '<div class="row">';
            html += '<div class="col-6">';
            html +=    '<a href="/gio-hang.html" class="buttons btn btn-default " title="Xem chi tiết">Xem chi tiết</a>';
            html += '</div>';
            html += '<div class="col-6">';
            html +=    '<a href="/thanh-toan.html" type="button" class="button btn btn-default" title="Thanh toán">Thanh toán</a>';
            html += '</div>';
            html += '</div>';
            html +=              '</div>';
            html +=          '</div>';
            $('.cart_count').html(qtys);
            $(".cart_list").html(html);
            $(".total-price").html(formatNumber(total)+"₫" );
        },
    });
}
function qtyminusshome(id){
    var quantity = parseInt($('#inputqty-'+id).val());
    if(quantity > 1){
        $('#inputqty-'+id).val(quantity - 1)
    }else{
        $('#inputqty-'+id).val(1)
    }
    $.ajax({
        url: "/update-cart",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'quantity': $('#inputqty-'+id).val(),
            'id': id,
        },
        success: function (response) {
            // console.log(response);
            var html = '';
            var total = 0;
            var qtys = 0;
            Object.keys(response).forEach(function (key){
                html +=               '<div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">';
                html +=                   '<div class="ajaxcart__row">';
                html +=                       '<div class="ajaxcart__product cart_product" data-line="1">';
                html +=                           '<a href="javascript:;" class="ajaxcart__product-image cart_image" title="'+JSON.parse(response[key].name)[0].content+'">';
                html +=                                    '<img width="80" height="80" src="'+response[key].image+'" alt="Samsung Galaxy Note 21">';
                html +=                            '</a>';

                html +=                          ' <div class="grid__item cart_info">';
                html +=                               '<div class="ajaxcart__product-name-wrapper cart_name">';
                html +=                                   '<a href="javascript:;" class="ajaxcart__product-name h4" title="'+JSON.parse(response[key].name)[0].content+'">'+JSON.parse(response[key].name)[0].content+'</a>';
                html +=                               '</div>';
                html +=                               '<div class="grid">';
                html +=                                   '<div class="grid__item one-half cart_select cart_item_name">';
                html +=                                       '<label class="cart_quantity">Số lượng x'+ response[key].quantity +'</label>';
                html +=                                       '<div class="ajaxcart__qty input-group-btn">';
                html +=                                  '</div>';
                html +=                              '</div>';
                html +=                              '<div class="grid__item one-half text-right cart_prices">';
                html +=                                  '<span class="cart-price">'+ formatNumber((response[key].price - (response[key].price*(response[key].discount/100)))) +'₫</span>';
                html +=                              '</div>';
                html +=                          '</div>';
                html +=                      '</div>';
                html +=                  '</div>';
                html +=              '</div>';
                html +=          '</div>';
                total += (response[key].price - (response[key].price*(response[key].discount/100))) * response[key].quantity
                qtys += parseInt(response[key].quantity)
                var price = formatNumber((response[key].price - (response[key].price*(response[key].discount/100))) * response[key].quantity)+"₫";
                $('#cartprice-'+key).html(price);
            });
            html +=          '<div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer">';
            html +=              '<div class="ajaxcart__subtotal">';
            html +=                  '<div class="cart__subtotal">';
            html +=                      '<div class="cart__col-6">Tổng tiền:</div>';
            html +=                      '<div class="text-right cart__totle">';
            html +=                             '<span class="total-price">'+formatNumber(total)+'₫</span>';
            html +=                       '</div>';
            html +=                  '</div>';
            html +=              '</div>';
            html +=              '<div class="cart__btn-proceed-checkout-dt">';
            html += '<div class="row">';
            html += '<div class="col-6">';
            html +=    '<a href="/gio-hang.html" class="buttons btn btn-default " title="Xem chi tiết">Xem chi tiết</a>';
            html += '</div>';
            html += '<div class="col-6">';
            html +=    '<a href="/thanh-toan.html" type="button" class="button btn btn-default" title="Thanh toán">Thanh toán</a>';
            html += '</div>';
            html += '</div>';
            html +=              '</div>';
            html +=          '</div>';
            $('.cart_count').html(qtys);
            $(".cart_list").html(html);
            $(".total-price").html(formatNumber(total)+"₫" );
        },
    });
}





