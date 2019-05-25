<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../styles.css">
   <title>Character Search | Game</title>
</head>

<body>
   <header>
      <h1>Character Search</h1>
   </header>
   <hr>
   <main>
      <form action="charSearch.php" method="post">
         <label for="">Which character: </label><input type="text" name="search-query" id="">
         <input type="submit" value="Search">
      </form>
      <hr>
      <?php
         // Get the database connection file
         require_once '../connections.php';
         $query = filter_input(INPUT_POST, 'search-query', FILTER_SANITIZE_STRING);
         echo $query . "<br>";

         $stmt = $db->prepare('SELECT * FROM character WHERE displayname=:displayname');
         $stmt->bindValue(':displayname', $query, PDO::PARAM_STR);
         $stmt->execute();
         $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

         if (isset($rows)) {
            ?>
            <h2><?php echo count($rows); ?> Result(s)</h2>
            <?php
            foreach ($rows as $row)
            {
               ?>
               <label for=""><?php echo $row['displayname']; ?></label>
               <?php
            }
         } else {
            ?>
            <h2>No Results...</h2>
            <?php
         }
         ?>
      <section class="options">
         
      </section>
   </main>
</body>

</html>