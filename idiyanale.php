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
    <title>Mayari | Featured - Idiyanale</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css
    "
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
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

    <section id="prodetails" class="section-p1">
      <div class="single-pro-image">
        <img src="img/products/f3.png" width="100%" id="MainImg" alt="Idiyanale" />

        <div class="small-img-group">
          
          <div class="small-img-col">
        

            <img
              src="img/products/f3.png"
              class="small-img"
              width="100%"
         
            />
          </div>
          <div class="small-img-col">
            <img
              src="img/products/f3.1.1.png"
              class="small-img"
              width="100%"
              alt="gold hanan"
            />
          </div>
          <div class="small-img-col">
            <img
              src="img/products/f3.1.2.png"
              class="small-img"
              width="100%"
              alt="gold hanan"
            />
          </div>
          <div class="small-img-col">
            <img
              src="img/products/f3.1.3.png"
              class="small-img"
              width="100%"
              alt="gold hanan"
            />
          </div>
          <div class="small-img-col">
            <img
              src="img/products/f3.1.4.png"
              class="small-img"
              width="100%"
              alt="gold hanan"
            />
          </div>
          <div class="small-img-col">
            <img
              src="img/products/f3.2.1.png"
              class="small-img"
              width="100%"
              alt="gold hanan"
            />
          </div>
          <div class="small-img-col">
            <img
              src="img/products/f3.2.2.png"
              class="small-img"
              width="100%"
              alt="gold hanan"
            />
          </div>
          <div class="small-img-col">
            <img
              src="img/products/f3.2.3.png"
              class="small-img"
              width="100%"
              alt="gold hanan"
            />
          </div>
          <div class="small-img-col">
            <img
              src="img/products/f3.2.4.png"
              class="small-img"
              width="100%"
              alt="gold hanan"
            />
          </div>
          
        </div>

       

        
      </div>

      <div class="single-pro-details">
        <h6>Tote Bag | Square Bag</h6>
        <h4>IDIYANALE</h4>
        <h2>P900.00</h2>
        <div onclick="window.location.href='shop.php';"><button class="normal" > Get this here </button></div>
        <h4>Product Details</h4>
        <span>Show off this IDYANALE Elegant Minimalist Quilted Tote Bag With Coin Purse, skillfully crafted by local artisans.</span>
        <table class="style" >
        
          <tr>
            <th class="Color">COLOR(S):</th>
            <td style="background-color: black; color: white;"> Black </td>
            <td style="background-color: rgb(219, 174, 113); color: white;"> Khaki</td>
            
          </tr>
          <tr>
            <th>STRAP TYPE:</th>
            <td >Double Handle </td>
          </tr>
          <tr>
            <th>MATERIAL:</th>
            <td >Oxford </td>
          </tr>
          <tr>
            <th>COMPOSITION:</th>
            <td >50% Cotton, 50% Polyester </td>
          </tr>
        </table>
         <table class="Size">
          <tr> 
            <th>Unit</th>
            <th>Bag Height</th>
            <th>Bag Length</th>
            <th>Bag Width</th>
            <th>Handle Height</th>
          </tr>
          <tr>
            <td>CM</td>
            <td>27 cm</td>
            <td>34 cm</td>
            <td>12 cm</td>
            <td>30 cm</td>
          </tr>
          <tr>
            <td>IN</td>
            <td>10.6 in</td>
            <td>13.4 in</td>
            <td>4.7 in</td>
            <td>11.8 in</td>
          </tr>
        </table>
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

    <script>
      var MainImg=document.getElementById("MainImg");
      var smallimg=document.getElementsByClassName("small-img");
    

      smallimg[0].onclick = function(){
        MainImg.src = smallimg[0].src;
      }
      smallimg[1].onclick = function(){
        MainImg.src = smallimg[1].src;
      }
      smallimg[2].onclick = function(){
        MainImg.src = smallimg[2].src;
      }

      smallimg[3].onclick = function(){
        MainImg.src = smallimg[3].src;
      }
      smallimg[4].onclick = function(){
        MainImg.src = smallimg[4].src;
      }
      smallimg[5].onclick = function(){
        MainImg.src = smallimg[5].src;
      }

      smallimg[6].onclick = function(){
        MainImg.src = smallimg[6].src;
      }
      smallimg[7].onclick = function(){
        MainImg.src = smallimg[7].src;
      }
      smallimg[8].onclick = function(){
        MainImg.src = smallimg[8].src;
      }
      
    </script>

    <script src="app.js"></script>
  </body>
</html>
