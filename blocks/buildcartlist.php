<?php
                    include '../connect.php';
                    $json = $_COOKIE["cart"].']';
                    $allsum=0;
                    $json = json_decode($json,true);
if($_COOKIE["cart_number"]>0)
{


                    for($i=1;$i<=$_COOKIE["cart_number"];$i++)
                    {
                            $item =  $json[$i];
                            $id=  $item["id"];
                         $oid=  $item["o_id"];
                            $sql = "SELECT * FROM products WHERE idProduct='$id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {

                                if ($i > 1)
                                {
                                    echo '<hr class="white-back">';
                                }

                                $row = $result->fetch_assoc();
                                   $sql1 = "SELECT name FROM images WHERE idProduct=".$id." LIMIT 1";
                        $result1 = $conn->query($sql1);

                        if ($result1->num_rows > 0) {
                            $row1 = $result1->fetch_assoc();
                                echo '<div class="cart-item"><div class="item-info"><img class="thumb" src="images/product/'.$id.'/MQ/'.$row1["name"].'" alt="">';

                        }
                        else {
                                echo '<div class="cart-item"><div class="item-info"><img class="thumb thumb-empty" src="" alt="">';
                            
                        }

  $price = (int)$row["price"]-(int)$row["discount"];
                                echo '<p class="title uppercase">';
                                echo $row["title"];
                                echo   '</p></div><div class="line"></div><div class="item-qty">';
                                echo  ' <p class="minus pointer pink" id="1" onclick="add_qty_ajax('.$oid.',-1);">-</p><p class="number" id="n'.$oid.'">';
                                echo     $item["number"];
                                echo      '</p><p class="plus pointer pink" id="1" onclick="add_qty_ajax('.$oid.',1);">+</p>';
                                $sum = $item["number"]*$price;
                                $allsum += $sum;
                                echo '<p class="price"><span id="sum'.$oid.'">'.$sum.'</span> ₽</p></div>';
                                echo  '<div class="rem"><p>удалить</p><img class="pointer" onclick="remove_product('.$oid.')" src="css/images/close-r.png" alt=""></div>';
                                echo '</div> ';
                            }
                    }

                     echo '<div class="cart-total"><h2 class="uppercase">Итого</h2><div class="line-big"></div>';

              echo ' <p class="sum"><span id="tot">';
                 echo  $allsum;
                 echo  '</span> ₽</p> <div class="line-small"></div></div>';
    echo '<div class="cart-buttons">

               <p class="button button-red" onclick="buy_modal()">Купить</p></div>';
}
else {
        echo "<h2 class='empty'>Пока пусто</h2>";

}
                    $conn->close();

                ?>


                                       <script>
                 setCookie("cart_sum",<?php echo $allsum ?>,7);
                </script>

<!--        <p class="button-white modal-delivery">Добавление доставки</p>         -->
