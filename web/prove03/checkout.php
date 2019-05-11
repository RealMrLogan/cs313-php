<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../style.css">
   <link rel="stylesheet" href="prove03.css">
   <title>Checkout | Shopping Cart</title>
</head>

<body>
   <header>Checkout</header>
   <?php include '../nav.php';?>
   <main>
      <div class="cart-trail">
         <a href="viewCart.php">&larr;Back to Cart</a>
      </div>
      <form action="confirm.php" method="post">
         <fieldset>
            <legend>Address</legend>
            <label for="street">Street:</label> <input name="street" type="text">
            <label for="city">City:</label> <input name="city" type="text">
            <label for="state">State:</label> <input name="state" type="text">
            <label for="zip">Zip Code:</label> <input name="zip" type="number">
         </fieldset>
         <fieldset>
            <legend>Items In Cart</legend>
            <?php
               if (isset($_SESSION['cart-item'])) {
                  echo "<h3>Total items: ". count($_SESSION['cart-item']). "</h3>";
                  foreach($_SESSION['cart-item'] as $item=>$price) {
                     echo "<label>$item - $$price</label><br>";
                  }
               } else {
                  echo "<h3>No items in cart</h3>";
               }
            ?>
         </fieldset>
         <button type="submit">Complete Purchase</button>
      </form>
   </main>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
   <script src="prove03.js"></script>
</body>

</html>