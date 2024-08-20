<?php

include 'server.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($connection, $_POST['name']);
   $number = $_POST['number'];
   $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
   $paymethod = mysqli_real_escape_string($connection, $_POST['paymethod']);
   $address = mysqli_real_escape_string($connection, '. '. $_POST['addline'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['zipcode']);
   $placeorder = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $query1 = mysqli_query($connection, "SELECT * FROM `cartinfo` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($query1) > 0){
      while($cart_item = mysqli_fetch_assoc($query1)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['qty'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['qty']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $query2= mysqli_query($connection, "SELECT * FROM `orderinfo` WHERE name = '$name' AND number = '$number' AND user_email = '$user_email' AND paymethod = '$paymethod' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $msg[] = 'your cart is empty';
   }else{
      if(mysqli_num_rows($query2) > 0){
         $msg[] = 'order already placed!'; 
      }else{
         mysqli_query($connection, "INSERT INTO `orderinfo`(user_id, name, number, user_email, paymethod, address, total_products, total_price, placeorder) VALUES('$user_id', '$name', '$number', '$user_email', '$paymethod', '$address', '$total_products', '$cart_total', '$placeorder')") or die('query failed');
         $msg[] = 'order placed successfully!';
         mysqli_query($connection, "DELETE FROM `cartinfo` WHERE user_id = '$user_id'") or die('query failed');
      }
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mayari | Checkout</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="newstyles.css">

</head>
<body>
   
<?php include 'newheader.php'; ?>

<div class="heading">
   <h3>Checkout</h3>
</div>

<section class="display-order">

   <?php  
      $grand_total = 0;
      $query3 = mysqli_query($connection, "SELECT * FROM `cartinfo` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($query3) > 0){
         while($fetch_cart = mysqli_fetch_assoc($query3)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['qty']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '₱'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['qty']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">your cart is empty</p>';
   }
   ?>
   <div class="grand-total"> Total : <span>₱<?php echo $grand_total; ?>/-</span> </div>

</section>

<section class="checkout">

   <form action="" method="post">
      <div class="flex">
         <div class="inputBox">
            <span>Name :</span>
            <input type="text" name="name" >
         </div>
         <div class="inputBox">
            <span>Contact Number :</span>
            <input type="number" name="number" >
         </div>
         <div class="inputBox">
            <span>Valid Email Address :</span>
            <input type="email" name="user_email" >
         </div>
         <div class="inputBox">
            <span>Payment Method :</span>
            <select name="paymethod">
               <option value="cash on delivery">cash on delivery</option>
               <option value="credit card">gcash</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address Line :</span>
            <input type="text" min="0" name="addline" required >
         </div>
         <div class="inputBox">
            <span>Street :</span>
            <input type="text" name="street" required >
         </div>
         <div class="inputBox">
            <span>City :</span>
            <input type="text" name="city" required >
         </div>
         <div class="inputBox">
            <span>State :</span>
            <input type="text" name="state" required >
         </div>
         <div class="inputBox">
            <span>Country :</span>
            <input type="text" name="country" required >
         </div>
         <div class="inputBox">
            <span>ZIP Code :</span>
            <input type="number" min="0" name="zipcode" required >
         </div>
      </div>
      <input type="submit" value="Place Order" class="btn" name="order_btn">
   </form>

</section>



<script src="add.js"></script>

</body>
</html>