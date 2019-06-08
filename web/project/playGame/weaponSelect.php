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
   alert("Instructions: Select your weapon and your opponent's weapon");
</script>

<body>
   <header>
      <h1>Weapon Selection</h1>
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
                  <legend>Choose Your Weapon</legend>
                  <input type="radio" name="player-weapon" value="Bare Handed" id="player--1">
                  <label for="player--1">Bare Handed</label>
                  
                  <?php
                  // Get the database connection file
                  require_once '../connections.php';
                  foreach ($db->query('SELECT * FROM weapons') as $row) {
                     ?>
                     <input type="radio" name="player-weapon" value="<?php echo $row['displayname']; ?>" id="player-<?php echo $row['id']; ?>">
                     <label for="player-<?php echo $row['id']; ?>"><?php echo $row['displayname']; ?></label>
                  <?php
               }
               ?>
               </fieldset>
               <fieldset>
                  <legend>Choose Your Opponent's Weapon</legend>
                  <input type="radio" name="opponent-weapon" value="Bare Handed" id="opponent--1">
                  <label for="opponent--1">Bare Handed</label>

                  <?php
                  foreach ($db->query('SELECT * FROM weapons') as $row) {
                     ?>
                     <input type="radio" name="opponent-weapon" value="<?php echo $row['displayname']; ?>" id="opponent-<?php echo $row['id']; ?>">
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