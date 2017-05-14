
<section id="slider">
  <img src="/css/images/arrow-left.png" class="arrow left arrowprev" alt="">
  <div id="slider-h">


    
    <?php
    
          include 'connect.php';
          $sql = "SELECT * FROM banners";
            $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  
                            while($row = $result->fetch_assoc()) {
                                
                                $name = $row["name"];
                                $link = $row["link"];
                                $id = $row["id"];
                                $textcontent = $row["text_content"];
                                $text = $row["text"];
                                echo '';
                   if($textcontent!=''){

                      echo ' <div class="slide-h">
      <div>
  <img src="images/banner/'.$textcontent.'" alt="">';

                   }
                   else {
                     
                      echo ' <div class="slide-h">
      <div>';
  // <h1>'.$textcontent.'</h1>';

                   }    
                   if ($link!=null)
                   {
   
                     echo '<a href="'.$link.'" class="button button-red">купить сейчас</a> ';
                   }  
                                
echo <<<END
  
    </div>
    <a href="catalog.php"> 
  <img src="images/banner/$name" alt="">
  </a>
    </div>
END;
                            }
                }
     ?>


       
      
  </div>
  <img src="/css/images/arrow-right.png" class="arrow right arrownext" alt="">


</section>