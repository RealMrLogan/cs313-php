<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../styles.css">
   <title>Item | Game</title>
</head>

<body>
   <header>
      <h1>Item Search</h1>
      <nav>
         <a href="../index.html">&larr; Home</a>
      </nav>
   </header>
   <hr>
   <main>
      <form action="itemSearch.php" method="post">
         <fieldset>
            <legend>Which category?</legend>
            <input type="radio" name="type" value="weapon"> <label>Weapon</label>
            <input type="radio" name="type" value="protection"> <label>Protection</label>
            <input type="radio" name="type" value="spell"> <label>Spell</label>
         </fieldset>
         <label for="">Which Item: </label><input type="text" name="search-query">
         <input type="submit" value="Search">
      </form>
      <hr>
      <?php
         // Get the database connection file
         require_once '../connections.php';
         $query = filter_input(INPUT_POST, 'search-query', FILTER_SANITIZE_STRING);
         $type = "";
         if (isset($_POST['type'])) {
            switch($_POST['type']) {
               case "weapon":
               $type = "weapons";
               break;
               case "protection":
               $type = "protection";
               break;
               case "spell":
               $type = "spells";
               break;
            }
         }

         $stmt = $db->prepare("SELECT * FROM $type WHERE displayname=:displayname");
         $stmt->bindValue(':displayname', $query, PDO::PARAM_STR);
         $stmt->execute();
         $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

         if (isset($rows)) {
            ?>
            <h2><?php echo count($rows); ?> Result(s)</h2>
            <ul>
            <?php
            foreach ($rows as $row)
            {
               ?>
               <li><?php echo $row['displayname']; ?></li>
               <?php
            }
            ?>
            </ul>
            <?php
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