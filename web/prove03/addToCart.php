<?php
session_start();
$action = $_POST["action"];
if(!empty($_POST["action"])) {
   switch($action) {
      case 'add':
         $name = $_POST["itemName"];
         $price = $_POST["price"];
         // $itemArray = array('name'=>$name, 'price'=>$price);
         if (isset($_SESSION['cart-item'])) {
            $_SESSION['cart-item'] += array($name=>$price);
         } else {
            $_SESSION['cart-item'] = array($name=>$price);
         }
      break;
      case 'remove':
         $name = $_POST["itemName"];
            unset($_SESSION['cart-item'][$name]);
         break;
      case 'empty':
         foreach ($_SESSION['cart-item'] as $key => $value) {
            unset($_SESSION['cart-item'][$key]);
         }
      break;
      case 'reset':
         session_destroy();
      break;
   }
}

print_r($_SESSION);
?>