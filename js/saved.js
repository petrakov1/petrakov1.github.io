
var snum = "saved_number";
var savedn = "saved";


function s_check_number() 
{
   
    if ( getCookie(snum) == undefined) {
        s_create_number();
    }
    if ( getCookie(savedn) == undefined) {
        setCookie(savedn, "[{}", 7);  
    }
    
}

function s_check_dublicate(p_id)
{    
//    alert("cart");

    var cart=getCookie("saved") + "]";
//    alert(cart);

    cart = JSON.parse(cart);
    for (var i=1;i <= parseInt(getCookie(snum));i++)
    {
        if(cart[i].id == p_id){
            return true;
        }
    }
    return false;
}

function s_create_number() 
{
    setCookie(snum, 0, 7);  
}

function s_add_number() 
{
     var n = parseInt(getCookie(snum));
     n = n + 1;
     setCookie(snum, n, 7); 
}
function s_minus_number() 
{
     var n = parseInt(getCookie(snum));
     n = n - 1;
     setCookie(snum, n, 7); 
}
function s_update_cart_number(){
    
}

function s_add_qty(p_id, num)
{
    var cart=getCookie("saved") + "]";
//    alert(cart);
    cart = JSON.parse(cart);
    for (var i=1;i <= parseInt(getCookie(snum));i++)
    {
        if(cart[i].id == p_id){
            cart[i].number = parseInt(cart[i].number) + parseInt(num);
         
            cart = JSON.stringify(cart);
            cart = cart.slice(0, -1);
            setCookie(savedn,cart,7);
//            updatecartwindow();
//            updatecart();
            break;
        }
    }
}

function s_remove_product(p_id)
{
     var cart=getCookie("saved") + "]";
    console.log(cart);
    cart = JSON.parse(cart);
    for (var i=1;i <= parseInt(getCookie(snum));i++)
    {
        if(cart[i].id == p_id){

            delete cart[i];
            cart = JSON.stringify(cart);
            cart = cart.replace(',null','');
            cart = cart.slice(0, -1);
            s_minus_number();
            setCookie(savedn,cart,7);
            location.reload();
            break;
        }
    }
//    updatenumber();
//    updatecartwindow();
  
}
function s_remove_product_w(p_id)
{
     var cart=getCookie("saved") + "]";
    console.log(cart);
    cart = JSON.parse(cart);
    for (var i=1;i <= parseInt(getCookie(numn));i++)
    {
        if(cart[i].id == p_id){

            delete cart[i];
            cart = JSON.stringify(cart);
            cart = cart.replace(',null','');
            cart = cart.slice(0, -1);
            s_minus_number();
            setCookie(savedn,cart,7);
            break;
        }
    }
//    updatenumber();
//    updatecartwindow();
  
}

//function s_get_products()
//{
//    var html = "";
//    var cart=getCookie("saved") + "]";
//    alert(cart);
//    cart = JSON.parse(cart);
//    for (var i=1;i <= parseInt(getCookie(numn));i++)
//    {
//        
//    }
//}

//function s_updatecart() {
//    
//        var xmlhttp = new XMLHttpRequest();
//        xmlhttp.onreadystatechange = function() {
//            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                document.getElementById("cart-list").innerHTML = xmlhttp.responseText;
//            }
//        };
//        xmlhttp.open("GET", "buildcart.php", true);
//        xmlhttp.send();
//    
//}
//
//function s_updatecartwindow() {
//        var xmlhttp = new XMLHttpRequest();
//        xmlhttp.onreadystatechange = function() {
//            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                document.getElementById("cart-window").innerHTML = xmlhttp.responseText;
//            }
//        };
//        xmlhttp.open("GET", "buildcartwindow.php", true);
//        xmlhttp.send();
////        $('#cart').on('click','#cart-button', function() { 
////            $("#cart-window").toggleClass("open");});
////     
//    
//}
//function s_updatenumber( )
//{
//    
//     document.getElementById("cartnumber").innerHTML = getCookie(numn);
//}

function s_remove_number()
{
    deleteCookie(numn);
     setCookie(numn, 0, 7);  
}

function s_getnumber()
{
    document.write(getCookie(numn));
}

function s_add_product(p_id,number,size)
{
//    alert(check_dublicate(p_id));
    if(s_check_dublicate(p_id) == false)
        {
            s_add_number() ; 
            var product = {
              id: p_id,
              number: number,
                size : size
                }
            var date = new Date(new Date().getTime() + 6000 * 1000);

            var cart= getCookie("saved");
            var str = JSON.stringify(product, "");
            setCookie(savedn,getCookie("saved") +","+ str,7);
        }
    else {
            s_add_qty(p_id,number);
    }
     document.getElementById("push-text").innerHTML = "added to wishlist";
         document.getElementById("push").classList.add("open");
            setTimeout(function(){ document.getElementById("push").classList.remove("open");}, 2500);
    
//     updatecartwindow();
//    updatenumber();
//    document.getElementById("bag").classList.add("pulse");
//    setTimeout(function(){document.getElementById("bag").classList.remove("pulse")}, 600);

    
//        var cart= JSON.parse(str + ']}') ;

}