<?php

include 'server.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mayari | Admin - Home</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="adstyles.css">

</head>
<body>
   
<?php include 'adheader.php'; ?>

<!-- admin dashboard section starts  -->

<section class="adminhome">

   <h1 class="title">Welcome Admin!</h1>

   <div class="box-container">

      <div class="box">
         <?php
            $total_pendings = 0;
            $qry1 = mysqli_query($connection, "SELECT total_price FROM `orderinfo` WHERE paystatus = 'pending'") or die('query failed');
            if(mysqli_num_rows($qry1) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($qry1)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         <h3>₱<?php echo $total_pendings; ?>/-</h3>
         <p>total pendings</p>
      </div>

      <div class="box">
         <?php
            $total_completed = 0;
            $qry2 = mysqli_query($connection, "SELECT total_price FROM `orderinfo` WHERE paystatus = 'completed'") or die('query failed');
            if(mysqli_num_rows($qry2) > 0){
               while($fetch_completed = mysqli_fetch_assoc($qry2)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
         <h3>₱<?php echo $total_completed; ?>/-</h3>
         <p>completed payments</p>
      </div>

      <div class="box">
         <?php 
            $qry3 = mysqli_query($connection, "SELECT * FROM `orderinfo`") or die('query failed');
            $number_of_orders = mysqli_num_rows($qry3);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <p>order placed</p>
      </div>

      <div class="box">
         <?php 
            $qry4 = mysqli_query($connection, "SELECT * FROM `productinfo`") or die('query failed');
            $number_of_products = mysqli_num_rows($qry4);
         ?>
         <h3><?php echo $number_of_products; ?></h3>
         <p>products added</p>
      </div>

      <div class="box">
         <?php 
            $qry5 = mysqli_query($connection, "SELECT * FROM `userinfo` WHERE type = 'user'") or die('query failed');
            $number_of_users = mysqli_num_rows($qry5);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <p>normal users</p>
      </div>

      <div class="box">
         <?php 
            $qry6= mysqli_query($connection, "SELECT * FROM `userinfo` WHERE type = 'admin'") or die('query failed');
            $number_of_admins = mysqli_num_rows($qry6);
         ?>
         <h3><?php echo $number_of_admins; ?></h3>
         <p>admin users</p>
      </div>

      <div class="box">
         <?php 
            $qry7 = mysqli_query($connection, "SELECT * FROM `userinfo`") or die('query failed');
            $number_of_account = mysqli_num_rows($qry7);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <p>total accounts</p>
      </div>

      <div class="box">
         <?php 
            $qry8 = mysqli_query($connection, "SELECT * FROM `usermessage`") or die('query failed');
            $number_of_messages = mysqli_num_rows($qry8);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <p>new messages</p>
      </div>

   </div>

</section>

<!-- admin dashboard section ends -->









<!-- custom admin js file link  -->
<script src="adscript.js"></script>

</body>
</html>