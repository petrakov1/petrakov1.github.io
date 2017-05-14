<?php 
                    include '../connect.php';
                    $id= $_REQUEST["id"];
                    $sql = "UPDATE products SET `discount`= 0 ,`date` = ".date("Y-m-d")." WHERE idProduct=".$id.""; 
                
                     if (!$conn->query($sql))
                              {
                              echo("<h1 class='white'>Error description: " . mysqli_error($conn)). "</h1>";
                              }
                    else{
                        header("Location: promo.php");
                     exit;
                        
                    }

                     
                ?>