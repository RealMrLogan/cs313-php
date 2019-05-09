<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../style.css">
   <title>You submitted a form</title>
</head>

<body>
   <header>Submitted Form</header>
   <?php include '../nav.php';?>

   <main>
      <p>Name: <?php if (isset($_POST["name"])) {echo $_POST["name"];} ?></p>
      <p>Email Address: <?php if (isset($_POST["email"])) {
            $email = $_POST['email'];
            echo "<a href='mailto:$email'>$email</a>"; 
         } 
         ?></p>
      <p>Major: <?php if (isset($_POST["major"])) {echo $_POST["major"];} ?></p>
      <p>Visited Countries: <?php
         // create map of continents
         $contArray = array("na"=>"North America",
                              "sa"=>"South America",
                              "eu"=>"Europe",
                              "as"=>"Asia",
                              "au"=>"Australia",
                              "af"=>"Africa",
                              "an"=>"Antarctica");
         if (!empty($_POST["country"])) {
            echo '<br>';
            foreach ($_POST["country"] as $value) {
               foreach ($contArray as $key => $key_value) {
                  if ($value == $key) {
                     echo $key_value . "<br>";
                  }
               }
            }
         }
      ?></p>
      <p>Comments: <?php if (isset($_POST["comments"])) {echo $_POST["comments"];} ?></p>
   </main>
</body>

</html>