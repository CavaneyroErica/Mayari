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

   <div class="flex">

      <a href="adpage.php"
        ><img
          src="img/Logo.png"
          width="150"
          height="150"
      /></a>

      <nav class="navbar">
         <a href="adpage.php">Home</a>
         <a href="adproducts.php">Products</a>
         <a href="adorders.php">Orders</a>
         <a href="adusers.php">Users</a>
         <a href="adcontacts.php">Messages</a>
         <a href="logout.php">Logout</a>
      </nav>

   </div>

</header>