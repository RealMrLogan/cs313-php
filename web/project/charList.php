<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="styles.css">
   <title>Character List | Game</title>
</head>

<body>
   <header>
      <h1>Character List</h1>
   </header>
   <hr>
   <main>
      <section class="options">
         <a href='charDetails.php?person=test'>Test</a>
         <?php
         // Get the database connection file
         require_once 'connections.php';
         foreach ($db->query('SELECT * FROM character') as $row)
         {
            echo "<a href='charDetails.php&person=" . $row['person'] .">" . $row['person'] . "</a>";
         }
         ?>
      </section>
   </main>
   <script src="script.js"></script>
</body>

</html>