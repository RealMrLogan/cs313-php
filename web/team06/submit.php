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
      }
      ?>