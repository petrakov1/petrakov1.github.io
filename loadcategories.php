  <?php

                    include 'connect.php';

                $id = $_REQUEST["category"];
                $sql = "SELECT * FROM products WHERE category_id=$id ORDER BY `date` DESC";
       
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $price = (int)$row["price"] - (int)$row["discount"];
                        echo '<div><div class="top flex"> 
                        <p onclick="add_product('.$row["idProduct"].',1)">добавить в корзину</p>
                        </div>';
                        $sql1 = "SELECT name FROM images WHERE idProduct=".$row["idProduct"]." LIMIT 1";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            while($row1 = $result1->fetch_assoc()) {
                                echo '<img src="images/product/'.$row["idProduct"].'/MQ/'.$row1["name"].'" alt="">';


                            }
                        }
                    echo '
                        <h3>'.$row["title"].'</h3>

                  
                          <p>'.number_format($price,0,"","").' руб.</p>
                     
                      </div>';

                 }
                }




                $conn->close();
              ?>