<?php 
                    include '../connect.php';
                    $id= $_REQUEST["id"];
                    $sql = "DELETE FROM `banners` WHERE `id`='$id'"; 
                     if (!$conn->query($sql))
                              {
                              echo("<h1 class='white'>Error description: " . mysqli_error($conn)). "</h1>";
                              }
                    else{
                        header("Location: banners.php");
                     exit;
                        
                    }

                     
                ?>