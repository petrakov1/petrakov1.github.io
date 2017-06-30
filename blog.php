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
  <section class="wrap" id="submenu">
    <div >
      <ul>
        <li>
          <a href="">доставка</a>
        </li>
         <li>
          <a href="">мы в Магазинах</a>
        </li>
      </ul>
    </div>
</section>
<section id="shop-header" class="header">
    <div class="slider">
        <img src="css/images/t-shirt-img.png" alt="">

        <!--<img src="css/images/shop-header.png" alt="">-->
        <!--<img src="css/images/shop-header.png" alt="">-->
    </div>
    <div class="text flex">
        <div>
            <h1>Футбока</h1>
            <p>Чёрная с принтом Kaets</p>
            <a href="" class="button-white">посмотреть</a>
            
        </div>
    </div>
</section>    

<section class="wrap">
    <div id="products">
            <h1>Каталог</h1>
        
     <?php

                include "connect.php";
                $sql = "SELECT * FROM products ORDER BY `date` DESC";
         
         
        
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $price = (int)$row["price"] - (int)$row["discount"];
                        echo '
                        
                           <div class="item">
            
                        <a href="product.php?id='.$row["idProduct"].'">';
                        $sql1 = "SELECT name FROM images WHERE idProduct=".$row["idProduct"]." LIMIT 1";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            while($row1 = $result1->fetch_assoc()) {
                                echo '<img src="images/product/'.$row["idProduct"].'/MQ/'.$row1["name"].'" alt="">';


                            }
                        }
                    echo '
                        <h3>'.$row["title"].'</h3>

                  
                          <p>'.number_format($price,0,"","").' P</p>
                          
                     </a>
                      </div>';

                 }
                }




                $conn->close();
              ?>
        
        <!--<a href="catalog.php">Перейти в каталог</a>-->

    </div>

</section>
<!--<section id="promo" class="wrap">
    <div>

    <div class="flex">
        <div>
 <h3>Мы вмагазинах</h3>
        <a href="shops.php">СМОТРЕТЬ СПИСОК</a>
        </div>
       
    </div>

    <img src="css/images/lookbook.png" alt="">
    </div>
    
</section>-->
<section class="banner banner3 flex">
    <div>
      <p>#kaets</p>
      <a href="" class="button-white">follow us on intagram</a>
    </div>
</section>
<?php include("blocks/footer.php");  ?>
</body>

</html>