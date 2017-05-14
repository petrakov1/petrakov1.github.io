
        $(document).ready(
            
            function () {
                $('<div class="l-top"></div><div class="l-bottom"></div>').insertAfter(".link a");
                $(function () {
                    $('a[href*=#]:not([href=#])').click(function () {
                        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                            location.hostname == this.hostname) {
                            var target = $(this.hash);
                            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                            if (target.length) {
                                $('html,body').animate({
                                    scrollTop: target.offset().top
                                }, 1000);
                                return false;
                            }
                        }
                    });
                });







            }
        );




// /* lazyload */

// function loadmore(last_id, category) {
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function () {
//         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//             if (document.getElementById("loadedProducts") != null) {
//                 $(".loadmore").remove();
//                 setTimeout(function () {
//                     document.getElementById("loadedProducts").innerHTML += xmlhttp.responseText;
//                     $('.wrap-loader').addClass("off");

//                 }, 500);

//             }
//         }
//     };
//     // alert("loadmore.php?last_id="+last_id+"&c="+category);
//     xmlhttp.open("GET", "loadmore.php?last_id=" + last_id + "&c=" + category, true);
//     xmlhttp.send();

// }

// function loadproduct(id) {
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function () {
//         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//             if (document.getElementById("product") != null) {
//                 document.getElementById("product").innerHTML = xmlhttp.responseText;

//                 // $(".loadmore").remove();
//                 // setTimeout(function(){
//                 // $('.wrap-loader').addClass("off");
//                 // 
//                 // }, 500);

//             }
//         }
//     };
//     // alert("loadmore.php?last_id="+last_id+"&c="+category);
//     xmlhttp.open("GET", "/product-block.php?id=" + id, true);
//     xmlhttp.send();

// }

// function getn() {
//     return document.getElementById("num").innerHTML;
// }

// function changepic(src) {
//     $("#big-image").attr("src", src);
// }

function changenum(i) {
    var n = parseInt(document.getElementById("num").getAttribute('value'));
    n += i;
    if (n > 0) {
        document.getElementById("num").val = n;

    }
}


$(document).ready(function () {

 $(".cart-button").click(function () {
        // $("#cart-window").toggleClass("open");
        $("body").toggleClass("open");
    });

})



//     $('#fast-form').on('submit', function (e) {
//         e.preventDefault();
//         if ($(this).valid()) {

//             $.ajax({
//                 url: "code/buyone.php",
//                 type: "post",
//                 data: $(this).serialize(),
//                 success: function (res) {



//                     $("#fast-modal").removeClass("open");

//                     $("#pay-yandex").toggleClass("open");
//                     console.log(res);
//                     console.log("yandex");
//                       if (isJson(res))
//                       {
//                          res = JSON.parse(res);
//                            $("#yandex-number").attr("value",res.mail);
//                            $("#yandex-order-number").attr("value",res.id);
//                            $("#yandex-name").attr("value",res.name);
//                            $("#yandex-email").attr("value",res.mail);
//                            $("#yandex-addr").attr("value",res.country+' '+res.city+' '+res.address);
//                            $("#yandex-shopSuccessURL").attr("value","http://upgradekids.ru/thankyou.php?oid="+res.id);
                           
//                       }

//                           if ( document.getElementById("pay-total1")!=null)
//                         {
//                             document.getElementById("pay-total1").innerHTML = res.sum;

//                         }
//                         if ($("#pay-yandex-total")!=null){
//                             $("#pay-yandex-total").attr("value", res.sum);

//                             }
//                     document.getElementById("push-text").innerHTML = "Спасибо за заказ";
//                     document.getElementById("push").classList.add("open");
//                     setTimeout(function () {
//                         document.getElementById("push").classList.remove("open");
//                     }, 2500);
//                 },
//                 error: function (err) {
//                     console.log(err);
//                 }

//             });
//         }
//     });
//      $("#buy-form").validate();

//     $('#buy-form').on('submit', function (e) {
//         e.preventDefault();
//         if ($(this).valid()) {

//             $.ajax({
//                 url: "code/mail.php",
//                 type: "post",
//                 data: $(this).serialize(),
//                 success: function (res) {



//                     $("#buy-modal").removeClass("open");
//                     $("#pay-yandex").toggleClass("open");
//                     console.log(res);
//                     console.log("yandex");
//                       if (isJson(res))
//                       {
//                          res = JSON.parse(res);
//                            $("#yandex-number").attr("value",res.mail);
//                            $("#yandex-order-number").attr("value",res.id);
//                            $("#yandex-name").attr("value",res.name);
//                            $("#yandex-email").attr("value",res.mail);
//                            $("#yandex-addr").attr("value",res.country+' '+res.city+' '+res.address);
//                            $("#yandex-shopSuccessURL").attr("value","http://upgradekids.ru/thankyou.php?oid="+res.id);
                           
//                       }


//                     document.getElementById("push-text").innerHTML = "Спасибо за заказ";
//                     document.getElementById("push").classList.add("open");
//                     setTimeout(function () {
//                         document.getElementById("push").classList.remove("open");
//                     }, 2500);
//                 },
//                 error: function (err) {
//                     console.log(err);
//                 }

//             });
//         }
//     });

//     $('#call-form').on('submit', function (e) {
//         e.preventDefault();
//         if ($(this).valid()) {

//             $.ajax({
//                 url: "code/call.php",
//                 type: "post",
//                 data: $(this).serialize(),
//                 success: function (res) {



//                     $("#call-modal").removeClass("open");
//                     $("body").removeClass("open");




//                     document.getElementById("push-text").innerHTML = "Спасибо за заявку";
//                     document.getElementById("push").classList.add("open");
//                     setTimeout(function () {
//                         document.getElementById("push").classList.remove("open");
//                     }, 2500);
//                 },
//                 error: function (err) {
//                     console.log(err);
//                 }

//             });
//         }
//     });


//     $('#form-order').on('submit', function (e) {
//         e.preventDefault();
//         if ($(this).valid()) {

//             $.ajax({
//                 url: "order.php",
//                 type: "post",
//                 data: $(this).serialize(),
//                 success: function (res) {


//                     if ($('input[name=payment_type]:checked').val() == "yandex") {
//                         $("#modal").toggleClass("open");
//                         $("#pay-yandex").toggleClass("open");
//                         if (isJson(res)) {
//                             res = JSON.parse(res);
//                             $("#yandex-number").attr("value", res.mail);
//                             $("#yandex-order-number").attr("value", res.id);
//                             $("#yandex-name").attr("value", res.name);
//                             $("#yandex-email").attr("value", res.mail);
//                             $("#yandex-addr").attr("value", res.country + ' ' + res.city + ' ' + res.address);
//                         }
//                     } else if ($('input[name=payment_type]:checked').val() == "paypal") {
//                         $("#modal").toggleClass("open");
//                         $("#pay-pal").toggleClass("open");
//                     }



//                     //                    $("body").toggleClass("open");
//                     //                    document.getElementById("push-text").innerHTML = "ваш заказ обрабатывается";
//                     //                    document.getElementById("push").classList.add("open");
//                     //                    setTimeout(function(){ document.getElementById("push").classList.remove("open");}, 2500);
//                 },
//                 error: function (err) {
//                     console.log(err);
//                 }

//             });
//         }
//     });

//     $('#login-form').on('submit', function (e) {
//         e.preventDefault();
//         if ($(this).valid()) {

//             $.ajax({
//                 url: "login.php",
//                 type: "post",
//                 data: $(this).serialize(),
//                 success: function (res) {
//                     if (res == 1) {
//                         location.reload();
//                     } else {
//                         document.getElementById("login-error").innerHTML = "Неверный логин или пароль.";
//                     }

//                 },
//                 error: function (err) {
//                     console.log(err);
//                 }
//             });
//         }
//     });

//     $('#register-form').on('submit', function (e) {
//         e.preventDefault();
//         if ($(this).valid()) {
//             if ($('input[name="password1"]').val() == $('input[name="password2"]').val()) {
//                 $.ajax({
//                     url: "register.php",
//                     type: "post",
//                     data: $(this).serialize(),
//                     success: function (res) {
//                         if (res == 1) {
//                             document.getElementById("push-text").innerHTML = "регистрация прошла успешно";
//                             document.getElementById("push").classList.add("open");
//                             setTimeout(function () {
//                                 document.getElementById("push").classList.remove("open");
//                             }, 2500);

//                         } else {
//                             document.getElementById("register-error").innerHTML = "Проверьте данные";
//                         }

//                     },
//                     error: function (err) {
//                         console.log(err);
//                     }

//                 });
//             } else {
//                 document.getElementById("register-error").innerHTML = "Пароли не совпадают.";
//             }
//         } else {
//             document.getElementById("register-error").innerHTML = "Проверьте данные";
//         }
//     });

//     $('#form-delivery').on('submit', function (e) {
//         e.preventDefault();
//         if ($(this).valid()) {

//             $("#modal").toggleClass("open");
//             $("#modal-delivery").toggleClass("open");
//         }
//     });
   



//     $('input:radio[name=delivery]').change(function () {
//         setCookie("cart_delivery", $(this).val(), 7);
//         setCookie("cart_delivery_price", $(this).attr("data-price"), 7);
//         if (getCookie("cart_delivery_price") != undefined) {
//             updateprice();
//         } else document.getElementById("del-total").innerHTML = getCookie("cart_sum") + " ₽";

//     });


//     $('.drop').hover(function () {
//         $('.drop-menu').toggleClass("open");
//     });

//     $(".modal-button").click(function () {
//         $("#modal").toggleClass("open");
//         $("body").toggleClass("open");
//     });

//     $(".modal-pay").click(function () {
//         $("#modal-pay").toggleClass("open");
//         $("body").toggleClass("open");
//     });

//     $(".modal-delivery").click(function () {
//         $("#modal-delivery").toggleClass("open");
//         $("body").toggleClass("open");
//     });

//     $(".modal-paypal").click(function () {
//         $("#pay-pal").toggleClass("open");
//         $("body").toggleClass("open");
//     });

//     $(".modal-yandex").click(function () {
//         $("#pay-yandex").toggleClass("open");
//         $("body").toggleClass("open");
//     });

//     $(".modal:before").click(function () {
//         $(".modal").removeClass("open");
//         $("body").remove("open");
//     });

//     var count = $(".gallery-p a").length;
//     if (count > 3) {
//         $('.gallery-p').slick({
//             dots: true,
//             centerMode: true,
//             variableWidth: true,
//             slidesToShow: 3,
//             slidesToScroll: 1,
//             prevArrow: $('.arrowprev'),
//             nextArrow: $('.arrownext'),
//         });
//     }


   
//     $(".modal-product").click(function () {
//         $("#product").toggleClass("open");
//         $("body").toggleClass("open");
//     });
//     $(".modal-call").click(function () {
//         $("#call-modal").toggleClass("open");
//         $("body").toggleClass("open");
//     });
//     $(".modal-fast").click(function () {
//         $("#fast-modal").toggleClass("open");
//         // $("body").toggleClass("open");
//     });

//     $(".modal-buy").click(function () {
//         $("#buy-modal").toggleClass("open");
//         $("body").toggleClass("open");
//     });

//     // $("#register-form").validate();
//     // $("#login-form").validate();

//     $(".paypal-button").click(function () {
//         $("#paypal-modal").toggleClass("open");
//         $("body").toggleClass("open");
//     });

//     $(".modal-button-wishlist").click(function () {
//         $("#modal-wishlist").toggleClass("open");
//         $("body").toggleClass("open");
//     });

//     $(".modal-map").click(function () {
//         $("#map-modal").toggleClass("open");
//         $("body").toggleClass("open");
//     });
//     $('.drop').hover(function () {
//         $(this).toggleClass("open");
//     });
//     $('.open-menu').click(function () {
//         $('#menu').toggleClass("open");
//     });

//     $('.open-login').click(function () {
//         $('#login').toggleClass("open");
//     });

//     $('.open-reg').click(function () {
//         $('#register').toggleClass("open");
//     });

//     $('.open-cart').click(function () {
//         $('#cart').toggleClass("open");
//         $('#cart-back').toggleClass("open");
//         $('body').toggleClass("open");

//     });


// })

// function scrollcart(n) {
//     $("#cart-scroll").scrollTop($("#cart-scroll").scrollTop() + n);
// }

// function product_modal() {
//     $("#product").toggleClass("open");
//     $("body").toggleClass("open");
// };

// function fast_modal() {
//     $("#fast-modal").toggleClass("open");
//     // $("body").toggleClass("open");

// }

// function buy_modal() {
//     $("#buy-modal").toggleClass("open");
//     $("body").toggleClass("open");

// }

// function buy_product(p_id, number, color, size) {

//     setCookie(onecartn, "[{}", 7);

//     var n = parseInt(getCookie(numn));
//     var product = {
//         id: p_id,
//         o_id: 1,
//         number: number,
//         size: size,
//         color: color
//     }

//     var date = new Date(new Date().getTime() + 6000 * 1000);
//     var cart = getCookie("one_cart");
//     var str = JSON.stringify(product, "");
//     setCookie(onecartn, getCookie("one_cart") + "," + str, 7);

//     $("#fast-modal").toggleClass("open");



function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
// function expand(){
//         $(".right").toggleClass("active");
// };
window.onload = function () {
    check_number();
    s_check_number();
    updatenumber();
}
