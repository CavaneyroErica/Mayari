<?php 

include('server.php');

if(isset($_POST['reg_user'])){

	$name = mysqli_real_escape_string($connection , $_POST['name']);
	$useremail = mysqli_real_escape_string($connection , $_POST['useremail']);
	$pass1 = mysqli_real_escape_string($connection , md5($_POST['password1']));
	$pass2 = mysqli_real_escape_string($connection , md5($_POST['password2']));


	$query1 = mysqli_query($connection, "SELECT * FROM `userinfo` WHERE useremail = '$useremail' AND password = '$pass1'") or die('query failed');

	if(mysqli_num_rows($query1) > 0){
		 $msg[] = 'account already exist!';
	}else{
		 if($pass1 != $pass2){
				$msg[] = 'password unmatched!';
		 }else{
				mysqli_query($connection, "INSERT INTO `userinfo`(name, useremail, password) VALUES('$name', '$useremail', '$pass2')") or die('query failed');
				$msg[] = 'registered successfully!';
				header('location:login.php');
		 }
	}

}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Mayari | Sign Up</title>
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
  	<h2>Sign up</h2>
  </div>
	
  <form method="post" action="">
  	
		<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name" >
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="useremail">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password2">
  	</div>
	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already have an account? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>