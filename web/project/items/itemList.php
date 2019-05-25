<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../styles.css">
   <title>Item List | Game</title>
</head>

<body>
   <header>
      <h1>Item List</h1>
   </header>
   <hr>
   <main>
      <section class="options">
         <fieldset>
            <legend>Weapons</legend>
            <?php
            // Get the database connection file
            require_once '../connections.php';
            foreach ($db->query('SELECT * FROM weapon') as $row)
            {
               ?>
               <form action="itemDetails.php" method="get">
                  <input type="submit" name="weapon" value="<?php echo $row['displayname']; ?>">
               </form>
            <?php
            }
            ?>
         </fieldset>
         <fieldset>
            <legend>Protection</legend>
            <?php
            // Get the database connection file
            require_once '../connections.php';
            foreach ($db->query('SELECT * FROM protection') as $row)
            {
               ?>
               <form action="itemDetails.php" method="get">
                  <input type="submit" name="protection" value="<?php echo $row['displayname']; ?>">
               </form>
            <?php
            }
            ?>
         </fieldset>
         <fieldset>
            <legend>Spells</legend>
            <?php
            // Get the database connection file
            require_once '../connections.php';
            foreach ($db->query('SELECT * FROM spell') as $row)
            {
               ?>
               <form action="itemDetails.php" method="get">
                  <input type="submit" name="spell" value="<?php echo $row['displayname']; ?>">
               </form>
            <?php
            }
            ?>
         </fieldset>
      </section>
   </main>
</body>

</html>