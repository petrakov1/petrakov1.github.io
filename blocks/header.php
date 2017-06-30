
<section id="nav" class="<?php echo $class; ?> <?php echo $class2; ?>">
        <div class="flex">


        <ul>
          <li>
            <a href="index.php">о нас</a>
          </li>
          <li>
            <a href="blog.php">журнал</a>
          </li>
          <li>
            <a href="contacts.php">контакты</a>
          </li>
      
          </ul>
            <a href="index.php">
       <?php echo $class=="white" ? '<img src="css/images/logo-white.svg" alt="" class="logo">' : '<img src="css/images/logo-black.svg" alt="" class="logo">'; ?>
      </a>
   
        <ul class="mobile">
          <li>
            <a href="shop.php">Магазин</a>
          </li>
          <li class="mobile cart cart-button">
            <p id="cart-number">1</p>
        <?php echo $class=="white" ? '<img src="css/images/basket-white.png" alt="" class="basket-simple-line-icons" >' : '<img src="css/images/basket-simple-line-icons.png"
		 srcset="css/images/basket-simple-line-icons@2x.png 2x,
					 css/images/basket-simple-line-icons@3x.png 3x"
		 class="basket-simple-line-icons" alt="">'; ?>
          </li>
        </ul>
      </div>
    </section>

    
