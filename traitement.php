<?php
include("db_connect.php");

$extention_autoriser = array("csv");
$extention = pathinfo( $_FILES['Fichiers']['name']);
$extention =$extention["extension"];

  
if(strlen( $_FILES [ 'Fichiers' ][ 'name' ]) < 5 ) {

     $importvide ;

      function verificationFormulaire( $importvide )
     {
       if ('noFiles'==( $importvide ));
       {
         throw new PDOException( "No file, cannot import" );
       }
       
       return  $importvide ;
     }
     
     try
     {
       echo verificationFormulaire("fichierVide" ), '<br />' ;
       
     }
     
     catch (PDOException  $e)
     {
         echo  "error:" , $e -> getMessage ();
     }
       
}

else if ($_FILES [ 'Fichiers' ][ 'error' ]> 0 ) {

       echo  "votre fichier contient une ou plusieurs erreurs" ;
       
} 

else if (!in_array( $extention , $extention_autoriser )) {
 
 
     $filesInvalidation ;

     function  verificationFormulaireInvalid ($filesInvalidation)
     {
       
       if ('fileInvalid'==($filesInvalidation));
       {
         throw new  PDOException ( "Invalid file, mandatory csv" );
       }
       
       return  $filesInvalidation ;
     }
     
     try
     {
       echo verificationFormulaireInvalid( 'fichierInvalid' ), '<br />' ;
       
     }
     
     catch(PDOException $e)
     {
         echo  "error: " , $e -> getMessage ();
     }
        
}

else
{

 echo  "file successfully sent!" . "<br>" ;
   
move_uploaded_file($_FILES[ 'Fichiers' ][ 'tmp_name' ],"fichier_recu". $extention );


$extention_autoriser = $the_big_array =[];

// Ouvre le fichier en lecture

if(($h = fopen ("C:\\fiches\\fichier_recu.csv","r" ))!== FALSE )
{
 // Chaque ligne du fichier est convertie en un tableau individuel que nous appelons $ data
 // Les éléments du tableau sont séparés par des virgules
 while (( $data=fgetcsv( $h , 1000 , "," ))!== FALSE )
 
 {
   // Chaque tableau individuel est poussé dans le tableau imbriqué
   $the_big_array []=$data ;
   
 }

 // Ferme le fichier
 fclose($h);
}

if (isset($_POST["traitement.php"])) {
  
  $fichier_recu= $_FILES["fichiers"]["tmp_name"];
  
  if ($_FILES["fichiers"]["size"] > 0) {
    
    $files = fopen("C:\\XAMPP2\htdocs\\fiches\\fichier_recu.csv", "r");
    
    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
      $sql = "INSERT into wp_postmeta (id,model,country,price)
           values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "')";
      $result = mysqli_query($conn, $sql);
      
      if (! empty($result)) {
        $type = "success";
        $message = "Les Données sont importées dans la base de données";
      } else {
        $type = "error";
        $message = "Problème lors de l'importation de données CSV";
      }
    }
  }
}

// Afficher le code dans un format lisible
echo  "<pre>" ;
var_dump($the_big_array );
echo  "</pre>" ;

}

?>
