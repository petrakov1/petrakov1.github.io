
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


<script type="text/javascript" src="css/slick/slick.min.js"></script>
<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39943105 = new Ya.Metrika({ id:39943105, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true, ecommerce:"dataLayer" }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39943105" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<!-- <script src="jquery.validate.js"></script>-->

</head>
<body> 
    
    <?php include "menu.php" ?>
    
   <div id="content">
       <div id="nav">
           
           <a href="promo.php">Назад</a>
           
           
       </div>
            <form method="post" enctype="multipart/form-data" id="form">
                
              
            <h1>Новая акция</h1>
                 <div class="input-row">
                <label>Товар</label>
                
                <select name="product" required>
                    <?php 
                     include '../connect.php';
                        $sql = "SELECT * FROM products WHERE discount=0"; 
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                                // output data of each row
                            while($row = $result->fetch_assoc()) {
                            echo '<option value="'.$row["idProduct"].'">'.$row["title"].': '.$row["price"].'</option>';
                            }
                        }
                        $conn->close();
                ?>

                </select>
                 </div><div class="input-row">
                 <label>Скидка</label>
                <input type="text" placeholder="скидка" name="discount"  required>
                </div>
              
                <input class="uppercase button pink-back display-block " type="submit" value="добавить">
            </form>
        </div>


<script src="../js/jquery.validate.js"></script>

  <script>
     $("#form").validate();
    </script>

<script>
    
   $('form').on('submit', function (e) {
             e.preventDefault();
        if($("#form").valid()){
         
            $.ajax({  
                url: "in_promo.php", 
                type: "post",
                data: $(this).serialize(),
                success: function(res){
                    alert(res);
                    window.location.replace("promo.php");
//                    document.getElementById("push-text").innerHTML = "ваш заказ оврабатывается";
//         document.getElementById("push").classList.add("open");
//            setTimeout(function(){ document.getElementById("push").classList.remove("open");}, 2500);
                },
                error: function(err) {
           alert(err);
        }
            });  
      
        }
        });    
</script>

</body>

</html>