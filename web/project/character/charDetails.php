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
      <h1>character Details</h1>
   </header>
   <hr>
   <main>
      <section class="charDetails">
         <?php
            // Get the database connection file
            require_once '../connections.php';
            $person = $_GET["person"];
            echo "Person: " . $person . "<br>";

            $stmt = $db->prepare('SELECT * FROM character WHERE person=:person');
            $stmt->bindValue(':person', $person, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (isset($rows)) {
               foreach ($rows as $row)
               {
                  echo "Got the person!";
                  print_r($rows);
                  print_r($row);
                  ?>
                  <br>
                  <label for="person">Person: <?php $row['person'] ?></label>
                  <label for="hitpoints">Hit Points: <?php $row['hitpoints'] ?></label>
                  <label for="damage">Damage: <?php $row['damage'] ?></label>
                  <label for="armor">Armor: <?php $row['armor'] ?></label>
                  <label for="magic">Magic: <?php $row['magic'] ?></label>
                  <label for="weaponname">Weapon: <?php $row['weaponname'] ?></label>
                  <label for="protectionname">Protection: <?php $row['protectionname'] ?></label>
                  <label for="spellname">Spell: <?php $row['spellname'] ?></label>
                  <label for="buffname"> Buff: <?php $row['buffname'] ?></label>
                  <label for="isdead">Am I Dead?<?php $row['isdead'] ?></label>
                  <?php
               }
            }
         ?>
      </section>
   </main>
</body>
</html>