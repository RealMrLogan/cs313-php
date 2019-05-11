<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../style.css">
   <link rel="stylesheet" href="prove03.css">
   <title>Cart | Shopping Cart</title>
</head>

<body>
   <header>Viewing Cart</header>
   <?php include '../nav.php';?>
   <main>
      <div class="cart-trail">
         <a href="browse.php">&larr;Back to Browse</a>
         <?php 
         if (isset($_SESSION['cart-item'])) {
            echo '<a href="checkout.php">Continue to Checkout&rarr;</a>';
         }
         ?>
      </div>
      <h2>Cart</h2>
      <table>
         <thead>
            <tr>
               <th>Item Name</th>
               <th>Price</th>
               <th>Edit</th>
            </tr>
         </thead>
         <tbody>
            <?php
            if (isset($_SESSION['cart-item'])) {
               foreach($_SESSION['cart-item'] as $item=>$price) {
                  echo "<tr class='remove-item'>
                           <td>$item</td>
                           <td>$".number_format((float)$price, 2, '.', '')."</td>
                           <td><a onclick='addToCart(`remove`, `$item`)'>Remove Item</a></td>
                        </tr>";
               }
            }
            ?>
         </tbody>
      </table>
      
      <button onclick="addToCart('empty')">Empty Shopping Cart</button>
   </main>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
   <script src="prove03.js"></script>
</body>

</html>