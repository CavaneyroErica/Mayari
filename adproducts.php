<?php

include 'server.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add'])){

   $prodname = mysqli_real_escape_string($connection, $_POST['prodname']);
   $prodprice = $_POST['prodprice'];
   $prodtype = mysqli_real_escape_string($connection, $_POST['prodtype']);
   $proddesc = mysqli_real_escape_string($connection, $_POST['proddesc']);
   $prod_img = $_FILES['prod_img']['name'];
   $img_size = $_FILES['prod_img']['size'];
   $img_tmp_name = $_FILES['prod_img']['tmp_name'];
   $img_folder = 'prod_images/'.$prod_img;

   $query1 = mysqli_query($connection, "SELECT prodname FROM `productinfo` WHERE prodname = '$prodname'") or die('query failed');

   if(mysqli_num_rows($query1) > 0){
      $msg[] = 'product name already added';
   }else{
      $query2 = mysqli_query($connection, "INSERT INTO `productinfo`(prodname, prodprice, prod_img, prodtype, proddesc) VALUES('$prodname', '$prodprice', '$prod_img', '$prodtype','$proddesc')") or die('query failed');

      if($query2){
         if($img_size > 20000000){
            $msg[] = 'image size is too large';
         }else{
            move_uploaded_file($img_tmp_name, $img_folder);
            $msg[] = 'product added successfully!';
         }
      }else{
         $msg[] = 'product could not be added!';
      }
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $query3 = mysqli_query($connection, "SELECT prod_img FROM `productinfo` WHERE idno = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($query3);
   unlink('prod_images/'.$fetch_delete_image['prod_img']);
   mysqli_query($connection, "DELETE FROM `productinfo` WHERE idno = '$delete_id'") or die('query failed');
   header('location:adproducts.php');
}

if(isset($_POST['update'])){

   $up_idno = $_POST['up_idno'];
   $up_prodname = $_POST['up_prodname'];
   $up_prodprice = $_POST['up_prodprice'];
   $up_prodtype = $_POST['up_prodtype'];
   $up_proddesc = $_POST['up_proddesc'];

   mysqli_query($connection, "UPDATE `productinfo` SET prodname = '$up_prodname', prodprice = '$up_prodprice' WHERE idno = '$up_idno'") or die('query failed');

   $upprod_img = $_FILES['upprod_img']['name'];
   $upprod_img_tmp_name = $_FILES['upprod_img']['tmp_name'];
   $upprod_img_size = $_FILES['upprod_img']['size'];
   $update_folder = 'prod_images/'.$upprod_img;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($upprod_img)){
      if($upprod_img_size > 2000000){
         $msg[] = 'image file size is too large';
      }else{
         mysqli_query($connection, "UPDATE `productinfo` SET prod_img = '$upprod_img' WHERE id = '$up_idno'") or die('query failed');
         move_uploaded_file($upprod_img_tmp_name, $update_folder);
         unlink('prod_images/'.$update_old_image);
      }
   }

   header('location:adproducts.php');

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Mayari | Admin - Products</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <link rel="stylesheet" href="adstyles.css">

</head>
<body>
   
<?php include 'adheader.php'; ?>


<section class="add-products">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>add product</h3>
      <input type="text" name="prodname" class="box" placeholder="Product Name" required>
      <input type="number" min="0" name="prodprice" class="box" placeholder="Product Price" required>
      <input type="type" name="prodtype" class="box" placeholder="Product Type" required>
      <input type="dscrp" name="proddesc" class="box" placeholder="Product Description" required>
      <input type="file" name="prod_img" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="add product" name="add" class="btn">
   </form>

</section>


<section class="show-products">

   <div class="box-container">

      <?php
         $query4 = mysqli_query($connection, "SELECT * FROM `productinfo`") or die('query failed');
         if(mysqli_num_rows($query4) > 0){
            while($fetch_products = mysqli_fetch_assoc($query4)){
      ?>
      <div class="box">
         <img src="prod_images/<?php echo $fetch_products['prod_img']; ?>" alt="" width="260" height="500">
         <div class="name"><?php echo $fetch_products['prodname']; ?></div>
         <div class="price">₱<?php echo $fetch_products['prodprice']; ?></div>
         <div class="type"><?php echo $fetch_products['prodtype']; ?></div>
         <div class="desc"><?php echo $fetch_products['proddesc']; ?></div>
         <a href="adproducts.php?update=<?php echo $fetch_products['idno']; ?>" class="option-btn">update</a>
         <a href="adproducts.php?delete=<?php echo $fetch_products['idno']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>

<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){
         $update_id = $_GET['update'];
         $query5 = mysqli_query($connection, "SELECT * FROM `productinfo` WHERE idno = '$update_id'") or die('query failed');
         if(mysqli_num_rows($query5) > 0){
            while($fetch_update = mysqli_fetch_assoc($query5)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="up_idno" value="<?php echo $fetch_update['idno']; ?>">
      <input type="hidden" name="update_old_image">
      <img src="prod_images/<?php echo $fetch_update['prod_img']; ?>" alt="" width="150" height="20">
      <input type="text" name="up_prodname" value="<?php echo $fetch_update['prodname']; ?>" class="box" required placeholder="enter product name">
      <input type="number" name="up_prodprice" value="<?php echo $fetch_update['prodprice']; ?>" min="0" class="box" required placeholder="enter product price">
      <input type="text" name="up_prodtype" value="<?php echo $fetch_update['prodtype']; ?>" class="box" required placeholder="enter product type">
      <input type="text" name="up_proddesc" value="<?php echo $fetch_update['proddesc']; ?>" class="box" required placeholder="enter product description">
      <input type="file" class="box" name="upprod_img" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update" class="btn">
      <input type="reset" value="cancel" id="close-update" class="option-btn">
   </form>
   <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>


<script src="adscript.js"></script>

</body>
</html>