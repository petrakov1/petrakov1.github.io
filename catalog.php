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
<?php include("blocks/header.php");  ?>
  
    

<section class="wrap">
    <div id="products">

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
     
        

    </div>

</section>
<section class="banner banner1 flex">
    <div>
      <p>#kaets</p>
      <a href="">follow us on intagram</a>
    </div>
</section>
<?php include("blocks/footer.php");  ?>
</body>

</html>