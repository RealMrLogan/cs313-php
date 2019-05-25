<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Character List | Game</title>
</head>
<body>
   <main>
   <?php
   // Get the database connection file
   require_once 'connections.php';
   foreach ($db->query('SELECT * FROM character') as $row)
   {
      echo "<h2>" . $row['person'] . "</h2>";
   }
   ?>
   </main>
</body>
</html>