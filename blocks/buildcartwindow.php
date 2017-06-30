
      <div class="flex">
            <p>Корзина</p>
            <img src="css/images/close.png" alt="" id="cart-button" class="cart-button">
        </div>
        <div class="items">
         
                  
     
       
<?php

                    include '../connect.php';
                    $json = $_COOKIE["cart"].']';
                    $allsum=0;
                    $quantity =0;
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
                                $row = $result->fetch_assoc();
                                  $price = (int)$row["price"]-(int)$row["discount"];
                                $sum = $item["number"]*$price;
                                $allsum += $sum;
                              $quantity += $item["number"];
          
         
       

                                echo '<item>';


                                  $sql1 = "SELECT name FROM images WHERE idProduct=".$id." LIMIT 1";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            $row1 = $result1->fetch_assoc();
                                echo '<img class="" src="images/product/'.$id.'/MQ/'.$row1["name"].'" alt="">';

                        }
                        

                        echo ' 
                        
                            <div> 
                                <div class="flex"> 
                                 <div>
                                        <p class="heading">'.$row["title"].'</p>
                                         <p class="price" id="sum'.$oid.'">
                                    '.$sum.' ₽
                                 </p>
                                 </div>
                                        <img src="css/images/close.png" alt="" onclick="remove_product('.$oid.');" class="remove">
                                    
                                 </div>
                                 <div class="desc">
                                     '.$row["description"].'
                                 </div>

                                 <p class="size">Размер: '.$item["size"].'</p>
                                 <p class="q">Кол-во:</p>
                                  <div class="quantity noselect">
                                  
                    <p class="number" onclick="add_qty_ajax('.$oid.',-1);" data-number="-1">-</p>
                    <p id="n'.$oid.'">'.$item["number"].'</p>
                    <p class="number" onclick="add_qty_ajax('.$oid.',1);" data-number="1">+</p>
                </div>
                                 
                                
                            </div>
                            <div class="line"></div>
                            
            </item>
                        
                          
                                ';
                                // }
                            }
                    }
        


}
else {
    echo '<h2 class="empty">Пока пусто</h2>
      
    ';
}
                    $conn->close();


                ?>


   </div>
        <div class="flex">
            <a class="button" href="checkout.php">оформить</a>
                    <p>Итого: <span id="tot"><?php echo $allsum; ?></span></p>

        </div>
<script>

console.log("<?php echo $allsum ?>");
//   setCookie("cart_sum",<?php echo $allsum ?>,7);
</script>
