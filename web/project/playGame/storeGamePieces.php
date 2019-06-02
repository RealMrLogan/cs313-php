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
   if (isset($_POST['player']) && isset($_POST['opponent'])) { // they selected their characters
      // Get the database connection file
      require_once '../connections.php';
      $player = $_POST["player"];
      console_log($player);
      $statement = $db->prepare("SELECT * FROM characters WHERE displayname = :player");
      $statement->bindValue(':player', $player);
      $statement->execute();
      // // Go through each result
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
         console_log($row);
         $_SESSION['player'] = $row;
      }

      // $opponent = $_POST["opponent"];
      // $statement = $db->prepare("SELECT * FROM characters WHERE displayname = $opponent");
      // $statement->execute();
      // // Go through each result
      // while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      //    $_SESSION['opponent'] = $row;
      // }
      // header("Location: weaponSelect.php");
   } else if (isset($_POST['player-weapon']) && isset($_POST['opponent-weapon'])) {
      $_SESSION['player-weapon'] = $_POST['player-weapon'];
      $_SESSION['opponent-weapon'] = $_POST['opponent-weapon'];
      header("Location: startGame.php");
   }
}
console_log($_SESSION);
