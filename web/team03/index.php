<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="../style.css">
   <link rel="stylesheet" href="style.css">
   <title>Team 03</title>
</head>

<body>
   <header>Team Activity 03</header>
   <?php include '../nav.php';?>
   <hr>
   <main>
      <form action="submit-form.php" method="post" class="flex-column">
         <fieldset>
            <legend>Name</legend>
            <input type="text" name="name" class="half-width">
         </fieldset>
         <fieldset>
            <legend>Email</legend>
            <input type="text" name="email" class="half-width">
         </fieldset>
         <fieldset class="flex-column">
            <legend>Major</legend>
            <?php
               // create an array
               $majorArray = array("Computer Science", "Web Design and Development", "Computer Information Technology", "Computer Engineering");
               // display the options
               for ($i=0; $i < count($majorArray); $i++) { 
                  echo "<div>
                  <input type='radio' name='major' value='$majorArray[$i]'>
                  <label for='major'>$majorArray[$i]</label>
               </div>";
               }
            ?>
         </fieldset>
         <fieldset>
            <legend>Visted Countries</legend>
            <div>
               <input type="checkbox" name='country[]' value="na">
               <label for="country">North America</label>
            </div>
            <div>
               <input type="checkbox" name='country[]' value="sa">
               <label for="country">South America</label>
            </div>
            <div>
               <input type="checkbox" name='country[]' value="eu">
               <label for="country">Europe</label>
            </div>
            <div>
               <input type="checkbox" name='country[]' value="as">
               <label for="country">Asia</label>
            </div>
            <div>
               <input type="checkbox" name='country[]' value="au">
               <label for="country">Australia</label>
            </div>
            <div>
               <input type="checkbox" name='country[]' value="af">
               <label for="country">Africa</label>
            </div>
            <div>
               <input type="checkbox" name='country[]' value="an">
               <label for="country">Antarctica</label>
            </div>
         </fieldset>
         <fieldset>
            <legend>Comments</legend>
            <textarea name="comments" rows="10" class="full-width"></textarea>
         </fieldset>
         <button type="submit">Submit</button>
      </form>
   </main>
</body>

</html>