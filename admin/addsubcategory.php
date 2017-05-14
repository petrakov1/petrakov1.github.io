
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
	<link href="../css/fonts/stylesheet.css" rel="stylesheet">

    <script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/jquery.validate.js"></script>
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
            <form method="post" enctype="multipart/form-data" id="form">
               <h1>Новая субкатегория</h1>
                <div class="input-row">
                <label>Название</label>

                <input class="" type="text" placeholder="title" name="title" required>
               </div><div class="input-row">

                <label>Категория</label>

                <select name="category" required>
                    <?php
                     include '../connect.php';
                        $sql = "SELECT * FROM categories WHERE level=1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                                // output data of each row
                            while($row = $result->fetch_assoc()) {
                            echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                            }
                        }
                        $conn->close();
                ?>

                </select>

                 </div><div class="input-row">
                <label>Описание(до 255 символов)</label>

                <textarea name="editor1" id="editor1" rows="10" cols="80">
                    Описание
                </textarea>
                 </div>  <div class="input-row">
                <label>Быстрая ссылка</label>
                <input class="" type="text" placeholder="url" name="url" id="url">

                </div><div class="input-row">
                <label>Изображения</label>

                <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
                </div>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
                <input class="uppercase button pink-back display-block " type="submit" value="добавить">
            </form>
                                    <?php
                                                    $valid_formats = array("jpg", "png");
                            $max_file_size = 1024*1024*5; //100 kb
                            $path = "../images/categories/"; // Upload directory
                            $count = 0;

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                        if (isset($_POST['url'])) {$url = $_POST['url'];}

                            if (isset($_POST['title'])) {$title = $_POST['title'];}
                            if (isset($_POST['category'])) {$category = $_POST['category'];}
                            if (isset($_POST['editor1'])) {$desc = $_POST['editor1'];}
                              include '../connect.php';
                        $sql = "INSERT INTO categories (`id`, `name`, `root`, `level`,`url`) VALUES (NULL, '".$title."', '".$category."','2','".$url."')";

                                if (!$conn->query($sql))
                              {
                              echo("<h1 class='white'>Error description: " . mysqli_error($conn)). "</h1>";
                              }
                            else{
                            $last_id = $conn->insert_id;
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
								 if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$last_id.".jpg"))
								 echo "$name добален<br>";
//
//$last_id."_".$count
//                                                // Number of successfully uploaded file
						 }
				 }
		 }
//                                $sql= "UPDATE `products` SET `img_count` = '".$count."' WHERE `id` =".$last_id;
//                                $conn->query($sql);
                                // echo("<h1 class='white'>Категория добавлена</h1>");
                                echo '<script>alert("Категория добавлена"); setTimeout(function() {window.location.href = "categories.php";}, 500); </script>';

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
