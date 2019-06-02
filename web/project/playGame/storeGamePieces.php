<?php
session_start();
function console_log($output, $with_script_tags = true) {
   $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
   if ($with_script_tags) {
       $js_code = '<script>' . $js_code . '</script>';
   }
   echo $js_code;
}

// add the game pieces to the session
if(isset($_POST)) {
   if(isset($_POST['player']) && isset($_POST['opponent'])) { // they selected their characters
      $_SESSION['player'] = $_POST['player'];
      $_SESSION['opponent'] = $_POST['opponent'];
      header("Location: itemList.php");
   } else if (isset($_POST['player-weapon']) && isset($_POST['opponent-weapon'])) {
      
   }
}
?>