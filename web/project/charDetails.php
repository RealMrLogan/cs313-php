<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="styles.css">
   <title>Details | Game</title>
</head>
<body>   
   <header>
      <h1>Character List</h1>
   </header>
   <hr>
   <main>
      <section class="charDetails">
         <?php
            // Get the database connection file
            require_once 'connections.php';
            $person = $_GET["person"];
            echo "Person: " . $person;

            foreach ($db->query("SELECT * FROM character WHERE person=$person") as $row)
            {
               echo "Got the person!";
               echo $row;
            }
         ?>
      </section>
   </main>
</body>
</html>