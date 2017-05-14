<?php
$q = $_REQUEST["q"];
$q = str_replace(" ","%",$q);
 include "../connect.php";
              
                    $sql = "SELECT * FROM product WHERE titleProduct LIKE '%$q%'";

//                    echo ' <section id="products"><div class="products">';
             
       
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
            // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        $sql1 = "SELECT name FROM images WHERE idProduct=".$row["idProduct"];
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            // output data of each row
                            $i=0;
                            while($row1 = $result1->fetch_assoc()) {
              
                                echo '<td><img class="thumb"s src="http://f3studiostore.com/images/products/'.$row["idProduct"].'/MQ/'.$row1["name"].'" alt=""></td>';
                   
                                break;
             
                            }
                        }
                    echo '
                                           <td> <p>'.$row["titleProduct"].'</p>

</td><td>
                                        <a href="editproduct.php?id='.$row["idProduct"].'"> <img src="../css/images/edit.svg" class="icon"> </a>
</td><td>
       <img onclick="drop('.$row["idProduct"].')" class="icon" src="../css/images/empty.svg">
                      
                  </td>
                       
                  
              </tr>';
           }
        }
              
               
               
               
               
                $conn->close();
?>