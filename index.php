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
    <title>Mayari | Home</title>
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
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="about.php">About</a></li>
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


<section id="hero">

  <h4>Trade-in-offer</h4>
  <h2>Super value deals</h2>
  <h1>On all products</h1>
  <p>Save more with cuopons & up to 70% off!</p>
  <button>Shop Now</button>
  
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

<section id="product1" class="section-p1">
  <h2>Featured Products</h2>
  <p>Collection New Modern Design</p>
  <div class="pro-container">
    <div onclick="window.location.href='hanan.php';" class="pro">
      <img src="img/products/f1.jpg" >
      <div class="des">
        <span>HANAN</span>
        <h5>Clutch Bag | Square Bag</h5>
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <h4> P800.00</h4>
      </div>
      <div class="cart">
        <a href="cart.php"> <i class="fas fa-shopping-cart"></i> </a>
      </div>
    </div>
    
    <div onclick="window.location.href='tala.php';" class="pro">
      <img src="img/products/f2.jpg" >
      <div class="des">
        <span>TALA</span>
        <h5>Clutch Bag | Square Bag</h5>
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <h4> P700.00</h4>
      </div>
      <div class="cart">
        <a href="cart.php"> <i class="fas fa-shopping-cart"></i> </a>
      </div>
    </div>

    <div onclick="window.location.href='idiyanale.php';" class="pro">
      <img src="img/products/f3.png">
      <div class="des">
        <span>IDIYANALE</span>
        <h5>Tote Bag | Square Bag</h5>
        <div class="star">
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
          <i class="fa-solid fa-star"></i>
        </div>
        <h4> P900.00</h4>
      </div>
      <div class="cart">
        <a href="cart.php"> <i class="fas fa-shopping-cart"></i> </a>
      </div>
    </div>

   

</section>

<section id="banner" class="section-m1">
  <h4>Repair Services</h4>
  <h2>Upto <span>20% Off</span> - Restore your bags</h2>
  <div onclick="window.location.href='contact.php';"><button class="normal" > Contact us </button></div>
  
</section>

<section id="sm-banner" class="section-p1">
  <div class="banner-box">
    <h4>crazy deals</h4>
    <h2>buy 1 get 1 free</h2>
    <span>The best stylish bags are at Mayari</span>
    <button class="white">Classics</button>
  </div>
  <div class="banner-box banner-box2">
    <h4>the new trends</h4>
    <h2>local-made bags</h2>
    <span>The best stylish bags are at Mayari</span>
    <button class="white">Never out of style</button>
  </div>
  
</section>

<section id="banner3">
  <div class="banner-box">
    <h2>SEASON SALE</h2>
    <h3>Bags for All Occassions</h3>
  </div>
  <div class="banner-box banner-box2">
    <h2>STUDENT COLLECTION</h2>
    <h3>Style with Slings</h3>
  </div>
  <div class="banner-box banner-box3">
    <h2>TOTE BAGS</h2>
    <h3>Hot Trends</h3>
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



