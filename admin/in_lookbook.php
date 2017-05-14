  <?php 
                                                    $valid_formats = array("jpg", "png");
                            $max_file_size = 1024*1024*2; //100 kb
                            $path = "../content/lookbook/"; // Upload directory
                            $count = 0;

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['title'])) {$title = $_POST['title'];}
                              include '../connect.php';
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
//                                                    //$last_id."_".$count
                                                echo "$name добален<br>";
//                                                // Number of successfully uploaded file
                                            }
                                        }
                                    }
                              }
                        $sql = "INSERT INTO lookbook (`id`, `path`, `date`) VALUES (NULL, 'content/lookbook/".$name."', '".date("Y-m-d")."')"; 
                          
                                if (!$conn->query($sql))
                              {
                              echo("<h1 class='white'>Error description: " . mysqli_error($conn)). "</h1>";
                              }
                            else{
//                                $last_id = $conn->insert_id;
                              
//                                $sql= "UPDATE `products` SET `img_count` = '".$count."' WHERE `id` =".$last_id;
//                                $conn->query($sql);
                                echo("Фото добавлено");
                            }
                                $conn->close();
                        }


                      
                ?>