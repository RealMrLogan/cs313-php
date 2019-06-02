<?php
session_start();

function sendToJS($output)
{
   $js_code = json_encode($output, JSON_HEX_TAG);
   echo '<script>const sessionObj=' . $js_code . ';</script>';
}

sendToJS($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../styles.css">
   <link rel="stylesheet" href="style.css">
   <title>Game</title>
</head>

<body>
   <header>
      <h1>Welcome to the Arena!</h1>
      <nav>
         <a href="../index.html">&larr; Home</a>
      </nav>
   </header>
   <hr>
   <main>
      <p id="coin-flip">Fipping Coin to see who goes first...
         <img src="../images/coinflip.gif" alt="Coin Flip">
      </p>
      <section class="options" id="player-options">
         <button onclick="">Attack</button>
      </section>
   </main>
   <script src="startGame.js"></script>
</body>

</html>