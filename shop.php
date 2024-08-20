<?php

include 'server.php';

session_start();

$user_id = $_SESSION['user_id'];

$prod_img= isset( $_GET['prod_img'] ) ? $_GET['prod_img'] : '';
$prodname = isset( $_GET['prodname'] ) ? $_GET['prodname'] : '';
$prodprice = isset( $_GET['prodprice'] ) ? $_GET['prodprice'] : '';


if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $name = $_POST['name'];
   $price = $_POST['price'];
   $img = $_POST['img'];
   $qty = $_POST['qty'];

   $query1 = mysqli_query($connection, "SELECT * FROM `cartinfo` WHERE name = '$name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($query1 ) > 0){
      $msg[] = 'already added to cart!';
   }else{
      mysqli_query($connection, "INSERT INTO `cartinfo`(user_id, name, price, qty, img) VALUES('$user_id', '$name', '$price', '$qty', '$img')") or die('query failed');
      $msg[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mayari | Shop</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="newstyles.css">

</head>
<body>
   
<?php include 'newheader.php'; ?>

<div class="heading">
   <h3>What We Offer</h3>
</div>

<section class="products">

   <div class="box-container">

      <?php  
         $query2 = mysqli_query($connection, "SELECT * FROM `productinfo`") or die('query failed');
         if(mysqli_num_rows($query2) > 0){
            while($fetch_products = mysqli_fetch_assoc($query2)){
      ?> 
     <form action="" method="post" class="box">
      <img class="image" src="prod_images/<?php echo $fetch_products['prod_img']; ?>" alt="" width="260" height="500">
      <div class="name"><?php echo $fetch_products['prodname']; ?></div>
      <div class="desc"><?php echo $fetch_products['proddesc']; ?></div>
      <div class="price">₱<?php echo $fetch_products['prodprice']; ?></div>
      <input type="number" min="1" name="qty" value="1" class="qty">
      <input type="hidden" name="name" value="<?php echo $fetch_products['prodname']; ?>">
      <input type="hidden" name="price" value="<?php echo $fetch_products['prodprice']; ?>">
      <input type="hidden" name="img" value="<?php echo $fetch_products['prod_img']; ?>">
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>
   </a>

</section>


<script src="app.js"></script>

</body>
</html>