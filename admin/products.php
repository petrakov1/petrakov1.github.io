<?php include "session.php"; ?>

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
<script>
function search(str) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("product-table").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getproducts.php?q=" + str, true);
        xmlhttp.send();

}
</script>
</head>
<body>

    <?php include "menu.php" ?>

   <div id="content">
       <div id="nav">
             <h1>Товары</h1>

           <a href="addproduct.php">Добавить товар</a>
<!--           <form action="search.php">-->

               <input type="text" name="keyword" placeholder="Поиск..." onkeyup="search(this.value)">


<!--           </form>-->

       </div>
<table id="product-table">
       <thead>
            <td></td>
            <td>Название</td>
            <td>Изменить</td>
            <td>Удалить</td>

       </thead>
        <?php
       include "../connect.php";
                $cid= $_REQUEST["c"];
                if ($cid != null)
                {
                    $sql = "SELECT * FROM products WHERE idSubcatalog=".$cid;


                    echo ' <section id="products"><div class="products">';}
                else
                {
                    $sql = "SELECT * FROM products";

                    echo ' <section id="products"><div class="products">';
                }

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
            // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        $sql1 = "SELECT name FROM images WHERE idProduct=".$row["idProduct"];
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            // output data of each row
                            $i=0;
                            while($row1 = $result1->fetch_assoc()) {

                                echo '<td><img class="thumb"s src="../images/product/'.$row["idProduct"].'/MQ/'.$row1["name"].'" alt=""></td>';

                                break;

                            }
                        }
                    echo '
                                           <td> <p>'.$row["title"].'</p>

</td><td>
                                        <a href="editproduct.php?id='.$row["idProduct"].'"> <img src="../css/images/edit.svg" class="icon"> </a>
</td><td>
       <img onclick="drop('.$row["idProduct"].')" class="icon" src="../css/images/empty.svg">

                  </td>


              </tr>';
           }
        }





                $conn->close();
              ?>
      </table>
   </div>
     <script>
            function drop(id) {
                var x;
                if (confirm("Продукт будет удален!") == true) {
                    window.location.href = "dropproduct.php?id=" + id;

                } else {

                }
            }

            function edit(id) {

                window.location.href = "editproduct.php?id=" + id;

            }
        </script>

    </body>

</html>
