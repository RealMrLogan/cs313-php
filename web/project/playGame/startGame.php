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
         <button onclick="playerAttack()">Attack</button>
      </section>
   </main>

   <section class="stats-section">
      <div class="character-stats">
         <h3 id="player-name"></h3>
         <div>
            <h4>Hitpoints: </h4><label class="stat-label" id="player-hp"></label>
         </div>
         <div>
            <h4 class="tab">Base Damage: </h4><label class="stat-label" id="player-damage"></label>
         </div>
         <div>
            <h4 class="tab">Base Armor: </h4><label class="stat-label" id="player-armor"></label>
         </div>
         <div>
            <h4>Equipped Weapon: </h4><label class="stat-label" id="player-weapon"></label>
         </div>
         <div>
            <h4 class="tab">Damage: </h4><label class="stat-label" id="player-weapon-damage"></label>
         </div>
         <div>
            <h4>Equipped Protection: </h4><label class="stat-label" id="player-protection"></label>
         </div>
         <div>
            <h4 class="tab">Armor: </h4><label class="stat-label" id="player-protection-armor"></label>
         </div>
      </div>
      <div class="character-stats">
         <h3 id="opponent-name"></h3>
         <div>
            <h4>Hitpoints: </h4><label class="stat-label" id="opponent-hp"></label>
         </div>
         <div>
            <h4 class="tab">Base Damage: </h4><label class="stat-label" id="opponent-damage"></label>
         </div>
         <div>
            <h4 class="tab">Base Armor: </h4><label class="stat-label" id="opponent-armor"></label>
         </div>
         <div>
            <h4>Equipped Weapon: </h4><label class="stat-label" id="opponent-weapon"></label>
         </div>
         <div>
            <h4 class="tab">Damage: </h4><label class="stat-label" id="opponent-weapon-damage"></label>
         </div>
         <div>
            <h4>Equipped Protection: </h4><label class="stat-label" id="opponent-protection"></label>
         </div>
         <div>
            <h4 class="tab">Armor: </h4><label class="stat-label" id="opponent-protection-armor"></label>
         </div>
      </div>
   </section>
   <script src="startGame.js"></script>
</body>

</html>