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
	<link href="../css/fonts/stylesheet.css" rel="stylesheet">

    <script src="../js/jquery-2.1.4.min.js"></script>
    
<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39943105 = new Ya.Metrika({ id:39943105, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true, ecommerce:"dataLayer" }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39943105" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<!-- <script src="jquery.validate.js"></script>-->

</head>
<body> 
    
    <?php include "menu.php" ?>
    
   <div id="content">
       <div id="nav">
           
           <a href="addcategory.php">Добавить категорию</a>
           <a href="addsubcategory.php">Добавить субкатегорию</a>
           
           
       </div>
             <h1>Категории</h1>
<table>
        <?php 
       include "../connect.php";
              
                    $sql = "SELECT * FROM categories WHERE level=1";

                 
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
            // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        $sql1 = "SELECT * FROM categories WHERE level=2 and root=".$row["id"];
                          echo '<td><h3 class="level'.$row["level"].'">'.$row["name"].'</h3></td>
</td>    <td></td>


                  <div><td>
                                         <a href="editcategory.php?id='.$row["id"].'"> <img src="../css/images/edit.svg" class="icon"> </a>
</td><td>
       <img onclick="drop('.$row["id"].')" class="icon" src="../css/images/empty.svg">
                      
                 
                       
                  
              </tr>';
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {

                            while($row1 = $result1->fetch_assoc()) {          
                                                        echo '<tr>';

                                  echo '
                                  <td><p class="level'.$row1["level"].'">'.$row1["name"].'</p>
                              

</td>    <td><p>'.$row1["priority"].'</p></td><td>
                  <div>
                     <a href="editsubcategory.php?id='.$row1["id"].'"> <img src="../css/images/edit.svg" class="icon"> </a>
                     </td><td>
       <img onclick="drop('.$row1["id"].')" class="icon" src="../css/images/empty.svg">
                   </td>
                  
              </tr>';
                                
//                                echo '<img src="http://f3studiostore.com/images/categories/'.$row["idProduct"].'/MQ/'.$row1["name"].'" alt="">';
//                   
//                                break;
//             
                            }
                        }
                  
           }
        }
              
               
               
               
               
                $conn->close();
              ?>
      </table>
   </div>
      <script>
            function drop(id) {
                var x;
                if (confirm("Категория будет удалена!") == true) {
                    window.location.href = "dropcat.php?id=" + id;

                } else {

                }
            }

            function edit(id) {

                window.location.href = "editproduct.php?id=" + id;

            }
        </script>
    </body>
    
</html>