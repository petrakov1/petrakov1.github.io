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


<!--<script type="text/javascript" src="css/slick/slick.min.js"></script>-->
<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39943105 = new Ya.Metrika({ id:39943105, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true, ecommerce:"dataLayer" }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39943105" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<!-- <script src="jquery.validate.js"></script>-->

</head>
<body>

    <?php include "menu.php" ?>

   <div id="content">
       <div id="nav">

           <!--<a href="products.php">Назад</a>-->


       </div>
        <form method="post" enctype="multipart/form-data" class="" id="form">
             <?php
                     include '../connect.php';
                    $sql = "SELECT * FROM text WHERE id=5";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                                // output data of each row
                            $row = $result->fetch_assoc();
                    }
             $conn->close();
            ?>
                
                         <div class="input-row">
            <label>Описание(до 255 символов)</label>
             <textarea name="editor1" id="editor1" rows="10" cols="80">
               Описание
            </textarea>
              </div> <div class="input-row">
              <label>Изображения</label>
               <div>
                 <?php
                                        include '../connect.php';

                        $sql1 = "SELECT * FROM sert";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            // output data of each row

                            while($row1 = $result1->fetch_assoc()) {

                                echo '<div><img class="thumb"  src="../images/sert/'.$row1["name"].'" alt=""> 
                                <img class="remove-file" src="/css/images/close.svg" onclick="dropfile('.$row1["id"].')"></div>';

                            }
                        }
                                           $conn->close();

                   ?>
               </div>
            </div>
             <div class="input-row">
                <label>Изображения</label>
                <input type="file" id="file" class="inputfile" name="files[]" multiple="multiple" accept="image/*" data-multiple-caption="{count} files selected"/>

                </div>
            <script>
                CKEDITOR.replace( 'editor1' );
            </script>
              <script>
  
        document.getElementById("editor1").value = '<?php echo str_replace("'","&apos;",str_replace(array("\r", "\n"), '',$row["content"])); ?>';

    </script>
            <input class="uppercase white button pink-back display-block " type="submit" value="Сохранить">
        </form>
          <?php
                        $valid_formats = array("jpg","JPG", "png");
                            $max_file_size = 1024*1024*5; //100 kb
                            $path = "../images/sert/"; // Upload directory
                            $count = 0;


                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            
                            if (isset($_POST['editor1'])) {$desc = $_POST['editor1'];}
                              include '../connect.php';
                        $sql = "UPDATE text SET
                         `content` =  '".$desc."'";
                          
                         
                         
                          $sql .=" WHERE id=5";
//                          ,`hidden` = '".$hidden."'
                                if (!$conn->query($sql))
                              {
                              echo("<h1 class='white'>Error description: " . mysqli_error($conn)). "</h1>";
                              }
                            else{
                     foreach ($_FILES['files']['name'] as $f => $name) {     
                                        if ($_FILES['files']['error'][$f] == 4) {
                                            continue; // Skip file if any error found
                                        }	       
                                        if ($_FILES['files']['error'][$f] == 0) {	           
                                            if ($_FILES['files']['size'][$f] > $max_file_size) {
                                                echo "$name is too large!.<br>";
                                                continue; // Skip large files
                                            }
                                            elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                                                echo "$name is not a valid format<br>";
                                                continue; // Skip invalid file formats
                                            }
                                            else{ // No error found! Move uploaded files 
//                                                $count++;
//                                                echo $path.$name.".jpg";
                                                if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name))
                                                {
                                                    $text_content=1;
                                                    
                    
//                                                    //$last_id."_".$count
                                                echo "$name добален<br>";
                                                    $sql = "INSERT INTO sert (`id`, `name`) VALUES (NULL, '".$name."')"; 
                          
                                if (!$conn->query($sql))
                              {
                              echo("<h1 class='white'>Error description: " . mysqli_error($conn)). "</h1>";
                              }else {
																								echo "$name добален<br>";

																							}
                                               // Number of successfully uploaded file
                                           }
                                       }
                                   }

                                // echo("<h1 class='white'>Продукт изменен</h1>");
//                                header("Location: products.php");
//    exit;
                            }
                                 echo '<script>alert("Сертификаты изменены"); setTimeout(function() {window.location.href = "sert.php";}, 500); </script>';
                            
                                $conn->close();
                        }

                        }

                ?>
    </div>


<script src="../js/jquery.validate.js"></script>
<script src="options.js"></script>

  <script>
     $("#form").validate();
         function dropfile(id) {
                var x;
                if (confirm("Фото будет удалено!") == true) {
                    window.location.href = "dropsert.php?id=" + id;

                } else {

                }
            }
    </script>


    </body>
</html>
