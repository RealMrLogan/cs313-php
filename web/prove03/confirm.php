<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../style.css">
   <link rel="stylesheet" href="prove03.css">
   <title>Confirmation | Shopping Cart</title>
</head>

<body>
   <header>Thank You</header>
   <?php include '../nav.php';?>
   <main>
      <h2>Thank you for your purchase</h2>
      <h3>These items:</h3>
      <?php
         if (isset($_SESSION)) {
            foreach($_SESSION['cart-item'] as $key=>$value) {
               echo "<p>$key</p> <br>";
            }
         }
      ?>
      <h3>will be shipped to:</h3>
      <?php
         echo "<p>" . filter_var($_POST['street'], FILTER_SANITIZE_STRING) . "</p><br>";
         echo "<p>" . filter_var($_POST['city'], FILTER_SANITIZE_STRING) . ", " . filter_var($_POST['state'], FILTER_SANITIZE_STRING) . " " . filter_var($_POST['zip'], FILTER_SANITIZE_STRING) . "</p>";
      ?>
   </main>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
   <script src="prove03.js"></script>
</body>

</html>