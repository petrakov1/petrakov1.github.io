
    
<?php

                    include '../connect.php';
                    $json = $_COOKIE["cart"].']';
                    $allsum=0;
                    $quantity =0;
                    $json = json_decode($json,true);
if($_COOKIE["cart_number"]>0)
{

// if($_COOKIE["cart_number"]>3)
// {
//     echo '<div id="cart-scroll" class="scroll">';
// }
// else {
//     echo '<div id="cart-scroll" class="">';

// }

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
                                echo '<img class="thumb" src="images/product/'.$id.'/MQ/'.$row1["name"].'" alt="">';

                        }
                        

                        echo '    <p class="text">'.$row["title"].'</p>
                            <div>
            <p class="number-minus" onclick="add_qty_ajax('.$oid.',-1)">-</p>
            <input type="text" class="number" id="n'.$oid.'" value="'.$item["number"].'">
            <p class="number-plus" onclick="add_qty_ajax('.$oid.',1)">+</p>
          </div>
                           
                            <p class="price"><span id="sum'.$oid.'" >'.$sum.'</span> руб.</p>
                            <img onclick="remove_product('.$oid.');" class="remove icon" src="css/images/close.png" alt="">
                               </item>
                                ';
                                // }
                            }
                    }
                    echo ' <div class="totals">
        <div class="flex">
          <p>кол-во = <span id="">'.$quantity.' шт.</span></p>
          <p>итого = <b><span id="tot"> '.$allsum.'  </span>руб.</b></p>
        </div>
        <p class="button-yellow">Купить</p>
      </div>';


}
else {
    echo '<h2 class="empty">Пока пусто</h2>
      
    ';
}
                    $conn->close();


                ?>



<script>

console.log("<?php echo $allsum ?>");
//   setCookie("cart_sum",<?php echo $allsum ?>,7);
</script>
