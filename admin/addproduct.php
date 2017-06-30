
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

           <a href="products.php">Назад</a>


       </div>
            <form method="post" enctype="multipart/form-data" id="form" action="">
                <h1>Новый товар</h1>
                <div class="input-row">
                <label>Название</label>
                <input class="" type="text" placeholder="title" name="title" required>

                </div>
                <div class="input-row">

                <label>Цена</label>

                <input class="" type="text" placeholder="100" name="price" required>

                </div><div class="input-row">
                <label>Категория</label>

                <select name="category" >
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
                   </div>
                      <div class="input-row">
            <label>Субкатегория</label>

            <select name="subcategory" id="subcategory">
              <?php
                     include '../connect.php';
                        $sql = "SELECT * FROM categories WHERE level=2";
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
									 <!--<div class="input-row">
                   <label>Цвета</label>
                   <input type="text" placeholder="цвет" class="option" id="option-color-title">
                   <input type="hidden" name="colors" id="option-colors">
                    <p class="button-grey" onclick="addColorOption(getColorTitle());">Добавить</p>
                       <ul class="options" id="color-options">

                 </ul>
                   </div>
									 <div class="input-row">
										<label>Размеры</label>
										<input type="text" placeholder="размер" class="option" id="option-size-title">
										<input type="hidden" name="sizes" id="option-sizes">
										 <p class="button-grey" onclick="addSizeOption(getSizeTitle());">Добавить</p>
												<ul class="options" id="size-options">

									</ul>
										</div>
									 <div class="input-row">
                        <label>Похожие товары</label>
                        <input type="hidden" id="option-suggestions" name="suggestions" id="option-colors">

                        <select class="option" id="option-suggestions-title">
                                           <?php
                     include '../connect.php';
                        $sql = "SELECT * FROM product";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                                // output data of each row
                            while($row = $result->fetch_assoc()) {
                            echo '<option value="'.$row["idProduct"].'" id="s'.$row["idProduct"].'" data-title="'.strtr($row["titleProduct"], '"', "'").'">'.$row["titleProduct"].'</option>';
                            }
                        }
                        $conn->close();
                ?>
                </select>
                   <p class="button-grey" onclick="addsuggestionsOption(getsuggestionsTitle(),getsuggestionsId());">Добавить</p>
                 <ul class="options" id="suggestions-options">

                 </ul>
                   </div>-->
 <div class="input-row">
                   <label>Цвета</label>
                   <input type="text" placeholder="цвет" class="option" id="option-color-title">
                   <input type="hidden" name="colors" id="option-colors">
                    <p class="button-grey" onclick="addColorOption(getColorTitle());">Добавить</p>
                       <ul class="options" id="color-options">

                 </ul>
                   </div>
                   <div class="input-row">


                <label>Описание(до 255 символов)</label>
                </div><div class="input-row">
                <textarea name="editor1" id="editor1" rows="10" cols="80">
                    Описание
                </textarea>
            
                 </div>
                  <div class="input-row">
                <label>Быстрая ссылка</label>
                <input class="" type="text" placeholder="url" name="url">

                </div>
                 <div class="input-row">
                <label>Изображения</label>
                <input type="file" id="file" class="inputfile" name="files[]" multiple="multiple" accept="image/*" data-multiple-caption="{count} files selected"  required/>

                </div>
                <script>
                    CKEDITOR.replace('editor1');
                </script>
                <input class="uppercase button pink-back display-block " type="submit" value="добавить">
            </form>
                                   <?php
                                                    $valid_formats = array("jpg","JPG", "png");
                            $max_file_size = 1024*1024*5; //100 kb
                            $path = "../images/product/"; // Upload directory
                            $count = 0;

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                        if (isset($_POST['url'])) {$url = $_POST['url'];}

                            if (isset($_POST['title'])) {$title = $_POST['title'];}
                            if (isset($_POST['price'])) {$price = $_POST['price'];}
                            if (isset($_POST['colors'])) {$colors = $_POST['colors'];}
                            if ($colors=='{"title":"Цвет","n":0,"list":[null]}')
                            {
                                $colors = "";
                            }
							// if (isset($_POST['sizes'])) {$sizes = $_POST['sizes'];}
                            if (isset($_POST['category'])) {$category = $_POST['category'];}
                            if (isset($_POST['subcategory'])) {$subcategory = $_POST['subcategory'];}
                            
                            // if (isset($_POST['suggestions'])) {$suggestions = $_POST['suggestions'];}
                            if (isset($_POST['editor1'])) {$desc = $_POST['editor1'];}
                              include '../connect.php';
                        $sql = "INSERT INTO products (`idProduct`, `title`, `description`, `price`,`category_id`,`subcategory_id`,`colors`,`url`) VALUES (NULL, '".$title."', '".$desc."','".$price."','".$category."','".$subcategory."','".$colors."','".$url."')";
                                if (!$conn->query($sql))
                              {
                              echo("Error description: " . mysqli_error($conn)). "";
                              }
                            else{
                               $last_id = $conn->insert_id;
															 mkdir($path.$last_id.'/LQ', 0777, true);
															 mkdir($path.$last_id.'/MQ', 0777, true);
															 mkdir($path.$last_id.'/HQ', 0777, true);
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

																				switch(strtolower($_FILES['files']['type'][$f]))
																					{
																					case 'image/jpeg':
																							$image = imagecreatefromjpeg($_FILES['files']['tmp_name'][$f]);
																							break;
																					case 'image/png':
																							$image = imagecreatefrompng($_FILES['files']['tmp_name'][$f]);
																							break;
																					case 'image/gif':
																							$image = imagecreatefromgif($_FILES['files']['tmp_name'][$f]);
																							break;
																					default:
																							exit('Unsupported type: '.$_FILES['files']['type'][$f]);
																					}



																					// Get current dimensions
																					$old_width  = imagesx($image);
																					$old_height = imagesy($image);

																					// Calculate the scaling we need to do to fit the image inside our frame
																					$scale1      = 0.2;
																					$scale2      = 0.5;
																					$scale3      = 1;

																					// Get the new dimensions
																					$new_width  = ceil($scale1*$old_width);
																					$new_height = ceil($scale1*$old_height);

																					// Create new empty image
																					$new = imagecreatetruecolor($new_width, $new_height);

																					// Resize old image into new
																					imagecopyresampled($new, $image,
																					    0, 0, 0, 0,
																					    $new_width, $new_height, $old_width, $old_height);

																							ob_start();
																					imagejpeg($new, $path.$last_id.'/LQ/'.$name, 90);
																					$new_width  = ceil($scale2*$old_width);
																					$new_height = ceil($scale2*$old_height);

																					// Create new empty image
																					$new = imagecreatetruecolor($new_width, $new_height);

																					// Resize old image into new
																					imagecopyresampled($new, $image,
																							0, 0, 0, 0,
																							$new_width, $new_height, $old_width, $old_height);

																							ob_start();
																					imagejpeg($new, $path.$last_id.'/MQ/'.$name, 90);
																					$new_width  = ceil($scale3*$old_width);
																					$new_height = ceil($scale3*$old_height);

																					// Create new empty image
																					$new = imagecreatetruecolor($new_width, $new_height);

																					// Resize old image into new
																					imagecopyresampled($new, $image,
																							0, 0, 0, 0,
																							$new_width, $new_height, $old_width, $old_height);

																							ob_start();
																					imagejpeg($new, $path.$last_id.'/HQ/'.$name, 90);
																					$data = ob_get_clean();
																					// Destroy resources
																					imagedestroy($image);
																					imagedestroy($new);


                                              //  $count++;
                                              //  if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$last_id."_".$count.".jpg"))
                                                   //$last_id."_".$count

																									 $sql= "INSERT INTO images (`id`,`idProduct`,`name`) VALUES (NULL,'".$last_id."', '$name')" ;

																							if (!$conn->query($sql))
																						{
																						echo("Error description: " . mysqli_error($conn)). "";
																					}else {
																								$text .= "$name добален\n";

																							}
                                               // Number of successfully uploaded file
                                           }
                                       }
                                   }
                                echo '<script>alert("Продукт добавлен"); setTimeout(function() {window.location.href = "products.php";}, 500); </script>';

                            }
                                $conn->close();
                        }



                ?>

        </div>

<script src="../js/jquery.validate.js"></script>
<script src="options.js"></script>

  <script>
      var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});
     $("#form").validate();

    </script>


</body>

</html>
