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
            $person = $_POST["person"];
            echo "Person: " . $person;
            echo "First attempt";
            foreach ($db->query("SELECT * FROM character WHERE person=$person") as $row) {
               printf($row);
            }
            echo "Second attempt";
            $stmt = $db->prepare('SELECT * FROM character WHERE person=:person');
            $stmt->bindValue(':person', $person, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (isset($rows)) {
               foreach ($rows as $row)
               {
                  echo "Got the person!";
                  prinf($row);
               }
            }
         ?>
      </section>
   </main>
</body>
</html>