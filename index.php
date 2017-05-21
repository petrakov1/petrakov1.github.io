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
<?php
$class = "white";
 include("blocks/header.php");
  ?>
  
<section id="main-header" class="header">
    <!--<div class="slider">-->
        <!--<img src="css/images/shop-header.png" alt="">-->

        <!--<img src="css/images/shop-header.png" alt="">-->
        <!--<img src="css/images/shop-header.png" alt="">-->
    <!--</div>-->
    <div class="text flex">
        <div>
            <h1>СНИМАЕМ СВЕРХУ. НЕ ТОЛЬКО.</h1>
            <!--<a href="" class="button"> Услуги</a>-->

            <!--<div class="button"></div>-->
        </div>
    </div>
</section>    

<section class="wrap">
<div id="ktomi">
<h2>Кто мы</h2>
    <p>Команда профессионалов в области аэросъемкии смежных дисциплин. К нам обращаются
за свежим взглядом и качественной картинкой. Мы с большим энтузиазмом берёмся
за интересные проекты и всегда стремимся показать лучший результат.</p>

    <div class="cards">
        <div>
            <img src="css/images/neonbrand-197308@3x.png" alt="">
           
            <h3>ПРОЕКТЫ</h3>
            <a href="video.php" class="link">Смотреть</a>
        </div>
         <div>
            <img src="css/images/afrah-158939@3x.png" alt="">
            <h3>СПЕЦИАЛЬНЫЙ</h3>
            <a href="special.php" class="link">Подробнее</a>
        </div>
    </div>

</div>
</section>
<section class="wrap9 pattern">
<div id="htomi" class="flex-start">
    <div>
<h2>Что мы делаем</h2>
    <p>Снимаем, производим ролики, реализуем
фотопроекты. Претворяем идеи в жизнь.</p>
<a href="service.php" class="button">Услуги</a>
    </div>
    
</div>
</section>
<section class="wrap9">
<div id="snimaem"  class="flex-start">
    <div>
  <h2>На что снимаем</h2>
    <p>В нашем распоряжении широкий спектр актуальной
техники: мультикоптеры, фото и экшн-камеры,
стабилизаторы,  краны.</p>
<a href="tools.php" class="button">Оборудование</a>
        <img src="css/images/copter.png" alt="">

    </div>
  
</div>
</section>
<section id="promo">
    <div>
        <h2>
            Производим уникальное оборудование
        </h2>
        <a href="tools.php#workshop" class="button">Мастерская</a>
    </div>

</section>
<section id="clients" class="wrap">
    <div>   
        <img src="css/images/group-2.png" alt="">
    </div>
</section>
<section id="reviews" class="wrap9">
<div>
   <div class="cards">
       <div>
           <p>«Заказывал аэросъёмку для спортивных соревнований. Ребята отлично справились с задачей. Порадовала скорость сдачи проекта»</p>
       </div>
   </div>
   <div class="people">
       <div class="active">
            <img src="css/images/oval-2-copy.png" alt="">
            <p>Keith Duncan</p>
       </div>
        <div class="">
            <img src="css/images/oval-2-copy.png" alt="">
            <p>Keith Duncan</p>
       </div>
        <div class="">
            <img src="css/images/oval-2-copy.png" alt="">
            
            <p>Keith Duncan</p>
       </div>

   </div> 
</div>

</section>

<?php include("blocks/footer.php");  ?>
</body>

</html>