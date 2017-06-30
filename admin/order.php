<!--Created by Petrakov-->
<!--Designed by VladShe -->
<!-- http://vladshe.ru/ -->


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UpgradeKids</title>
    <meta name = "format-detection" content = "telephone=no">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="style.css" rel="stylesheet">
	<link href="fonts/stylesheet.css" rel="stylesheet">

    <script src="../js/jquery-2.1.4.min.js"></script>
  
<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39943105 = new Ya.Metrika({ id:39943105, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true, ecommerce:"dataLayer" }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39943105" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<!-- <script src="jquery.validate.js"></script>-->

</head>
<body> 
    
    <?php include "menu.php" ?>
      <?php 
       include "../connect.php";
                $idm= $_REQUEST["id"];
//              echo $id;
                    $sqlm = "SELECT * FROM orders WHERE idOrder=$idm";

//                    echo ""
       
                $resultm = $conn->query($sqlm);
                if ($resultm->num_rows > 0) {
            // output data of each row
                 $rowm = $resultm->fetch_assoc();
        ?>
   <div id="content">
       <div id="nav">
           
           <a href="orders.php">Назад</a>
           <a href="mailto:<?php echo $rowm["email"]; ?>">Связаться с клиентом</a>
           
           
       </div>
             <h1>Заказ <?php echo $rowm["idOrder"]; ?></h1>
             <form method="post">
                 
                 <select name="status" id="status">
    <option value="обрабатывается">обрабатывается</option>
    <option value="оплачен">оплачен</option>
    <option value="собирется">собирется</option>
    <option value="отправлен">отправлен</option>
</select>
      
       <button class="button-grey" type="submit">Изменить</button>
                 
             </form>

      <?php
//                        echo  $rowm["products"]; 
                 $json = $rowm["products"];
                    $allsum=0;
                    $json = json_decode($json,true);
                        echo "<p><b>ФИО:</b>  ".$rowm["name"]."</p>";
                        echo "<p><b>Тел.:</b>  ".$rowm["tel"]."</p>";
                        echo "<p><b>E-mail:</b>  ".$rowm["email"]."</p>";
                        echo "<p><b>Адрес:</b>  ".$rowm["address"]."</p>";
echo "<table>";
                        echo '<script>
         document.getElementById("status").value = "'.$rowm["status"].'";         
      </script>';
                    for($i=1;$i<=$rowm["number"];$i++)
                    {
                            $item =  $json[$i];
                            $id=  $item["id"];
                            $sql = "SELECT * FROM products WHERE idProduct='$id'"; 
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $sum = $item["number"]*$item["price"];
                                $allsum += $sum;
                                    
                                  
                                echo '<tr>';
                        
                                    
                                  $sql1 = "SELECT name FROM images WHERE idProduct=".$id." LIMIT 1";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            $row1 = $result1->fetch_assoc();
                                echo '<td><img class="thumb" src="../images/product/'.$id.'/MQ/'.$row1["name"].'" alt=""></td>';
                   
                        }  
                            
                        echo '   <td class="bold"> <p class="text">'.$row["title"].'<br>Цвет: '.$item["color"].'</p></td>
                           <td> <p class="number">'.$item["number"].'</p></td>
                           <td class="bold"> <p class="price">'.$sum.' ₽</p></td>
                         

                        </tr>
                                ';
                            }
                    }
echo "</table><h2>Итого: $allsum ₽</h2>";

              
                    }
               
               
               
                $conn->close();
              ?>
              
              
              <?php 
       
    
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['status'])) {$status = $_POST['status'];}
                           
                              include '../connect.php';
                        $sql = "UPDATE orders SET `status` = '".$status."' WHERE idOrder=".$idm; 
//                          ,`hidden` = '".$hidden."'
                                if (!$conn->query($sql))
                              {
                              echo("<h1 class='white'>Error description: " . mysqli_error($conn)). "</h1>";
                              }
                            else{
                                                           echo '<script>alert("Заказ изменен"); setTimeout(function() {window.location.href = "orders.php";}, 500); </script>';

//                                header("Location: products.php");
//    exit;
                            }
                                $conn->close();
                        }


                      
                ?>
      
   </div>
    </body>
    
</html>