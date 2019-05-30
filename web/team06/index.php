<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>
   <main>
      <form action="index.php" method="post">
         Book: <input type="text" name="book">
         Chapter: <input type="number" name="chapter">
         Verse: <input type="number" name="verse">
         Content: <textarea name="content" id="" cols="30" rows="10"></textarea>
         <?php
         // Get the database connection file
         require_once 'connections.php';

         foreach ($db->query('SELECT * FROM topics') as $row)
         {
            echo '<input type="checkbox" name="$row["topic_id"]">' . $row['name'];
         }
         ?>
         <input type="submit" value="Submit">
      </form>
      <?php
      // Get the database connection file
      require_once 'connections.php';
         var_dump($_POST);
      if (isset($_POST)) {
         $book = $_POST["book"];
         $chapter = $_POST["chapter"];
         $verse = $_POST["verse"];
         $content = $_POST["content"];

         echo "Book: $book";
         echo "Chapter: $chapter";
         echo "Verse: $verse";
         echo "Content: $content";
         // $db->prepare('INSERT INTO scripture(book, chapter, verse, content) VALUES($_POST["book"], $_POST["chapter"], $_POST["verse"], $_POST["content"])');
         // $db->exec('INSERT INTO scripture(book, chapter, verse, content) VALUES($_POST["book"], $_POST["chapter"], $_POST["verse"], $_POST["content"])');
      }
      ?>
   </main>
</body>
</html>