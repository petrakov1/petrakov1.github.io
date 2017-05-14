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
    <!--<script src="js/cart.js"></script>-->
    <!--<script src="js/main.js"></script><script src="js/jquery.validate.js"></script>-->

        <!--<script src="js/sly.min.js"></script>-->

<!--<script type="text/javascript" src="css/slick/slick.min.js"></script>-->
<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39943105 = new Ya.Metrika({ id:39943105, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true, ecommerce:"dataLayer" }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39943105" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<!-- <script src="jquery.validate.js"></script>-->

</head>
<body>

    <?php include "menu.php" ?>

   <div id="content">
       <div id="nav">

           <!-- <a href=".php">Новые заказы</a> -->


       </div>
             <h1>Страницы</h1>

        <?php
       include "../connect.php";
                $cid= $_REQUEST["c"];

                    $sql = "SELECT * FROM text";

                    echo ' <section id="products"><div class="products"><table><thead>
           <td>Название</td>
           <td>Дата</td>
           <td></td>

       </thead><tr>';


                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
            // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<td >';

                    echo ' '.$row["title"].'</td><td>
                                            '.$row["date"].'</td>


                <td style=" width: 100px;">
                      <a href="page.php?id='.$row["id"].'" class="button-grey">изменить</a>

                </td>


              </tr>';
           }
        }
                            echo '</table>';






                $conn->close();
              ?>

   </div>
    </body>

</html>
