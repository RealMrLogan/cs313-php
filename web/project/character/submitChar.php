<?php
   // Get the database connection file
   require_once '../connections.php';
   var_dump($_POST);
         
   if (isset($_POST)) {
      $name = filter_input(INPUT_POST, 'displayname', FILTER_SANITIZE_STRING);
      $hp = filter_input(INPUT_POST, 'hitpoints', FILTER_SANITIZE_STRING);
      $damage = filter_input(INPUT_POST, 'damage', FILTER_SANITIZE_STRING);
      $armor = filter_input(INPUT_POST, 'armor', FILTER_SANITIZE_STRING);
      $magic = filter_input(INPUT_POST, 'magic', FILTER_SANITIZE_STRING);
      
      $stmnt = $db->prepare('INSERT INTO character(displayname, hitpoints, damage, armor, magic, isdead) 
                              VALUES(:name, :hp, :damage, :armor, :magic, :f)');
      $stmnt->bindValue(':name', $name, PDO::PARAM_STR);
      $stmnt->bindValue(':hp', $hp, PDO::PARAM_STR);
      $stmnt->bindValue(':damage', $damage, PDO::PARAM_STR);
      $stmnt->bindValue(':armor', $armor, PDO::PARAM_STR);
      $stmnt->bindValue(':magic', $magic, PDO::PARAM_STR);
      $stmnt->bindValue(':magic', 'f', PDO::PARAM_STR);
      $stmnt->execute();
   }
?>