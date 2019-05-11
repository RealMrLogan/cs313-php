<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../style.css">
   <link rel="stylesheet" href="prove03.css">
   <title>Browse | Shopping Cart</title>
</head>

<body>
   <header>Browse</header>
   <?php include '../nav.php';?>
   <main>
      <div class="cart-trail">
         <a href=""></a>
         <a href="viewCart.php">Go to Cart&rarr;</a>
      </div>
      <h2>Items</h2>
      <section class="browse-items">
         <section>
            <div class="item">
               <img src="item-images/avocado.png" alt="Avocado">
               <div>
                  <p>Avocado - $.50</p>
                  <?php
                  if (isset($_SESSION['cart-item']) && array_key_exists("Avocado", $_SESSION['cart-item'])) {
                     echo "<p class='added'>Already Added</p>";
                  } else {
                     echo "<button onclick='addToCart(`add`, `Avocado`, .50)' class='add-to-cart'>Add To Cart</button>";
                  }
                  ?>
               </div>
            </div>
            <div class="item">
               <img src="item-images/banana.png" alt="Avocado">
               <div>
                  <p>Banana - $.25</p>
                  <?php
                  if (isset($_SESSION['cart-item']) && array_key_exists("Banana", $_SESSION['cart-item'])) {
                     echo "<p class='added'>Already Added</p>";
                  } else {
                     echo "<button onclick='addToCart(`add`, `Banana`, .25)' class='add-to-cart'>Add To Cart</button>";
                  }
                  ?>
               </div>
            </div>
            <div class="item">
               <img src="item-images/orange.png" alt="Oranges">
               <div>
                  <p>Orange - $.75</p>
                  <?php
                  if (isset($_SESSION['cart-item']) && array_key_exists("Orange", $_SESSION['cart-item'])) {
                     echo "<p class='added'>Already Added</p>";
                  } else {
                     echo "<button onclick='addToCart(`add`, `Orange`, .75)' class='add-to-cart'>Add To Cart</button>";
                  }
                  ?>
               </div>
            </div>
            <div class="item">
               <img src="item-images/grape.png" alt="Grapes">
               <div>
                  <p>Grape - $1.00</p>
                  <?php
                  if (isset($_SESSION['cart-item']) && array_key_exists("Grape", $_SESSION['cart-item'])) {
                     echo "<p class='added'>Already Added</p>";
                  } else {
                     echo "<button onclick='addToCart(`add`, `Grape`, 1.00)' class='add-to-cart'>Add To Cart</button>";
                  }
                  ?>
               </div>
            </div>
         </section>
         <section>
            <div class="item">
               <img src="item-images/apple.png" alt="Apple">
               <div>
                  <p>Apple - $.30</p>
                  <?php
                  if (isset($_SESSION['cart-item']) && array_key_exists("Apple", $_SESSION['cart-item'])) {
                     echo "<p class='added'>Already Added</p>";
                  } else {
                     echo "<button onclick='addToCart(`add`, `Apple`, .30)' class='add-to-cart'>Add To Cart</button>";
                  }
                  ?>
               </div>
            </div>
            <div class="item">
               <img src="item-images/kiwi.png" alt="Kiwi">
               <div>
                  <p>Kiwi - $.25</p>
                  <?php
                  if (isset($_SESSION['cart-item']) && array_key_exists("Kiwi", $_SESSION['cart-item'])) {
                     echo "<p class='added'>Already Added</p>";
                  } else {
                     echo "<button onclick='addToCart(`add`, `Kiwi`, .25)' class='add-to-cart'>Add To Cart</button>";
                  }
                  ?>
               </div>
            </div>
            <div class="item">
               <img src="item-images/dragon-fruit.png" alt="Dragon Fruit">
               <div>
                  <p>Dragon Fruit - $1.50</p>
                  <?php
                  if (isset($_SESSION['cart-item']) && array_key_exists("Dragon Fruit", $_SESSION['cart-item'])) {
                     echo "<p class='added'>Already Added</p>";
                  } else {
                     echo "<button onclick='addToCart(`add`, `Dragon Fruit`, 1.50)' class='add-to-cart'>Add To Cart</button>";
                  }
                  ?>
               </div>
            </div>
            <div class="item">
               <img src="item-images/strawberry.png" alt="Strawberry">
               <div>
                  <p>Strawberry - $1.00</p>
                  <?php
                  if (isset($_SESSION['cart-item']) && array_key_exists("Strawberry", $_SESSION['cart-item'])) {
                     echo "<p class='added'>Already Added</p>";
                  } else {
                     echo "<button onclick='addToCart(`add`, `Strawberry`, 1.00)' class='add-to-cart'>Add To Cart</button>";
                  }
                  ?>
               </div>
            </div>
         </section>
      </section>
   </main>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
   <script src="prove03.js"></script>
</body>

</html>