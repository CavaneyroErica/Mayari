<?php include('server.php');

session_start();

if(isset($_POST['login_user'])){

   $useremail = mysqli_real_escape_string($connection, $_POST['useremail']);
   $password = mysqli_real_escape_string($connection, md5($_POST['password']));

   $query1 = mysqli_query($connection, "SELECT * FROM `userinfo` WHERE useremail = '$useremail' AND password = '$password'") or die('query failed');

   if(mysqli_num_rows($query1) > 0){

      $row = mysqli_fetch_assoc($query1);

      if($row['type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['useremail'];
         $_SESSION['admin_id'] = $row['idno'];
         header('location:adpage.php');

      }elseif($row['type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['useremail'];
         $_SESSION['user_id'] = $row['idno'];
         header('location:index.php');

      }

   }else{
      $msg[] = 'incorrect email or password!';
   }

}




?>
<!DOCTYPE html>
<html>
<head>
  <title>Mayari | Log In</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


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

  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	
  	<div class="input-group">
  		<label>Email</label>
  		<input type="text" name="useremail" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>