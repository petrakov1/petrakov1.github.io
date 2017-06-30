<!--Created by Petrakov-->
<!--Designed by VladShe -->
<!-- http://vladshe.ru/ -->
<!DOCTYPE html>
<html>

<head>
    <title>Товар</title>
    <?php include 'meta.php'; ?>
    <link rel="stylesheet" type="text/css" href="/css/slick/slick.css" /> 
    <script type="text/javascript" src="/css/slick/slick.min.js"></script>
    <?php include 'blocks/anal.php'; ?>
</head>

<body class="">
    <div class="fix">
        <?php include("blocks/header.php");  ?>
        <section class="wrap" id="submenu">
    <div >
      <ul>
        <li>
          <a href="delivery.php">доставка</a>
        </li>
         <li>
          <!--<a href="shops.php">мы в Магазинах</a>-->
        </li>
      </ul>
    </div>
</section>
    </div>
    <?php 
                     include 'connect.php';
                    $id= $_REQUEST["id"];
                    $sql = "SELECT * FROM products WHERE idProduct='$id'"; 
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                                // output data of each row
                            $row = $result->fetch_assoc();
                    }
            ?>
    <section class="wrap white-back" id="product">
        <div id="images">
        <a class="back-button" href="shop.php#products">Вернуться в каталог</a>
            
            <div class="thumbs fixinfo" id="thumbs">
                <?php
            $sql1 = "SELECT name FROM images WHERE idProduct=".$id;
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
            // output data of each row
                    $i=0;

           while($row1 = $result1->fetch_assoc()) {

                     echo '<a href="#image'.$i.'"><img src="images/product/'.$row["idProduct"].'/LQ/'.$row1["name"].'" alt=""></a>';
                     $i += 1;

           }} ?>
            </div>
            <?php
            $sql1 = "SELECT name FROM images WHERE idProduct=".$id;
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
            // output data of each row
                    $i=0;

           while($row1 = $result1->fetch_assoc()) {

                     echo '<img src="images/product/'.$row["idProduct"].'/HQ/'.$row1["name"].'" id="image'.$i.'" alt="">';
                     $i += 1;


              $conn->close();
           }} ?>
        </div>
        <div id="info" class="fixinfo">
            <h1>
                <?php echo $row["title"]; ?>
            </h1>
            <p class="price">
                <?php echo $row["price"]; ?> P</p>
            <h2>
                <?php echo $row["description"]; ?>
            </h2>
            <div class="line"></div>
            <div class="options">
                <div class="size noselect">
                    <p>Размер</p>
                    <ul class="sizes">
                        <li data-size="S">S</li>
                        <li data-size="M" class="outofstock">M</li>
                        <li data-size="L" class="">L</li>
                        <li data-size="XL">XL</li>
                    </ul>
                </div>
            
                <!--<div class="color">
                    <p>Colors</p>
                    <ul>
                        <li></li>
                        <li></li>
                        
                        
                    </ul>
                </div>-->
                <div class="quantity noselect">
                    <p class="number" data-number="-1">-</p>
                    <p id="number">1</p>
                    <p class="number" data-number="1">+</p>
                </div>
                <p class="send">Сообщить о поступлении</p>
            </div>
            <!--<br>-->
            <p class="tab active" data-move="0"> Описание</p>
            <p class="tab" data-move="-100%"> Детали</p>
            <div class="tabs" id="tabs">
                <div class="desc">
                    <p>From our original Hobes concept, we've stripped everything back, and built our new men's product from
                        the ground up.</p>
                </div>
                <div class="details">
                    <p>1From our original Hobes concept, we've stripped everything back, and built our new men's product from
                        the ground up.</p>
                </div>
            </div>
            <p class="add-to-cart-button" onclick="add_product(<?php echo $row["idProduct"]; ?>,getn(),1,getsize())">+</p>
        </div>
    </section>
    <section class="banner banner2 flex" id="product-banner">
        <div>
            <p>#kaets</p>
            <a href="" class="button-pink">follow us on intagram</a>
        </div>
    </section>
    <?php include("blocks/footer.php");  ?>
</body>

<script>
        if (screen.width < 450) {

    $('#images').slick({
        infinite: true,
         autoplay: true,
         autoplayspeed: 100,
       dots: true,
      //  centerMode: true,
//        variableWidth: true,
       slidesToShow: 1,
       slidesToScroll: 1,
       prevArrow: $('.arrowprev'),
       nextArrow: $('.arrownext'),
   });
        }
</script>

<script>

window.onscroll = function() {
    // console.log(window.innerHeight);
    // var scrolled = window.pageYOffset || document.getElementById("").scrollTop;
    var rect = document.getElementById("product-banner").getBoundingClientRect();
    var pos = rect.top - rect.height;
    if (pos < 0)
    {
            $("#info").removeClass("fixinfo");
            $("#thumbs").removeClass("fixinfo");
    }
    else {
            $("#info").addClass("fixinfo");
            $("#thumbs").addClass("fixinfo");
    }
    for (var index = 0; index < 4; index++) {
        var image = document.getElementById("image"+index).getBoundingClientRect();
    if ((image.top - window.innerHeight/3*2 + 115) < 0 ) {
            $("#product .thumbs a").removeClass("active");
            $("#product .thumbs a:nth-child("+(index+1)+")").toggleClass("active");
    console.log("N"+index + "   " +(image.top - window.innerHeight/2 + 115));

    }
    else {
            //   $("#product .thumbs a:nth-child("+index+")").removeClass("active");
        
    }
        
    }
   
//    if (scrolled > window.innerHeight) {
    // $("#nav").addClass("fix");
    // $("#nav").addClass("fade-in");
    // $("#nav-white").addClass("fix");
    // $("#nav-white").addClass("fade-in");
    // $("#nav").next().addClass("fixnext");
    // $("#nav-white").next().addClass("fixnext-white");

//   } else {
    // $("#nav").removeClass("fix");
    // $("#nav").removeClass("fade-in");
    // $("#nav-white").removeClass("fix");
    // $("#nav-white").removeClass("fade-in");
    // $("#nav").next().removeClass("fixnext");
    // $("#nav-white").next().removeClass("fixnext-white");
    
//   }
  
   
}

function getn()
{
    return parseInt(document.getElementById("number").innerHTML);
     
}
function getsize()
{
    return $(".sizes li.selected").attr("data-size");
     
}
$(document).ready(function () {

 $("#product .thumbs a").click(function () {
      $("#product .thumbs a").removeClass("active");
     
      $(this).addClass("active");

    });

 $(".number").click(function () {
        var n = parseInt(document.getElementById("number").innerHTML);
        n += parseInt($(this).attr("data-number"));
        
        if( n >= 0)
        {
        document.getElementById("number").innerHTML = n;
        }

    });

 $(".sizes li").click(function () {
        if(!$(this).hasClass("outofstock"))
        {
        $(".sizes li").removeClass("selected");
            $(this).addClass("selected");
        }


    });

 $(".tab").click(function () {
        // console.log();
        $(".tab").removeClass("active");
        $(this).addClass("active");
        
        $("#tabs div").css("transform","translatex("+$(this).attr("data-move")+")");
    });
})

</script>
</html>