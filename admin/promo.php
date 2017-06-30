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


<script type="text/javascript" src="css/slick/slick.min.js"></script>
<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39943105 = new Ya.Metrika({ id:39943105, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true, ecommerce:"dataLayer" }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39943105" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<!-- <script src="jquery.validate.js"></script>-->

</head>
<body> 
    
    <?php include "menu.php" ?>
    
   <div id="content">
       <div id="nav">
           
           <a href="addpromo.php">Добавить товар</a>
           
           
       </div>
             <h1>Акции</h1>


                <form method="post" enctype="multipart/form-data" id="form">
                
            <div class="input-row">
                 <label>Время</label>
                <input type="date" placeholder="2017-01-01" id="date" name="date">
                </div>
                
                <input class="uppercase button pink-back display-block " type="submit" value="сохранить">
            </form>
<table>
             <thead>
                 <td>Дата</td>
                 <td>Название</td>
                 <td>Скидка</td>
                 <td>Удалить</td>
             </thead>
              <?php 
       include "../connect.php";
               
                    $sqlm = "SELECT * FROM meta WHERE title='admin'";
                $resultm = $conn->query($sqlm);
                if ($resultm->num_rows > 0) {
            // output data of each row
                 $rowm = $resultm->fetch_assoc();
                 echo ' <script>
         document.getElementById("date").value = "'.$rowm["time"].'";         
      </script>';
                }
        ?>
       
              <?php 
       include "../connect.php";
    
                
    
               
                    $sql ="SELECT * FROM products WHERE `discount`>0";

                  
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
            // output data of each row
                    while($row = $result->fetch_assoc()) {
                               echo '<tr>';
                      
                     
                    echo '
                   <td>
                                            '.$row["date"].'</td><td>'.$row["title"].'</td>


                <td>
                    '.$row["discount"].'
                </td>


                <td>
             

       <img onclick="drop('.$row["idProduct"].')" class="icon" src="../css/images/empty.svg">
                      
                 </td>
                       
                  
              </tr>';
//                      
           }
        }
              
               
               
               
               
                $conn->close();
              ?>

       </table>
          <?php 
       
    
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['date'])) {$date = $_POST['date'];}
                           
                              include '../connect.php';
                        $sql = "UPDATE meta SET `time` = '".$date."' WHERE title='admin'"; 
//                          ,`hidden` = '".$hidden."'
                                if (!$conn->query($sql))
                              {
                              echo("<h1 class='white'>Error description: " . mysqli_error($conn)). "</h1>";
                              }
                            else{
                                                           echo '<script>alert("Дата изменена"); setTimeout(function() {window.location.href = "promo.php";}, 500); </script>';

                            }
                                $conn->close();
                        }


                      
                ?>
   </div>
      <script>
            function drop(id) {
                var x;
                if (confirm("Акция будет удалена!") == true) {
                    window.location.href = "droppromo.php?id=" + id;

                } else {

                }
            }

            function edit(id) {

                window.location.href = "editproduct.php?id=" + id;

            }
        </script>
    </body>
    
</html>