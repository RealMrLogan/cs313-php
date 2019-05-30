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
            echo '<input type="checkbox" name="topic'.$row['topic_id'].'" value="topic'.$row['topic_id'].'">' . $row['name'];
         }
         ?>
         <input type="submit" value="Submit">
      </form>
      <?php
      // Get the database connection file
      require_once 'connections.php';
         var_dump($_POST);

      if (isset($_POST)) {
         $book = filter_input(INPUT_POST, 'book', FILTER_SANITIZE_STRING);
         $chapter = filter_input(INPUT_POST, 'chapter', FILTER_SANITIZE_STRING);
         $verse = filter_input(INPUT_POST, 'verse', FILTER_SANITIZE_STRING);
         $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
         
         $stmnt = $db->prepare('INSERT INTO scripture(book, chapter, verse, content) VALUES(:book, :chapter, :verse, :content)');
         $stmnt->bindValue(':book', $book, PDO::PARAM_STR);
         $stmnt->bindValue(':chapter', $chapter, PDO::PARAM_STR);
         $stmnt->bindValue(':verse', $verse, PDO::PARAM_STR);
         $stmnt->bindValue(':content', $content, PDO::PARAM_STR);
         $stmnt->execute();

         $newId = $db->lastInsertId('scripture_id');
         if (isset($_POST['topic1'])) {
            $topic1 = filter_input(INPUT_POST, 'topic1', FILTER_SANITIZE_STRING);
            $stmnt = $db->prepare('INSERT INTO scripture_topics(topic_id, scripture_id) VALUES(:topic_id, :scripture_id)');
            $stmnt->bindValue(':topic_id', $topic1, PDO::PARAM_STR);
            $stmnt->bindValue(':scripture_id', $newId, PDO::PARAM_STR);
            $stmnt->execute();
         }
         if (isset($_POST['topic2'])) {
            $topic2 = filter_input(INPUT_POST, 'topic2', FILTER_SANITIZE_STRING);
            $stmnt = $db->prepare('INSERT INTO scripture_topics(topic_id) VALUES(:topic_id)');
            $stmnt->bindValue(':topic_id', $topic2, PDO::PARAM_STR);
         }
         if (isset($_POST['topic3'])) {
            $topic3 = filter_input(INPUT_POST, 'topic3', FILTER_SANITIZE_STRING);
            $stmnt = $db->prepare('INSERT INTO scripture_topics(topic_id) VALUES(:topic_id)');
            $stmnt->bindValue(':topic_id', $topic3, PDO::PARAM_STR);
         }
      }
      ?>
   </main>
</body>
</html>