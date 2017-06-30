function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function deleteCookie(name) {
    setCookie(name, "", {
        expires: -1
    })
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; path=/; " + expires;
    //    alert (getCookie(cname));

}

function getprice() {
    var price = parseInt(getCookie("cart_sum"));
    return price;
}


function updateprice() {
    var price = getprice();

    if ( document.getElementById("total")!=null)
{
    var s= price + parseInt(getCookie("cart_delivery_price"));
    document.getElementById("total").innerHTML = s + " ₽";

}
if ( document.getElementById("sub-total")!=null)
{
    document.getElementById("sub-total").innerHTML = price + " ₽";

}

if ( document.getElementById("del-total")!=null)
{
    document.getElementById("del-total").innerHTML = getCookie("cart_delivery_price") + " ₽";

}

}

var numn = "cart_number";
var cartn = "cart";
var onecartn = "one_cart";


function check_number() {

    if (getCookie(numn) == undefined) {
        create_number();
    }
    if (getCookie(cartn) == undefined) {
        setCookie(cartn, "[{}", 7);
        setCookie(onecartn, "[{}", 7);

    }
    if (getCookie('cur_price') == undefined) {
        setCookie('cur_price', 0, 7);
    }

}

function check_dublicate(p_id, color, size) {
    //    alert("cart");

    var cart = getCookie("cart") + "]";
    //    alert(cart);

    cart = JSON.parse(cart);
    for (var i = 1; i <= parseInt(getCookie(numn)); i++) {
        if (cart[i].id == p_id && cart[i].color == color && cart[i].size == size) {
            return true;
        }

    }
    return false;
}

function get_dublicate(p_id, color, size) {
    //    alert("cart");

    var cart = getCookie("cart") + "]";
    //    alert(cart);
    cart = JSON.parse(cart);
    for (var i = 1; i <= parseInt(getCookie(numn)); i++) {
        if (cart[i].id == p_id && cart[i].color == color && cart[i].size == size) {
            console.log(p_id + color + size);
            return cart[i].o_id;
        }

    }
    return false;
}


function create_number() {
    setCookie(numn, 0, 7);
}

function add_number() {
    var n = parseInt(getCookie(numn));
    n = n + 1;
    setCookie(numn, n, 7);
}

function minus_number() {
    var n = parseInt(getCookie(numn));
    n = n - 1;
    setCookie(numn, n, 7);
}

function update_cart_number() {

}

function add_qty(o_id, num) {
    var cart = getCookie("cart") + "]";
    cart = JSON.parse(cart);
    for (var i = 1; i <= parseInt(getCookie(numn)); i++) {
        if (cart[i].o_id == o_id) {
            if ((parseInt(cart[i].number) + parseInt(num)) > 0) {
                cart[i].number = parseInt(cart[i].number) + parseInt(num);

                cart = JSON.stringify(cart);
                cart = cart.slice(0, -1);
                setCookie(cartn, cart, 7);
                updatecartwindow();
                updatecart();
            }
            break;
        }
    }
}

function add_qty_ajax(p_id, num) {

    var n = parseInt(document.getElementById("n" + p_id).innerHTML);
    var sum = parseInt(document.getElementById("sum" + p_id).innerHTML);
    var total = parseInt(document.getElementById("tot").innerHTML);
    total = total - sum;
//   console.log("n", n);
    var price = sum / n;
    n = n + num;
    sum = n * price;
//   console.log("n", n);
    total = total + sum;

    var cart = getCookie("cart") + "]";

    cart = JSON.parse(cart);
    for (var i = 1; i <= parseInt(getCookie(numn)); i++) {
        if (cart[i].o_id == p_id) {
            if (n > 0) {

                // console.log("n", n);
                cart[i].number = parseInt(cart[i].number) + parseInt(num);

                cart = JSON.stringify(cart);
                cart = cart.slice(0, -1);
                setCookie(cartn, cart, 7);
                // updatecartwindow();
                document.getElementById("n" + p_id).innerHTML = n;
                document.getElementById("sum" + p_id).innerHTML = sum+" ₽";
                document.getElementById("tot").innerHTML = total +" ₽";
                // document.getElementById("del-total").innerHTML = total+" ₽";
                setCookie("cart_sum", total, 7);
                updateprice();

            }
            break;

        }
    }
}

function remove_product(p_id) {
    var cart = getCookie("cart") + "]";
    console.log(cart);
    cart = JSON.parse(cart);
    for (var i = 1; i <= parseInt(getCookie(numn)); i++) {
        if (cart[i].o_id == p_id) {

            delete cart[i];
            cart = JSON.stringify(cart);
            cart = cart.replace(',null', '');
            cart = cart.slice(0, -1);
            minus_number();

            setCookie(cartn, cart, 7);
            updatecartwindow();
            updatecart();
            updatenumber();
            break;
        }
    }

}

function get_products() {
    var html = "";
    var cart = getCookie("cart") + "]";
    alert(cart);
    cart = JSON.parse(cart);
    for (var i = 1; i <= parseInt(getCookie(numn)); i++) {

    }
}

function updatecart() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (document.getElementById("cart-list") != null) {
                document.getElementById("cart-list").innerHTML = xmlhttp.responseText;
                // document.getElementById("del-total").innerHTML = getCookie("cart_sum") + " ₽";
    updateprice();

            }
        }
    };
    xmlhttp.open("GET", "blocks/buildcartlist.php", true);
    xmlhttp.send();

}

