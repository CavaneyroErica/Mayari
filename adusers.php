<?php

include 'server.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `userinfo` WHERE idno = '$delete_id'") or die('query failed');
   header('location:adusers.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mayari | Admin - Users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="adstyles.css">

</head>
<body>
   
<?php include 'adheader.php'; ?>

<section class="users">

   <div class="box-container">
      <?php
         $query1 = mysqli_query($connection, "SELECT * FROM `userinfo`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($query1)){
      ?>
      <div class="box">
         <p><strong>USER INFO</strong></p>
         <p> User ID : <span><?php echo $fetch_users['idno']; ?></span> <br>
          Username : <span><?php echo $fetch_users['name']; ?></span> <br>
          Email : <span><?php echo $fetch_users['useremail']; ?></span><br>
          User Type : <span style="color:<?php if($fetch_users['type'] == 'admin'){ echo 'var(--black)'; } ?>"><?php echo $fetch_users['type']; ?></span> </p>
         <a href="adusers.php?delete=<?php echo $fetch_users['idno']; ?>" onclick="return confirm('delete this user?');" class="delete-btn">Delete</a>
      </div>
      <?php
         };
      ?>
   </div>

</section>









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>