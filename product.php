<!--Created by Petrakov-->
<!--Designed by VladShe -->
<!-- http://vladshe.ru/ -->
<!DOCTYPE html>
<html>

<head>
  <title>Товар</title>
  <?php include 'meta.php'; ?>
  <!--<link rel="stylesheet" type="text/css" href="/css/slick/slick.css" /> -->
  <!--<script type="text/javascript" src="/css/slick/slick.min.js"></script>-->
  <?php include 'blocks/anal.php'; ?>


</head>

<body class="">
<?php include("blocks/header.php");  ?>

<section class="wrap" id="product">
        <div id="images">

               <div class="thumbs">

                </div> 
<img src="css/images/t-shirt-img.png" alt="">
<img src="css/images/t-shirt-img.png" alt="">
<img src="css/images/t-shirt-img.png" alt="">

        </div>
        <div id="info">
            <h1>T-shirt</h1>
            <h2>Blue Distressed Denim Jacket</h2>
            <div class="line"></div>
            <p class="price">1400 P</p>
            <div class="options">
                <div class="size">
                    <p>Size</p>
                    <ul>
                        <li>S</li>
                        <li class="outofstock">M</li>
                        <li class="selected">L</li>
                        <li>XL</li>
                        
                    </ul>
                </div>
                <div class="color">
                    <p>Colors</p>
                    <ul>
                        <li></li>
                        <li></li>
                        
                        
                    </ul>
                </div>
                <div class="quantity">
                    <p>-</p>
                    <p>1</p>
                    <p>+</p>
                    
                </div>
                <p class="send">Сообщить о поступлении</p>
            </div>
            <p class="button">В корзину</p> 
            <br>
            <p class="tab"> Описание</p><p class="tab"> Детали</p>
            <div class="desc">
                <p>From our original Hobes concept, we've stripped everything back, and built our new men's product from the ground up.</p>
            </div>

        </div>
    
</section>  

<section class="banner banner2 flex">
    <div>
      <p>#kaets</p>
      <a href="">follow us on intagram</a>
    </div>
</section>
<?php include("blocks/footer.php");  ?>


<div id="modal" class="">

    <div id="cart-window">
        <div class="flex">
            <p>Корзина</p>
            <img src="css/images/close.png" alt="" class="cart-button">
        </div>
        <div class="items">
            <item>
                            <img src="css/images/t-shirt-img.png" alt="">
                            <div> 
                                <div class="flex"> 
                                        <p>T-shirt</p>
                                        <img src="css/images/close.png" alt="" class="remove">
                                    
                                 </div>
                                 <p>
                                     Blue Distressed Denim Jacket
                                 </p>
                                 <p class="price">
                                    1700 Р
                                 </p>
                            </div>
                            <div class="line"></div>
                            
            </item>
                        <item>
                            <img src="css/images/t-shirt-img.png" alt="">
                            <div> 
                                <div class="flex"> 
                                        <p>T-shirt</p>
                                        <img src="css/images/close.png" alt="" class="remove">
                                    
                                 </div>
                                 <p class="desc">
                                     Blue Distressed Denim Jacket
                                 </p>

                                 <p class="size">Size: M</p>
                                 <p class="color">Color: <span>a</span></p>
                                 <p class="price">
                                    1700 Р
                                 </p>
                            </div>
                            <div class="line"></div>
                            
            </item>
        </div>
        <div class="flex">
            <p>Итого: 3400 P</p>
            <a class="button">оформить</a>
        </div>
       
    </div>

</div>
</body>

</html>