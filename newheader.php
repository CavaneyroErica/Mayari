<?php
if(isset($msg)){
   foreach($msg as $msg){
      echo '
      <div class="message">
         <span>'.$msg.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <div class="header-2">
      <div class="flex">
      <a href="index.php"
        ><img
          src="img/Logo.png"
          class="logo"
          alt="logo"
          id="logo"
          width="150"
          height="150"
      /></a>

         <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="shop.php">Shop</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="orders.php">See Orders</a>
            <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
            <a href="logout.php" style="color: white;"> Log out</a>
         </nav>

      </div>
   </div>

</header>