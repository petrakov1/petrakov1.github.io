
                                    <?php 
                                             
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST['product'])) {$product = $_POST['product'];}
                            if (isset($_POST['discount'])) {$discount = $_POST['discount'];}
                          
                              include '../connect.php';
                        $sql = "UPDATE products SET `discount`=$discount ,`date` = '".date("Y-m-d")."'  WHERE idProduct=".$product.""; 
                          
                                if (!$conn->query($sql))
                              {
                              echo("<h1 class='white'>Error description: " . mysqli_error($conn)). "</h1>";
                              }
                            else{
                                
                                echo("Акция добавлена");
                            }
                                $conn->close();
                        }


                      
                ?>