<?php

include 'server.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($connection, "DELETE FROM `usermessage` WHERE idno = '$delete_id'") or die('query failed');
   header('location:adcontacts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mayari | Admin - Messages</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="adstyles.css">

</head>
<body>
   
<?php include 'adheader.php'; ?>

<section class="messages">

   <div class="box-container">
   <?php
      $query1 = mysqli_query($connection, "SELECT * FROM `usermessage`") or die('query failed');
      if(mysqli_num_rows($query1) > 0){
         while($fetch_message = mysqli_fetch_assoc($query1)){
      
   ?>
   <div class="box">
      <p><strong>USER MESSAGES</strong></p>
      <p>User ID : <span><?php echo $fetch_message['user_idno']; ?></span> <br>
      Name : <span><?php echo $fetch_message['name']; ?></span> <br>
      Contact Number : <span><?php echo $fetch_message['contact_num']; ?></span> <br>
      Email : <span><?php echo $fetch_message['user_email']; ?></span><br>
      Message : <span><?php echo $fetch_message['message']; ?></span> <br>
      <a href="adcontacts.php?delete=<?php echo $fetch_message['idno']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete message</a>
   </div>
   <?php
      };
   }else{
      echo '<p class="empty">you have no messages!</p>';
   }
   ?>
   </div>

</section>



<script src="adscript.js"></script>

</body>
</html>