<?php
// Get the database connection file
require_once '../connections.php';

if (isset($_POST)) {
   try {
      switch ($_POST['type']) {
         case "weapon":
            $name = filter_input(INPUT_POST, 'displayname', FILTER_SANITIZE_STRING);
            // TODO: check for duplicate name
            $damage = filter_input(INPUT_POST, 'damage', FILTER_SANITIZE_STRING);
            $range = filter_input(INPUT_POST, 'range', FILTER_SANITIZE_STRING);
            $dur = filter_input(INPUT_POST, 'durability', FILTER_SANITIZE_STRING);

            $stmnt = $db->prepare('INSERT INTO weapons(displayname, damage, range, durability) 
                                       VALUES(:name, :damage, :range, :durability)');
            $stmnt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmnt->bindValue(':damage', $damage, PDO::PARAM_STR);
            $stmnt->bindValue(':range', $range, PDO::PARAM_STR);
            $stmnt->bindValue(':durability', $dur, PDO::PARAM_STR);
            $stmnt->execute();
            break;
         case "protection":
            $name = filter_input(INPUT_POST, 'displayname', FILTER_SANITIZE_STRING);
            // TODO: check for duplicate name
            $armor = filter_input(INPUT_POST, 'armor', FILTER_SANITIZE_STRING);
            $dur = filter_input(INPUT_POST, 'durability', FILTER_SANITIZE_STRING);

            $stmnt = $db->prepare('INSERT INTO protection(displayname, armor, durability) 
                                       VALUES(:name, :armor, :durability)');
            $stmnt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmnt->bindValue(':armor', $armor, PDO::PARAM_STR);
            $stmnt->bindValue(':durability', $dur, PDO::PARAM_STR);
            $stmnt->execute();
            break;
         case "spell":
            $name = filter_input(INPUT_POST, 'displayname', FILTER_SANITIZE_STRING);
            // TODO: check for duplicate name
            $damage = filter_input(INPUT_POST, 'damage', FILTER_SANITIZE_STRING);
            $range = filter_input(INPUT_POST, 'range', FILTER_SANITIZE_STRING);
            $cost = filter_input(INPUT_POST, 'cost', FILTER_SANITIZE_STRING);
            $cooldown = filter_input(INPUT_POST, 'cooldown', FILTER_SANITIZE_STRING);

            $stmnt = $db->prepare('INSERT INTO spells(displayname, damage, range, cost, cooldown) 
                                       VALUES(:name, :damage, :range, :cost, :cooldown)');
            $stmnt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmnt->bindValue(':damage', $damage, PDO::PARAM_STR);
            $stmnt->bindValue(':range', $range, PDO::PARAM_STR);
            $stmnt->bindValue(':cost', $cost, PDO::PARAM_STR);
            $stmnt->bindValue(':cooldown', $cooldown, PDO::PARAM_STR);
            $stmnt->execute();
            break;
      }


      echo "Created $name!";
      header("Location: itemList.php");
   } catch (Exception $e) {
      echo 'Error when trying to add the item';
      echo 'Message: ' . $e->getMessage();
   }
}
