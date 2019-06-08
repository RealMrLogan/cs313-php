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
<script>
   alert("Instructions: Select your spell and your opponent's spell");
</script>

<body>
   <header>
      <h1>Spell Selection</h1>
      <nav>
         <a href="../index.html">&larr; Home</a>
      </nav>
   </header>
   <hr>
   <main>
      <section class="options">
         <form action="storeGamePieces.php" method="post">
            <div>
               <fieldset>
                  <legend>Choose Your Spell</legend>
                  <input type="radio" name="player-weapon" value="No Spell" id="player--1">
                  <label for="player--1">No Spell</label>
                  
                  <?php
                  // Get the database connection file
                  require_once '../connections.php';
                  foreach ($db->query('SELECT * FROM spells') as $row) {
                     ?>
                     <input type="radio" name="player-spell" value="<?php echo $row['displayname']; ?>" id="player-<?php echo $row['id']; ?>">
                     <label for="player-<?php echo $row['id']; ?>"><?php echo $row['displayname']; ?></label>
                  <?php
               }
               ?>
               </fieldset>
               <fieldset>
                  <legend>Choose Your Opponent's Spell</legend>
                  <input type="radio" name="opponent-spell" value="No Spell" id="opponent--1">
                  <label for="opponent--1">No Spell</label>

                  <?php
                  foreach ($db->query('SELECT * FROM spells') as $row) {
                     ?>
                     <input type="radio" name="opponent-spell" value="<?php echo $row['displayname']; ?>" id="opponent-<?php echo $row['id']; ?>">
                     <label for="opponent-<?php echo $row['id']; ?>"><?php echo $row['displayname']; ?></label>
                  <?php
               }
               ?>
               </fieldset>
            </div>
            <input type="submit" value="Next">
         </form>
      </section>
   </main>
</body>

</html>