<!DOCTYPE html>
<html>
<head>
<title> validation du bouton </title>
<meta charset="utf8"/>
<script src="import.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 <fieldset class="cadre1">
    <h1 class="title1">Welcome</h1>

      <h2 class="title2">Share your files CSV</h2>

      <input type="submit" value="start import" id="send" onclick=traitementFiles()></input>

</fieldset>

<dialog id="monFichier">

        <menu>

        <form action = "traitement.php" method = "POST" enctype = "multipart/form-data">
        <input type="file"  name ="Fichiers" accept =".csv"></input>
        <input type="submit" value="valider"></input>
        
        </form>

        </menu>
</dialog> 
<?php
      // Connect to database
      include("db_connect.php");
            $sql = "SELECT * FROM wp_postmeta";
            $result = mysqli_query($conn, $sql);
            ?>
</body>
</html>
