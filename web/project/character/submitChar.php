<?php
   // Get the database connection file
   require_once '../connections.php';
         
   if (isset($_POST)) {
      try {
         $name = filter_input(INPUT_POST, 'displayname', FILTER_SANITIZE_STRING);
         $hp = filter_input(INPUT_POST, 'hitpoints', FILTER_SANITIZE_STRING);
         $damage = filter_input(INPUT_POST, 'damage', FILTER_SANITIZE_STRING);
         $armor = filter_input(INPUT_POST, 'armor', FILTER_SANITIZE_STRING);
         $magic = filter_input(INPUT_POST, 'magic', FILTER_SANITIZE_STRING);
         $notDead = false;
         
         $stmnt = $db->prepare('INSERT INTO character(displayname, hitpoints, damage, armor, magic, isdead) 
                                 VALUES(:name, :hp, :damage, :armor, :magic, :notdead)');
         $stmnt->bindValue(':name', $name, PDO::PARAM_STR);
         $stmnt->bindValue(':hp', $hp, PDO::PARAM_STR);
         $stmnt->bindValue(':damage', $damage, PDO::PARAM_STR);
         $stmnt->bindValue(':armor', $armor, PDO::PARAM_STR);
         $stmnt->bindValue(':magic', $magic, PDO::PARAM_STR);
         $stmnt->bindValue(':notdead', $notDead, PDO::PARAM_STR);
         $stmnt->execute();

         echo "Created $name!"
      } catch (Exception $e) {
         echo 'Error when trying to add the character';
         echo 'Message: ' .$e->getMessage();
      }
   }
?>