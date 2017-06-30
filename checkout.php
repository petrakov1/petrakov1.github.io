<!--Created by Petrakov-->
<!--Designed by VladShe -->
<!-- http://vladshe.ru/ -->
<!DOCTYPE html>
<html>

<head>
  <title>Магазин</title>
  <?php include 'meta.php'; ?>
  <link rel="stylesheet" type="text/css" href="css/slick/slick.css" /> 
  <script type="text/javascript" src="css/slick/slick.min.js"></script>
  <?php include 'blocks/anal.php'; ?>
   <script src="js/jquery.validate.js"></script> 


</head>

<body class="white-back">

 <section id="nav" class="white">
        <div class="flex">


        <ul>
          <li>
            <!--<a href="index.php">Вернуться на сайт</a>-->
          </li>
         
          </ul>
            <a href="index.php">
       <img src="css/images/logo-black.svg" alt="" class="logo">
      </a>
   
        <ul class="mobile">
        
        </ul>
      </div>
      <a href="shop.php#products" id="back-link">Вернуться на сайт</a>
    </section>
    

<section class="flex" id="checkout">
    <div id="checkout-form">
         <p class="tab active line go-back" data-move="0"> Личная информация</p>
            <p class="tab" data-move="-100%"> Доставка</p>
            <p class="tab" data-move="-200%"> Оплата</p>
            <div class="tabs" id="tabs">
                <div class="info">
                    <form name="info" id="form-info">
                        <label for="">E-mail</label>
                        <input type="email" id="email" name="email" required>
                        <label for="">Личная информация</label>
                        <div>
                        <input type="text" id="name" name="name" placeholder="ИМЯ" required>
                        <input type="text" id="lastname" name="lastname" placeholder="ФАМИЛИЯ" required>
                        <input type="text" id="tel" name="tel" placeholder="ТЕЛЕФОН" required>
                      
                        <input type="submit" value="Перейти к доставке">
                        
</div>
                    </form>
                </div>
                <div class="delivery">
                    <form name="delivery" id="form-delivery">
                  <div>
                                      <!--<label for="radio-one">
<input type="radio" value="radio-one" name="quality" id="radio-one" checked> <span>Почта России <b>360P</b></span>
</label>-->
 <h3>Способ доставки</h3>
<label for="radio-two">
<input type="radio" value="radio-two" name="delivery" id="radio-two" data-price="350"> <span>Курьер по Санкт-Петербургу <b>350 ₽</b></span>
</label>
                        <input type="text" id="city" name="city" placeholder="ГОРОД" required>
                        <input type="text" id="address" name="address" placeholder="АДРЕСС" required>
                        <input type="text" id="index" name="index" placeholder="ИНДЕКС" required>
</div>
<div>
    <div class="address">
    <h2>Личная информация</h2>
    <p id="delivery-info"></p>
    <a class="go-back">Изменить</a>
</div>
<input type="submit" value="Перейти к оплате">
    
</div>



                    </form>
                </div>
            </div>
    </div>
    <div id="cart-list">
       
      <div class="">
         
        <div class="items">
         
                  
     
       
<?php

                    include 'connect.php';
                    $json = $_COOKIE["cart"].']';
                    $allsum=0;
                    $quantity =0;
                    $json = json_decode($json,true);
if($_COOKIE["cart_number"]>0)
{


                    for($i=1;$i<=$_COOKIE["cart_number"];$i++)
                    {
                            $item =  $json[$i];
                            $id=  $item["id"];
                            $oid=  $item["o_id"];
                            $sql = "SELECT * FROM products WHERE idProduct='$id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                  $price = (int)$row["price"]-(int)$row["discount"];
                                $sum = $item["number"]*$price;
                                $allsum += $sum;
                              $quantity += $item["number"];
          
         
       

                                echo '<item>';


                                  $sql1 = "SELECT name FROM images WHERE idProduct=".$id." LIMIT 1";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            $row1 = $result1->fetch_assoc();
                                echo '<img class="" src="images/product/'.$id.'/MQ/'.$row1["name"].'" alt="">';

                        }
                        

                        echo ' 
                        
                            <div> 
                                <div class="flex"> 
                                     <div>
                                        <p class="heading">'.$row["title"].'</p>
                                         <p class="price" id="sum'.$oid.'">
                                    '.$sum.' ₽
                                 </p>
                                 </div>
                                        <img src="css/images/close.png" alt="" onclick="remove_product('.$oid.');" class="remove">
                                    
                                 </div>
                                 <div class="desc">
                                     '.$row["description"].'
                                 </div>

                                 <p class="size">Размер: '.$item["size"].'</p>
                                 <p class="q">Кол-во:</p>
                                  <div class="quantity noselect">
                                  
                    <p class="number" onclick="add_qty_ajax('.$oid.',-1);" data-number="-1">-</p>
                    <p id="n'.$oid.'">'.$item["number"].'</p>
                    <p class="number" onclick="add_qty_ajax('.$oid.',1);" data-number="1">+</p>
                </div>
                                 
                                
                            </div>
                            <div class="line"></div>
                            
            </item>
                        
                          
                                ';
                                // }
                            }
                    }
        


}
else {
    echo '<h2 class="empty">Пока пусто</h2>
      
    ';
}
                    $conn->close();


                ?>


   </div>
        <div class="prices">
            <p>Покупки <span id="sub-total"><?php echo $allsum; ?> ₽</span></p>
            <p>Доставка <span id="del-total">0 ₽</span></p>
            <h2 id="total"> <?php echo $allsum; ?> ₽</h2>
            
        </div>



    </div>
    <script>
       $("#form-info").validate();
       $("#form-delivery").validate();
        setCookie("cart_delivery_price", "0", 7);

    $('#form-info').on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid()) {
            $("#checkout-form .tab:nth-child(1)").removeClass("active");
            $("#checkout-form .tab:nth-child(2)").addClass("active");
            $("#checkout-form .tab.line").addClass("del");
            $("#checkout-form .tabs").addClass("del");
            document.getElementById("delivery-info").innerHTML = $("#email").val() + "<br>"+$("#name").val()  + $("#lastname").val()  + "<br>"+$("#tel").val() ;
        }
    });
      $(".go-back").click(function () {
            $("#checkout-form .tab:nth-child(2)").removeClass("active");
            $("#checkout-form .tab:nth-child(1)").addClass("active");
            $("#checkout-form .tab.line").removeClass("del");
            $("#checkout-form .tabs").removeClass("del");
            // document.getElementById("delivery-info").innerHTML = $("#email").val() + "<br>"+$("#name").val()  + $("#lastname").val()  + "<br>"+$("#tel").val() ;
     
    });
     $('#form-delivery').on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid()) {
                document.location = "thankyou.php" ;

              }
    });
        $('input:radio[name=delivery]').change(function () {
        setCookie("cart_delivery", $(this).val(), 7);
        setCookie("cart_delivery_price", $(this).attr("data-price"), 7);
        updateprice();

    });
</script>
</section>


<?php include("blocks/footer.php");  ?>

</body>


</html>