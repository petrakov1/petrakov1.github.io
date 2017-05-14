<div id="call-modal" class="flex modal">
  <div>
        <img id="" class="close modal-call" src="/css/images/close-r.png">
        <h1>Заказать бесплатный звонок</h1>
        <div>
            <form method="POST" id="call-form">
                <label for="">Введите ваше имя</label>
                <input type="text" name="contact_name" placeholder="Иван Иванов" required>
                  <label for="">Введите телефон</label>
                <input type="text" name="contact_tel" placeholder="+7(___)___-__-__" required>
                <input type="submit" value="Заказать звонок" class="button button-red">
                
            </form>
        </div>
    </div>
</div>

<div id="fast-modal" class="flex modal">
  <div>
        <img id="" class="close modal-fast" src="/css/images/close-r.png">
        <h1>Купить в один клик</h1>
        <div>
            <form method="POST" id="fast-form">
                <label for="">Введите ваше имя</label>
                <input type="text" name="contact_name" placeholder="Иван Иванов" required>
                  <label for="">Введите телефон</label>
                <input type="text" name="contact_tel" placeholder="+7(___)___-__-__" required>
                <label for="">Введите ваш e-mail</label>
                <input type="text" name="contact_email" placeholder="example@gmail.com" required>
                  <label for="">Введите ваш город</label>
                <input type="text" name="contact_city" placeholder="Санкт-Петербург" required>
                <label for="">Введите ваш адрес</label>
                <input type="text" name="contact_address" placeholder="ул. Ломоносова, 9" required>
                <input type="submit" value="Заказать" class="button button-red">
                
            </form>
        </div>
    </div>
</div>
<div id="buy-modal" class="flex modal">
  <div>
        <img id="" class="close modal-buy" src="/css/images/close-r.png">
        <h1>Заказать</h1>
        <div>
            <form method="POST" id="buy-form">
                <label for="">Введите ваше имя</label>
                <input type="text" name="contact_name" placeholder="Иван Иванов" required>
                <label for="">Введите телефон</label>
                <input type="text" name="contact_tel" placeholder="+7(___)___-__-__" required>
                <label for="">Введите ваш e-mail</label>
                <input type="text" name="contact_email" placeholder="example@gmail.com" required>
                <label for="">Введите ваш город</label>
                <input type="text" name="contact_city" placeholder="Санкт-Петербург" required>
                <label for="">Введите ваш адрес</label>
                <input type="text" name="contact_address" placeholder="ул. Ломоносова, 9" required>
                <input type="submit" value="Заказать" class="button button-red">
                
            </form>
        </div>
    </div>
</div>
<div id="order-modal" class="flex modal">
      <div>
            <img id="" class="close modal-fast" src="/css/images/close-r.png">
            <h1>Контакты</h1>
                <div>
            <form method="post" name="order" id="form-order">
                    
                <input placeholder="фио" name="contact_name" type="text" class="input2 name-input" required>
                <input placeholder="е-mail" name="contact_email" type="email" class="input2 email-input" required>
                <input placeholder="телефон" name="contact_tel" type="text" class="input2 telephone-input" required>
                <input placeholder="страна" name="contact_country" type="text" class="input2 country-input" required >
                <input placeholder="город" name="contact_city" type="text" class="input2 city-input" required >
                <input placeholder="адрес" name="contact_address" type="text" class="input2 address-input" required >

       
              <h3>Сумма: <span id="pay-total">
                <script>
                     var price=  parseInt(getCookie("cart_sum"))+parseInt(getCookie("cart_delivery_price"));
                     document.write(price);
                </script>

            </span>₽</h3>
            
        <input type="submit" value="Дaлее" class="button button-red">

    </form>
    </div>
    </div>
    
</div>
<div class="modal flex" id="cart">
    <div>
                            <div id="cart-top">
                                  <div id="" class="cart-n">
                                        <p class="underline" id="cart-number-2">0</p>
                                        <img src="/css/images/cart.png" alt="" class="">
                                  </div>
                                        <h1>корзина</h1>
                                  
                            <img class="open-cart icon close" src="/css/images/close-r.png">
                            </div>
                            <div id="cart-window">
                                <?php include "buildcartwindow.php"; ?>
                            </div>
                            <div id="cart-bottom">
                                <a href="cart.php" class="button button-red">Перейти в корзину</a>

                            </div>
                            </div>
</div>

   <div id="pay-yandex" class="modal flex">
  <div class="menu-close  pointer">
            <img id="" class="close modal-yandex" src="/css/images/close-r.png">
    <h1>Оплатa</h1>
      <div>
      <form action="https://money.yandex.ru/eshop.xml" id="pay-form" method="post">
  

    <h3>Итого: <span class="pay-pal-total" id="pay-total1"><?php echo $_COOKIE['cart_sum']; ?></span>₽</h3>

    <input name="shopId" value="123468" type="hidden"/>
    <input name="scid" value="91350" type="hidden"/>
    <input name="sum" id="pay-yandex-total" value="0" type="hidden">

   <input id="yandex-number" name="customerNumber" value="" type="hidden"/>
<!--    <input name="shopArticleId" value="567890" type="hidden"/>-->
<!--    <input name="paymentType" value="AC" type="hidden"/>-->
   <input id="yandex-order-number" name="orderNumber" value="" type="hidden"/>
   <!-- <input type="hidden" name="cps_email" value="Fomi_07@mail.ru"> -->
   <!-- <input type="text" name="cps_phone" value="79009009090"> -->
   <input id="yandex-name" name="custName" value="" type="hidden"/>
   <input id="yandex-email" name="custEmail" value="" type="hidden"/>
   <input id="yandex-addr" name="custAddr" value="" type="hidden"/>
   <input id="yandex-shopSuccessURL" name="shopSuccessURL" value="http://upgradekids.ru/" type="hidden"/>
   <!-- <input name="orderDetails" value="Счастье для всех. В пакетиках, россыпью." type="hidden"/> -->
 <input type="submit" value="Заплатить" class="button button-red"/>
</form>

    </div>    </div>    </div>
    <script>
         $("#fast-form").validate();
         $("#form-order").validate();
         $("#buy-form").validate();
         
         $("#call-form").validate();

    </script>