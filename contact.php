<?php

include 'server.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($connection, $_POST['name']);
   $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
   $contact_num = $_POST['contact_num'];
   $message = mysqli_real_escape_string($connection, $_POST['message']);

   $query1 = mysqli_query($connection, "SELECT * FROM `usermessage` WHERE name = '$name' AND user_email = '$user_email' AND contact_num = '$contact_num' AND message = '$message'") or die('query failed');

   if(mysqli_num_rows($query1) > 0){
      $msg[] = 'message sent already!';
   }else{
      mysqli_query($connection, "INSERT INTO `usermessage`(user_idno, name, user_email, contact_num, message) VALUES('$user_id', '$name', '$user_email', '$contact_num', '$message')") or die('query failed');
      $msg[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mayari | Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
     <!--integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="-->
    <!-- crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" type="text/css" href="styles.css" />
  </head>

  <body>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <section id="header"> 
      <!-- <a class="title" href="#" id="navbar__logo">MAYARI</a> -->
      <a href="index.php"
        ><img
          src="img/Logo.png"
          class="logo"
          alt="logo"
          id="logo"
          width="150"
          height="150"
      /></a>
      <div>
        <ul id="navbar">
          <li><a href="index.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="about.php">About</a></li>
          <li><a class="active" href="contact.php">Contact</a></li>
          <li><a href="orders.php">See Orders</a></li>
          <li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
          <li> 
    	        <a href="logout.php" style="color: white;"> Log out</a>
          </li>   
          <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
        </ul>
      </div>
      <div id="mobile">
        <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
        <i id="bar" class="fa-solid fa-outdent"></i>
      </div>
    </section>

  <section id="page-header" class="about-header">
    <h2>#talk_to_us</h2>
    <p>feedbacks - we need them!</p>
  </section>

  <section id="contact-details" class="section-p1">
    <div class="details">
      <span>CONNECT WITH US</span>
      <h2>Visit our head office for urgent concerns or contact us now!</h2>
      <h3>Head Office</h3>
      <div>
        <li>
          <i class="fa-solid fa-map-location"></i>
          <p>Building AT Swift St., Lirio Compound, Bilibiran, Binangonan, Rizal</p>
        </li>
        <li>
          <i class="fa-solid fa-envelope"></i>
          <p>mayari_semiformalbags@gmail.com</p>
        </li>
        <li>
          <i class="fa-solid fa-phone"></i>
          <p>827-938493</p>
        </li>
        <li>
          <i class="fa-solid fa-clock"></i>
          <p>Weekdays - 9:00 AM to 4:00 PM</p>
        </li>
      </div>
    </div>
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.705317304235!2d121.17647131415106!3d14.501598683384586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c1dc6f774897%3A0x3316ac335222becb!2sLirio%20Compound%2C%20Bilibiran%2C%20Binangonan%2C%20Rizal!5e0!3m2!1sen!2sph!4v1656986120736!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section>

  <section id="form-details">
    <form method="post" action="contact.php">
      <span>LEAVE A MESSAGE</span>
      <h2 class= "form_db" >We love to hear from you</h2>
      <input type="text" name="name" required placeholder="Your Name">
      <input type="text" name="user_email" required placeholder="Your Email">
      <input type="number" name="contact_num" required placeholder="Your Contact Number">
      <textarea name="message" placeholder="Your Concerns" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="Send" name="send" class="normal">

    </form>

    <div class="people">
      <div>
        <img src="img/contact/ria.jpg" alt="">
        <p><span>Ria Mabansag</span> Senior Marketing Manager 
          <br> Phone: +63 9615215608 
          <br> Email: ribenit11@gmail.com</p>
      </div>
      <div>
        <img src="img/contact/erica.jpg" alt="">
        <p><span>Erica Cavaneyro</span> Senior Marketing Manager 
          <br> Phone: +63 9634415378 
          <br> Email: cavaneyroerica@gmail.com</p>
      </div>
    </div>
  </section>

  <section id="newsletter" class="section-p1 section-m1"> <!--RIA-->
    <div class="newstext">
      <h4>Get Updates from our Newsletters!</h4>
      <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
    </div>
  </section>

<footer class="section-p1">
  <div class="col">
    <img class="logo" src="img/Logo.png" alt="" >
    <h4>Contact</h4>
    <p><strong>Gmail:</strong> mayari_semiformalbags@gmail.com</p>
    <p><strong>Phone:</strong> +63 9872678203</p>
    <div class="follow">
      <h4>Follow us</h4>
      <div class="icon">
        <a href="https://www.facebook.com/MayariOfEricaAndRia/" target="blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Ftwitter.com%2FMayari_EricaRia%3Ffbclid%3DIwAR1ozdf6tVnfFZ9o16wZPRlBE5ZMRBoY1yhuRWg2ATeKjz-Da7UtA-ukINY&h=AT3bVk0815YPk_Fmu1VejTqcyVoCJdc8ZmCHaUXaaYIKLag4NekOMRC5atYs8idfHiYSqTtqNotsf_nSkT5QriIbnXbtfjV6QT9KrkjRJkNPE2pVwuMPE0JBHbk8V5Jaqea3pw" target="blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/accounts/login/?next=/mayari_ericaria/" target="blank"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>

  <div class="col">
    <h4>About</h4>
    <a href="about.php">About us</a>
    <a href="contact.php">Contact us</a>
  </div>

  <div class="col">
    <h4>My Account</h4>
    <a href="cart.php">View Cart</a>
    <a href="orders.php">Track My Orders</a>
    <a href="contact.php">Help</a>
  </div>

  <div class="col install">
    <h4>Other Info</h4>
    <p>Secured Payment Gateways</p>
    <img src="img/icons/paymentmethod.png" alt="">
  </div>

  <div class="copyright">
    <p>2022 - Mayari, Online Shop for Semi-Formal Bags</p>
  </div>
</footer>
    
    <script src="app.js"></script>
  </body>
</html>
    