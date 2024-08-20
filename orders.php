<?php

include 'server.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['submit'])){

   $uemail = $_POST['user_email'];
   $prodrev= $_POST['prodreview'];

   mysqli_query($connection, "UPDATE `orderinfo` SET prodreview = '$prodrev' WHERE user_email = '$uemail'") or die('query failed');

   header('location:orders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mayari | See Orders</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="newstyles.css">

</head>
<body>
   
<?php include 'newheader.php'; ?>

<div class="heading">
   <h3>placed orders</h3>
</div>

<section class="placed-orders">

   <div class="box-container">

      <?php
         $query1 = mysqli_query($connection, "SELECT * FROM `orderinfo` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($query1) > 0){
            while($fetch_orders = mysqli_fetch_assoc($query1)){
      ?>
      <div class="box">
         <p> <strong> ORDER DETAILS FOR <?php echo $fetch_orders['placeorder']; ?> </strong></p>
         <p> Name : <span><?php echo $fetch_orders['name']; ?></span> <br>
          Contact Number : <span><?php echo $fetch_orders['number']; ?></span> <br>
          Valid Email Address : <span><?php echo $fetch_orders['user_email']; ?></span> <br>
          Updated Shipping Address : <span><?php echo $fetch_orders['address']; ?></span> <br>
          Payment Method : <span><?php echo $fetch_orders['paymethod']; ?></span> <br> <br>
          Orders : <span><?php echo $fetch_orders['total_products']; ?></span> <br>
          Total Price : <span>₱<?php echo $fetch_orders['total_price']; ?>/-</span> <br>
          Payment Status : <span style="color:<?php if($fetch_orders['paystatus'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['paystatus']; ?></span> </p>
      </div>
      <div class="box">
      <p> Write a product review for <?php echo $fetch_orders['total_products']; ?></p>
         <form method="post">
            <input type="text" name="user_email" placeholder="Email">
            <textarea name="prodreview" placeholder="Your Feedback Matters" id="" cols="10" rows="5"></textarea>
            <input type="submit" name="submit" value="Submit" class="button">
         </form>
      </div>
      <?php
       }
      }else{
         echo '<p class="empty">no orders placed yet!</p>';
      }
      ?>
   </div>

</section>


<script src="app.js"></script>

</body>
</html>