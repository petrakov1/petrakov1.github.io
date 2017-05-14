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
    <script src="../js/jquery.validate.js"></script>

    <script src="../js/jquery-2.1.4.min.js"></script>
      <script src="ckeditor/ckeditor.js"></script>


<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39943105 = new Ya.Metrika({ id:39943105, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true, ecommerce:"dataLayer" }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39943105" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<!-- <script src="jquery.validate.js"></script>-->

</head>
<body> 
    
    <?php include "menu.php" ?>
    
   <div id="content">
       <div id="nav">
           
           <a href="categories.php">Назад</a>
           
           
       </div>
        <form method="post" enctype="multipart/form-data" class="" id="form">
             <?php 
                     include '../connect.php';
                    $id= $_REQUEST["id"];
                    $sql = "SELECT * FROM categories WHERE id='$id'"; 
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                                // output data of each row
                            $row = $result->fetch_assoc();
                    }
             $conn->close();
            ?>
            <h1>Изменить субкатегорию</h1>
            <div class="input-row">
            <label>Название</label>
            <input class="" type="text" placeholder="title" name="title" id="title" required>
                         </div><div class="input-row">
                           <label>Категория</label>
                
                <select name="category" id="category" required>
                    <?php 
                     include '../connect.php';
                        $sql = "SELECT * FROM categories WHERE level=1"; 
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                                // output data of each row
                            while($row1 = $result->fetch_assoc()) {
                            echo '<option value="'.$row1["id"].'">'.$row1["name"].'</option>';
                            }
                        }
                        $conn->close();
                ?>

                </select>

                 </div>
                <div class="input-row">
                           <label>Приоритет</label>
                
                <select name="priority" id="priority" required>
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   <option value="6">6</option>
                   <option value="7">7</option>
                   <option value="8">8</option>
                   <option value="9">9</option>
                   <option value="10">10</option>
                   

                </select>
                
                 </div><div class="input-row">
            <label>Описание(до 255 символов)</label>
             <textarea name="editor1" id="editor1" rows="10" cols="80">
               Описание
            </textarea>
            </div>  <div class="input-row">
                <label>Быстрая ссылка</label>
                <input class="" type="text" placeholder="url" name="url" id="url">

                </div>
            <div class="input-row">
                <label>Главная картинка</label><br>
                <?php echo '<div><img class="thumb" src="/images/category/'.$row["id"].'.jpg" ></div>'; ?>
            </div>
            <div class="input-row">
                <label>Заменить</label>
                <input type="file" id="mainfile" class="inputfile" name="mainfiles[]" multiple="multiple" accept="image/*" data-multiple-caption="{count} files selected"
                />
            </div>
            <script>
                CKEDITOR.replace( 'editor1' );
            </script>
              <script>
        document.getElementById("title").value = '<?php echo str_replace(array("\r", "\n"), '',$row["name"]); ?>';
        document.getElementById("category").value = "<?php echo $row['root']; ?>";
        document.getElementById("priority").value = "<?php echo $row['priority']; ?>";
                document.getElementById("url").value = "<?php echo $row["url"]; ?>";

        document.getElementById("editor1").value = '<?php echo str_replace(array("\r", "\n"), '',$row["description"]); ?>';
    
    </script>
            <input class="uppercase white button pink-back display-block " type="submit" value="Сохранить"> 
        </form>
          <?php 
       
    
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['title'])) {$title = $_POST['title'];}
                            if (isset($_POST['category'])) {$category = $_POST['category'];}
                            if (isset($_POST['priority'])) {$priority = $_POST['priority'];}
                            if (isset($_POST['url'])) {$url = $_POST['url'];}
                            
//                              if (isset($_POST['hidden'])) {$hidden = $_POST['hidden'];}
                            if (isset($_POST['editor1'])) {$desc = $_POST['editor1'];}
                              include '../connect.php';
                        $sql = "UPDATE categories SET `name` = '".$title."',`root` = '".$category."' ,`description` = '".$desc."',                          `url` = '".$url."' ,
`priority` = '".$priority."' WHERE id=".$id; 
//                          ,`hidden` = '".$hidden."'
                                if (!$conn->query($sql))
                              {
                              echo("<h1 class='white'>Error description: " . mysqli_error($conn)). "</h1>";
                              }
                            else{
                                   $valid_formats = array("jpg", "png");
                            $max_file_size = 1024*1024*20; //100 kb
                            $count = 0;
                   

                            
                            $path = "../images/category/"; // Upload directory
                                   foreach ($_FILES['mainfiles']['name'] as $f => $name) {

                                        if ($_FILES['mainfiles']['error'][$f] == 4) {
                                            continue; // Skip file if any error found
                                        }	       
                                        if ($_FILES['mainfiles']['error'][$f] == 0) {	           
                                            if ($_FILES['mainfiles']['size'][$f] > $max_file_size) {
                                                echo "$name is too large!.<br>";
                                                continue; // Skip large files
                                            }
                                            elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
                                                echo "$name is not a valid format<br>";
                                                continue; // Skip invalid file formats
                                            }
                                            else{ 
                                                $filename = $path.$id.".jpg";
                                                @chmod($filename, 0666);
                                            if ( !(@unlink($filename)) ) echo 'Delete File.';
                                                


                                                // No error found! Move uploaded files 
//                                                $count++;
//                                                echo $path.$name.".jpg";
                                                if(move_uploaded_file($_FILES["mainfiles"]["tmp_name"][$f], $path.$id.".jpg"))
                                                {
// //                                                    //$last_id."_".$count
                                                        echo "$name добален<br>";
                                                     
// //                                                // Number of successfully uploaded file
                                            }
                                        }
                                    }
                              }

                           echo '<script>alert("Категория изменена"); setTimeout(function() {window.location.href = "categories.php";}, 500); </script>';

                                // echo("<h1 class='white'>Категория изменена</h1>");
//                                header("Location: products.php");
//    exit;
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