<?php

include 'server.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['update_order'])){

   $order_update_id = $_POST['order_id'];
   $update_payment = $_POST['update_payment'];
   mysqli_query($connection, "UPDATE `orderinfo` SET paystatus = '$update_payment' WHERE idno = '$order_update_id'") or die('query failed');
   $msg[] = 'payment status has been updated!';

}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($connection, "DELETE FROM `orderinfo` WHERE idno = '$delete_id'") or die('query failed');
   header('location:adorders.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mayari | Admin - Orders</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="adstyles.css">

</head>
<body>
   
<?php include 'adheader.php'; ?>

<section class="orders">

   <div class="box-container">
      <?php
      $query1 = mysqli_query($connection, "SELECT * FROM `orderinfo`") or die('query failed');
      if(mysqli_num_rows($query1) > 0){
         while($fetch_orders = mysqli_fetch_assoc($query1)){
      ?>
      <div class="box">
         <p><strong>ORDER DETAILS ON <?php echo $fetch_orders['placeorder']; ?></strong></p>
         <p> User ID : <span><?php echo $fetch_orders['user_id']; ?></span> <br>
          Name : <span><?php echo $fetch_orders['name']; ?></span>  <br> <br>

          <p><strong>Contact Details</strong></p>
          <p>Contact Number : <span><?php echo $fetch_orders['number']; ?></span>  <br>
          Email : <span><?php echo $fetch_orders['user_email']; ?></span> <br>
          Shipping Address : <span><?php echo $fetch_orders['address']; ?></span> <br> <br>

          <p><strong>Product Details</strong></p>
          <p>Ordered Products : <span><?php echo $fetch_orders['total_products']; ?></span> <br>
          Total Price : <span>₱<?php echo $fetch_orders['total_price']; ?>/-</span> <br>
          Payment Method : <span><?php echo $fetch_orders['paymethod']; ?></span> <br>
          Product Review : <span><?php echo $fetch_orders['prodreview']; ?></span> </p>

         <form action="" method="post">
            <input type="hidden" name="order_id" value="<?php echo $fetch_orders['idno']; ?>">
            <select name="update_payment">
               <option value="" selected disabled><?php echo $fetch_orders['paystatus']; ?></option>
               <option value="pending">pending</option>
               <option value="completed">completed</option>
            </select>
            <input type="submit" value="update" name="update_order" class="option-btn">
            <a href="adorders.php?delete=<?php echo $fetch_orders['idno']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
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

<script src="adscript.js"></script>

</body>
</html>