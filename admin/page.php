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
      <script src="ckeditor/ckeditor.js"></script>
    <script src="../js/jquery.validate.js"></script>


<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39943105 = new Ya.Metrika({ id:39943105, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true, ecommerce:"dataLayer" }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39943105" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<!-- <script src="jquery.validate.js"></script>-->

</head>
<body> 
    
    <?php include "menu.php" ?>
    
   <div id="content">
       <div id="nav">
           
           <a href="pages.php">Назад</a>
           
           
       </div>
        <form method="post" enctype="multipart/form-data" class="" id="form" action="">
             <?php 
                     include '../connect.php';
                    $id= $_REQUEST["id"];
                    $sql = "SELECT * FROM text WHERE id='$id'"; 
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                                // output data of each row
                            $row = $result->fetch_assoc();
                    }
             $conn->close();
            ?>
            <h1>Изменить страницу</h1>
            <div class="input-row">
            <label>Название</label>
            <input class="" type="text" placeholder="title" name="title" id="title" required>
                         </div><div class="input-row">
            <label>Текст(до 255 символов)</label>
             <textarea name="editor1" id="editor1" rows="10" cols="80">
               Описание
            </textarea>
            </div>
             <!--<div class="input-row">
                <label>Главная картинка</label><br>
                <?php echo '<div><img class="thumb" src="/images/category/'.$row["id"].'.jpg" ></div>'; ?>
            </div>
            <div class="input-row">
                <label>Заменить</label>
                <input type="file" id="mainfile" class="inputfile" name="mainfiles[]" multiple="multiple" accept="image/*" data-multiple-caption="{count} files selected"
                />
            </div>-->
            <script>
                CKEDITOR.replace( 'editor1' );
            </script>
              <script>
        document.getElementById("title").value = "<?php echo str_replace(array("\r", "\n"), '',$row["title"]); ?>";
//                    document.getElementById("hidden").value = "<?php echo $row['hidden']; ?>";
        document.getElementById("editor1").value = "<?php echo str_replace('"',"'",str_replace(array("\r", "\n"), '',$row["content"])); ?>";
    
    </script>
            <input class="uppercase white button pink-back display-block " type="submit" value="Сохранить"> 
        </form>
          <?php 
       
    
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['title'])) {$title = $_POST['title'];}
                            // if (isset($_POST['price'])) {$price = $_POST['price'];}
//                              if (isset($_POST['hidden'])) {$hidden = $_POST['hidden'];}
                            // if (isset($_POST['category'])) {$category = $_POST['category'];}
                            if (isset($_POST['editor1'])) {$desc = $_POST['editor1'];}
                              include '../connect.php';
                        $sql = "UPDATE text SET `title` = '".$title."',`content` = '".$desc."' WHERE id=".$id; 
//                          ,`hidden` = '".$hidden."'
                                if (!$conn->query($sql))
                              {
                              echo("<h1 class='white'>Error description: " . mysqli_error($conn)). "</h1>";
                              }
                            else{
                             
                                echo '<script>alert("Страниця изменена"); setTimeout(function() {window.location.href = "pages.php";}, 500); </script>';

                            }
                                $conn->close();
                        }


                      
                ?>
    </div>
      
  <script>
     $("#form").validate();
    </script>

    
    
    </body>
</html>