
           <!--Created by Petrakov-->
<!--Designed by VladShe -->
<!-- http://vladshe.ru/ -->


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>F3 studio</title>
    <meta name = "format-detection" content = "telephone=no">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="style.css" rel="stylesheet">
	<link href="fonts/stylesheet.css" rel="stylesheet">
    <script src="../js/jquery.validate.js"></script>

    <script src="../js/jquery-2.1.4.min.js"></script>
      <script src="ckeditor/ckeditor.js"></script>


<script type="text/javascript" src="css/slick/slick.min.js"></script>
<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39943105 = new Ya.Metrika({ id:39943105, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true, ecommerce:"dataLayer" }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39943105" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<!-- <script src="jquery.validate.js"></script>-->

</head>
<body> 
    
    <?php include "menu.php" ?>
    
   <div id="content">
       <div id="nav">
           
           <a href="lookbook.php">Назад</a>
           
           
       </div>
            <form method="post" enctype="multipart/form-data" id="form">
            <h1>Новый лукбук</h1>
            <div class="input-row">
                <label>Название</label>
                
                <input class="" type="text" placeholder="title" name="title" required>
              
                 </div><div class="input-row">
                <label>Изображения</label>
                
                <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*"  required/>
               </div>
                <input class="uppercase button pink-back display-block " type="submit" value="добавить">
            </form>
                                    <?php 
                                                    $valid_formats = array("jpg", "png");
                            $max_file_size = 1024*1024*2; //100 kb
                            $count = 0;

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['title'])) {$title = $_POST['title'];}
                              include '../connect.php';
                                                    


                            $sql = "INSERT INTO lookbook (`id`, `date`,`title`) VALUES (NULL,  '".date("Y-m-d")."', '$title')"; 
//                                                            $conn->query($sql);
                               if (!$conn->query($sql))
                              {
                              echo("<h1 class='white'>Error description: " . mysqli_error($conn)). "</h1>";
                              }
                            else{
//                                $last_id = $conn->insert_id;
                              
//                                $sql= "UPDATE `products` SET `img_count` = '".$count."' WHERE `id` =".$last_id;
//                                $conn->query($sql);
                                echo("<h1 class='white'>Лукбук добавлен</h1>");
                            }
                            $last_id = $conn->insert_id;
                            
                            $path = "../content/lookbook/$last_id/"; // Upload directory
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
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
                                            else{ 
                                          

                                                // No error found! Move uploaded files 
//                                                $count++;
//                                                echo $path.$name.".jpg";
                                                if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name))
                                                {
//                                                    //$last_id."_".$count
                                                        echo "$name добален<br>";
                                                        $sql= "UPDATE `lookbook` SET `path` = 'content/lookbook/$last_id/".$name."' WHERE `id` =".$last_id;
                                                        $conn->query($sql);
//                                                // Number of successfully uploaded file
                                            }
                                        }
                                    }
                              }
                          
                        
                            
                             
                                $conn->close();
                        }


                      
                ?>
        </div>




<script src="../js/jquery.validate.js"></script>

  <script>
     $("#form").validate();
    </script>

</body>

</html>