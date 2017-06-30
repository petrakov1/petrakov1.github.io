<!--Created by Petrakov-->
<!--Designed by VladShe -->
<!-- http://vladshe.ru/ -->
<!DOCTYPE html>
<html>

<head>
  <title>Магазин</title>
  <?php include 'meta.php'; ?>
  <!--<link rel="stylesheet" type="text/css" href="/css/slick/slick.css" /> -->
  <!--<script type="text/javascript" src="/css/slick/slick.min.js"></script>-->
  <?php include 'blocks/anal.php'; ?>


</head>

<body>
    <div class="fix" id="nav-container">

<?php
$class = "white";
$class2 = "fixed";

 include("blocks/header.php");
  ?>
    </div>
  
<section class="banner  black header" id="index-header">
<div class="flex">
  <div class="top">
       
      <h2 class="title1">МЫ ПИЗДАТЫЕ ЧУВАКИ,<br>
СНИМАЕМ, ДЕЛАЕМ СТИЛЬ<br>
И У НАС ЕСТЬ МЕРЧ</h2>

    </div>
</div>
  
</section>   
<section class="blank">

</section>

<section class="banner flex black">
        <img src="css/images/bckgrnd.svg" alt="" id="animation">
    
    <div class="top">
       
      <h2 class="title2">TATTOO, VIDEO, CARS</h2>
<p class="title3">Здесь чуть подробнее раскрываем кто вы. Даем знать, что у вас <br> есть блог. Пересылаем всех туда.</p>
      <a href="" class="button-border">подробнее</a>
    </div>
</section>

<section id="team" class="banner">

       
     
</section>
<section class="banner black flex" id="store-banner">
    <div>
        <!--<img src="css/images/t-shirt-img.png" alt="" class="product-top">-->
        <!--<img src="css/images/t-shirt-img.png" alt="" class="product-bottom">-->
       <h2 class="title2">STORE</h2>
      <p class="title3">Говорим, что у вас есть интернет-магазин. Делаем <br>
паттерн из вещей на фон.</p>
    
      <a href="shop.php" class="button-border">В МАГАЗИН</a>
    </div>
</section>
<!--
<section class="banner flex white white-back">
    <div>
       
      <h2 class="title1">Пишем, что вы планируете делать.<br>
Или про миссию, если есть.</h2>
    </div>
</section>-->

<section class="banner bannerprefooter flex">
    <div>
      <p>#КАЁТС</p>
      <a href="" class="button-white">follow us on intagram</a>
    </div>
</section>
<?php include("blocks/footer.php");  ?>
<script>

window.onscroll = function() {
    // console.log(window.innerHeight);
    var scrolled = window.pageYOffset || document.documentElement.scrollTop;
 
   if (scrolled > window.innerHeight) {
    $("#nav-container").addClass("transform");
    // $("#nav").addClass("fade-in");
    // $("#nav-white").addClass("fix");
    // $("#nav-white").addClass("fade-in");
    // $("#nav").next().addClass("fixnext");
    // $("#nav-white").next().addClass("fixnext-white");

  } else {
    $("#nav-container").removeClass("transform");
    // $("#nav").removeClass("fade-in");
    // $("#nav-white").removeClass("fix");
    // $("#nav-white").removeClass("fade-in");
    // $("#nav").next().removeClass("fixnext");
    // $("#nav-white").next().removeClass("fixnext-white");
    
  }
  
   
}

</script>
</body>

</html>