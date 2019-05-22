<?php
   var_dump($_POST);
   $name = $_POST["name"];
   echo "Name: " . $name;

   foreach ($db->query('SELECT * FROM scriptures WHERE name=:book') as $row)
   {
      echo "Got a book!";
      echo '<b>' . $row['book'] . ' </b>' . $row['chapter'] . ':' . $row['verse'] . ' - "' . $row['content'] . '"<br><br>';
   }
?>