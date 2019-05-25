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
            // $statement = $db->prepare("SELECT * FROM character WHERE person='$person'");
            // $statement.execute();
            // while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            //    echo "Got something!";
            //    echo $row['person'] . " " . $row['weaponname'];
            // }

            $stmt = $db->prepare('SELECT * FROM character WHERE person=:person');
            $stmt->bindValue(':person', $person, PDO::PARAM_STR);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (isset($rows)) {
               foreach ($rows as $row)
               {
                  echo "Got the person!";
                  print_r($rows);
               }
            }
         ?>
      </section>
   </main>
</body>
</html>