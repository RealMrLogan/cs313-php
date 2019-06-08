<?php
session_start();
function console_log($output, $with_script_tags = true)
{
   $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
   if ($with_script_tags) {
      $js_code = '<script>' . $js_code . '</script>';
   }
   echo $js_code;
}

// add the game pieces to the session
if (isset($_POST)) {
   // Get the database connection file
   require_once '../connections.php';

   if (isset($_POST['player']) && isset($_POST['opponent'])) { // they selected their characters
      $statement = $db->prepare("SELECT * FROM characters WHERE displayname = :player");
      $statement->bindValue(':player', $_POST["player"]);
      $statement->execute();
      // // Go through each result
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
         $_SESSION['player'] = $row;
      }

      $statement = $db->prepare("SELECT * FROM characters WHERE displayname = :opponent");
      $statement->bindValue(':opponent', $_POST["opponent"]);
      $statement->execute();
      // Go through each result
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
         $_SESSION['opponent'] = $row;
      }
      header("Location: weaponSelect.php");
      die();
   } else if (isset($_POST['player-weapon']) && isset($_POST['opponent-weapon'])) {
      $statement = $db->prepare("SELECT * FROM weapons WHERE displayname = :weapon");
      $statement->bindValue(':weapon', $_POST["player-weapon"]);
      $statement->execute();
      // // Go through each result
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
         $_SESSION['player']['weaponid'] = $row;
      }

      $statement = $db->prepare("SELECT * FROM weapons WHERE displayname = :weapon");
      $statement->bindValue(':weapon', $_POST["opponent-weapon"]);
      $statement->execute();
      // // Go through each result
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
         $_SESSION['opponent']['weaponid'] = $row;
      }
      header("Location: protectionSelect.php");
      die();
   } else if (isset($_POST['player-protection']) && isset($_POST['opponent-protection'])) {
      $statement = $db->prepare("SELECT * FROM protection WHERE displayname = :protection");
      $statement->bindValue(':protection', $_POST["player-protection"]);
      $statement->execute();
      // // Go through each result
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
         $_SESSION['player']['protectionid'] = $row;
      }

      $statement = $db->prepare("SELECT * FROM protection WHERE displayname = :protection");
      $statement->bindValue(':protection', $_POST["opponent-protection"]);
      $statement->execute();
      // // Go through each result
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
         $_SESSION['opponent']['protectionid'] = $row;
      }
      header("Location: spellSelect.php");
      die();
   } else if (isset($_POST['player-spell']) && isset($_POST['opponent-spell'])) {
      $statement = $db->prepare("SELECT * FROM spells WHERE displayname = :spell");
      $statement->bindValue(':spell', $_POST["player-spell"]);
      $statement->execute();
      // // Go through each result
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
         $_SESSION['player']['spellid'] = $row;
      }

      $statement = $db->prepare("SELECT * FROM spells WHERE displayname = :spell");
      $statement->bindValue(':spell', $_POST["opponent-spell"]);
      $statement->execute();
      // // Go through each result
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
         $_SESSION['opponent']['spellid'] = $row;
      }
      header("Location: startGame.php");
      die();
   }
}
console_log($_SESSION);
