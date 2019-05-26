<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../styles.css">
   <title>Add A Character | Game</title>
</head>

<body>
   <header>
      <h1>Adding a Character</h1>
      <nav>
         <a href="../index.html">&larr; Home</a>
      </nav>
   </header>
   <hr>
   <main>
      <section class="options">
         <?php
         // Get the database connection file
         require_once '../connections.php';
         foreach ($db->query('SELECT * FROM character') as $row)
         {
            ?>
            <form action="charDetails.php" method="get">
               <input type="submit" name="displayname" value="<?php echo $row['displayname']; ?>">
            </form>
            <?php
            // echo "<form action='charDetails.php' method='GET'><input type='submit' name='person' value='".$row['person']."'></form>";
         }
         ?>
      </section>
   </main>
</body>

</html>