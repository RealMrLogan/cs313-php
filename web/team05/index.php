<!DOCTYPE html>
<html>

<head>
   <title>Scriptures</title>
</head>

<body>
   <?php

 // Get the database connection file
 require_once 'connections.php';
 
 //include '../../library/connections.php';
 

echo "<h1>Scripture Resources</h1>";

foreach ($db->query('SELECT * FROM Scriptures') as $row)
{
  echo '<b>' . $row['book'] . ' </b>' . $row['chapter'] . ':' . $row['verse'] . ' - "' . $row['content'] . '"<br><br>';
}

?>

   <form method="post" action="search.php">
      <label for="name">Search for book:</label>
      <input type="text" id="name" name="name"><br>
   </form>
</body>

</html>