function updatecartwindow() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("cart-window").innerHTML = xmlhttp.responseText;
            updateprice();
        }
    };
    xmlhttp.open("GET", "blocks/buildcartwindow.php", true);
    xmlhttp.send();
    $('#modal').on('click', '#cart-button', function () {
        $("body").removeClass("open");
    });


}

function updatenumber() {
  if (document.getElementById("cart-number") != null) {
    document.getElementById("cart-number").innerHTML = getCookie(numn);
    // document.getElementById("cart-number-2").innerHTML = getCookie(numn);
  }
    //  document.getElementById"cart-num").innerHTML = getCookie(numn);
}

function remove_number() {
    deleteCookie(numn);
    setCookie(numn, 0, 7);
}

function remove_cart() {
    deleteCookie(numn);
    setCookie(numn, 0, 7);
    deleteCookie(cartn);
    setCookie(cartn, "[{}", 7);
    updatecartwindow();
    updatenumber();
    updatecart();

}

function getnumber() {
    document.write(getCookie(numn));
}

function add_product(p_id, number, color, size) {
    if (check_dublicate(p_id, color, size) == false) {
        add_number();
        var n = parseInt(getCookie(numn));
        var product = {
            id: p_id,
            o_id: n,
            number: number,
            size: size,
            color: color
        }

        var date = new Date(new Date().getTime() + 6000 * 1000);
        var cart = getCookie("cart");
        var str = JSON.stringify(product, "");
        setCookie(cartn, getCookie("cart") + "," + str, 7);

        updateprice();

    } else {
        add_qty(get_dublicate(p_id, color, size), number);
    }
    console.log(parseInt(getCookie('cart_sum')) + parseInt(getCookie('cur_price')) * number);
    setCookie('cart_sum', parseInt(getCookie('cart_sum')) + parseInt(getCookie('cur_price')) * number, 7);
    updatecartwindow();
    updatenumber();
    updateprice();
    // document.getElementById("push-text").innerHTML = "товар добавлен в корзину";
    // document.getElementById("push").classList.add("open");
    // setTimeout(function () {
    //     document.getElementById("push").classList.remove("open");
    // }, 2500);

}



//                    ИЗБРАННОЕ



var snum = "saved_number";
var savedn = "saved";


function s_check_number() {

    if (getCookie(snum) == undefined) {
        s_create_number();
    }
    if (getCookie(savedn) == undefined) {
        setCookie(savedn, "[{}", 7);
    }

}

function s_check_dublicate(p_id) {
    //    alert("cart");

    var cart = getCookie("saved") + "]";
    //    alert(cart);

    cart = JSON.parse(cart);
    for (var i = 1; i <= parseInt(getCookie(snum)); i++) {
        if (cart[i].id == p_id) {
            return true;
        }
    }
    return false;
}

function s_create_number() {
    setCookie(snum, 0, 7);
}

function s_add_number() {
    var n = parseInt(getCookie(snum));
    n = n + 1;
    setCookie(snum, n, 7);
}

function s_minus_number() {
    var n = parseInt(getCookie(snum));
    n = n - 1;
    setCookie(snum, n, 7);
}

function s_update_cart_number() {

}

function s_add_qty(p_id, num) {
    var cart = getCookie("saved") + "]";
    //    alert(cart);
    cart = JSON.parse(cart);
    for (var i = 1; i <= parseInt(getCookie(snum)); i++) {
        if (cart[i].id == p_id) {
            cart[i].number = parseInt(cart[i].number) + parseInt(num);

            cart = JSON.stringify(cart);
            cart = cart.slice(0, -1);
            setCookie(savedn, cart, 7);
            //            updatecartwindow();
            //            updatecart();
            break;
        }
    }
}

function s_remove_product(p_id) {
    var cart = getCookie("saved") + "]";
    console.log(cart);
    cart = JSON.parse(cart);
    for (var i = 1; i <= parseInt(getCookie(snum)); i++) {
        if (cart[i].id == p_id) {

            delete cart[i];
            cart = JSON.stringify(cart);
            cart = cart.replace(',null', '');
            cart = cart.slice(0, -1);
            s_minus_number();
            setCookie(savedn, cart, 7);
            location.reload();
            break;
        }
    }
    //    updatenumber();
    //    updatecartwindow();

}

function s_remove_product_w(p_id) {
    var cart = getCookie("saved") + "]";
    console.log(cart);
    cart = JSON.parse(cart);
    for (var i = 1; i <= parseInt(getCookie(numn)); i++) {
        if (cart[i].id == p_id) {

            delete cart[i];
            cart = JSON.stringify(cart);
            cart = cart.replace(',null', '');
            cart = cart.slice(0, -1);
            s_minus_number();
            setCookie(savedn, cart, 7);
            break;
        }
    }
    //    updatenumber();
    //    updatecartwindow();

}


function s_remove_number() {
    deleteCookie(numn);
    setCookie(numn, 0, 7);
}

function s_getnumber() {
    document.write(getCookie(numn));
}

function s_add_product(p_id, number, size) {
    //    alert(check_dublicate(p_id));
    if (s_check_dublicate(p_id) == false) {
        s_add_number();
        var product = {
            id: p_id,
            number: number,
            size: size
        }
        var date = new Date(new Date().getTime() + 6000 * 1000);

        var cart = getCookie("saved");
        var str = JSON.stringify(product, "");
        setCookie(savedn, getCookie("saved") + "," + str, 7);
        document.getElementById("push-text").innerHTML = "добавленно в избранное";
        document.getElementById("push").classList.add("open");
        setTimeout(function () {
            document.getElementById("push").classList.remove("open");
        }, 2500);
    } else {

    }



}


function pulse_heart() {
    document.getElementById("heart").classList.add("pulse");
}