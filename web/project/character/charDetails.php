<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../styles.css">
   <title>Details | Game</title>
</head>
<body>   
   <header>
      <h1>Character Details</h1>
      <nav>
         <a href="../index.html">&larr; Home</a>
         <a href="charList.php">&mdash; Character List</a>
      </nav>
   </header>
   <hr>
   <main>
      <section class="charDetails">
         <?php
            // Get the database connection file
            require_once '../connections.php';
            $person = $_GET["displayname"];

            $stmt = $db->prepare('SELECT * FROM character WHERE displayname=:displayname');
            $stmt->bindValue(':displayname', $person, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (isset($rows)) {
               foreach ($rows as $row)
               {
                  // echo "Got the person!";
                  // print_r($row);
                  ?>
                  <br> <br>
                  <label for="person">Person: <?php echo $row['displayname']; ?></label> <br>
                  <label for="hitpoints">Hit Points: <?php echo $row['hitpoints']; ?></label> <br>
                  <label for="damage">Damage: <?php echo $row['damage']; ?></label> <br>
                  <label for="armor">Armor: <?php echo $row['armor']; ?></label> <br>
                  <label for="magic">Magic: <?php echo $row['magic']; ?></label> <br>
                  <label for="weaponname">Weapon: <?php echo $row['weaponname']; ?></label> <br>
                  <label for="protectionname">Protection: <?php echo $row['protectionname']; ?></label> <br>
                  <label for="spellname">Spell: <?php echo $row['spellname']; ?></label> <br>
                  <label for="buffname"> Buff: <?php echo $row['buffname']; ?></label> <br>
                  <label for="isdead">Am I Dead?<?php echo $row['isdead']; ?></label>
                  <?php
               }
            }
         ?>
      </section>
   </main>
</body>
</html>