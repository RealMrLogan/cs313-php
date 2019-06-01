<?php session_start() ?>
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
   alert("Instructions: Select your character and select an opposing character");
</script>

<body>
   <header>
      <h1>Character Selection</h1>
      <nav>
         <a href="index.html">&larr; Home</a>
      </nav>
   </header>
   <hr>
   <main>
      <section class="options">
         <fieldset>
            <legend>Choose Your Character</legend>
            <!-- <input type="radio" name="player" value="test" id="player-test">
            <label for="player-test">Test</label>
            <input type="radio" name="player" value="test" id="player-test2">
            <label for="player-test2">Test</label> -->
            <?php
            // Get the database connection file
            require_once '../connections.php';
            foreach ($db->query('SELECT * FROM characters') as $row) {
               ?>
               <input type="radio" name="player" value="<?php echo $row['displayname']; ?>" id="player-<?php echo $row['id']; ?>">
               <label for="player-<?php echo $row['id']; ?>"><?php echo $row['displayname']; ?></label>
            <?php
         }
         ?>
         </fieldset>
         <fieldset>
            <legend>Choose Your Opponent</legend>
            <!-- <input type="radio" name="opponent" value="test" id="opponent-test">
            <label for="opponent-test">Test</label>
            <input type="radio" name="opponent" value="test" id="opponent-test2">
            <label for="opponent-test2">Test</label> -->
            <?php
            // Get the database connection file
            require_once '../connections.php';
            foreach ($db->query('SELECT * FROM characters') as $row) {
               ?>
               <input type="radio" name="opponent" value="<?php echo $row['displayname']; ?>" id="opponent-<?php echo $row['id']; ?>">
               <label for="opponent-<?php echo $row['id']; ?>"><?php echo $row['displayname']; ?></label>
            <?php
         }
         ?>
         </fieldset>
      </section>
   </main>
</body>

</html>