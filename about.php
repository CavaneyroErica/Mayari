<?php 

  include 'server.php';

  session_start(); 

  $user_id = $_SESSION['user_id'];

  if(!isset($user_id)){
    header('location:login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mayari | About</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
  </head>

  <body>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

 <section id="header"> 
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
          <li><a class="active" href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
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
    <h2>#KnowUs</h2>
    <p>what these two were thinking setting up an online bag shop</p>
  </section>

  <section id="about-head" class="section-p1">
    <img src="img/about/a1.jpg" alt="">
    <div>
      <h2>Who We Are?</h2>
      <p>Erica and Ria shared the similar affection for any sort of bags.
        Bags are usually our constant companion- the most functional and hard-working accessory in our closet.
        Given the same style, and the same young-entrepreneur mindset, the two ventured an online shop,
        showcasing semi-formal bags. And this is with a purpose. The bags showcased are all made from local materials
        such as abaca, straw, polyester, cotton, local leather etc. Some are directly from and made by local artisans,
        with its ethic prints and styles.
        <br><br>
        Mayari, our brand name, came from the Philippine mythology's goddess of the moon.
        With this artistic touch, the developers/entrepreneurs sought national identity
        by incorporating the names not just on the brand, but also on the products. 
      </p>

      <br><br>
      <marquee bgcolor="#fa9964" loop="-1" scrollamount="5" width="100%">Shop awesome locally-made bags to help our beloved artisans!
      </marquee>
    </div>
  </section>

  <section id="feature" class="section-p1">
    <div class="fe-box">
        <img src="img/feature/f1.png" alt="Free Shipping">
        <h6>Free Shipping</h6>
      </div>
    
      <div class="fe-box">
        <img src="img/feature/f2.png" alt="Online Order">
        <h6>Online Order</h6>
      </div>
    
      <div class="fe-box">
        <img src="img/feature/f3.png" alt="Save Money & Worth it">
        <h6>Save Money & Worth it</h6>
      </div>
    
      <div class="fe-box">
        <img src="img/feature/f4-1.png" alt="Promotions">
        <h6>Promotions</h6>
      </div>
    
      <div class="fe-box">
        <img src="img/feature/F5.png" alt="Happy Selling">
        <h6>Happy Shop & Sell</h6>
      </div>
    
      <div class="fe-box">
        <img src="img/feature/F6.png" alt="24/7">
        <h6>24/7 Support</h6>
      </div>
    
    
    </section>

  <section id="newsletter" class="section-p1 section-m1"> 
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
    