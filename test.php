<?php

// connexion BDD
$pdo = new PDO('mysql:host=localhost;dbname=wp_kweltest', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$extention_autoriser = array("csv");
$extention = pathinfo( $_FILES ['userfiles']['name' ]);
$extention = $extention["extension"];

  
if(strlen( $_FILES [ 'userfiles' ][ 'name' ]) < 5 ) {

     $importvide ;

      function verificationFormulaire( $importvide )
     {
       if ('noFiles'==( $importvide ));
       {
         throw new PDOException( " Aucun fichier, importation impossible" );
       }
       
       return  $importvide ;
     }
     
     try
     {
       echo verificationFormulaire("fichierVide" ), '<br />' ;
       
     }
     
     catch (PDOException  $e)
     {
         echo  "message erreur:" , $e -> getMessage ();
     }
       
}

else if ($_FILES [ 'userfiles' ][ 'error' ]> 0 ) {

       echo  "votre fichier contient une ou plusieurs erreurs" ;
       
} 

else if (!in_array( $extention , $extention_autoriser )) {
 
 
     $filesInvalidation ;

     function  verificationFormulaireInvalid ($filesInvalidation)
     {
       
       if ('fileInvalid'==($filesInvalidation));
       {
         throw new  PDOException ( "fichier Invalide, csv obligatoire" );
       }
       
       return  $filesInvalidation ;
     }
     
     try
     {
       echo verificationFormulaireInvalid( 'fichierInvalid' ), '<br />' ;
       
     }
     
     catch(PDOException $e)
     {
         echo  "message erreur:" , $e -> getMessage ();
     }
        
}

else {
  echo  "fichier autorisé" . "<br>" ;
   
}

move_uploaded_file($_FILES[ 'userfiles' ][ 'tmp_name' ],"fichier_recu". $extention );


$extention_autoriser = $the_big_array =[];

// Ouvre le fichier en lecture


if(($h = fopen ("C:\\Users\\lutin\Desktop\\XAMPP2\htdocs\\fiches\\fichier_recu.csv","r" ))!== FALSE )
{
 // Chaque ligne du fichier est convertie en un tableau individuel que nous appelons $ data
 // Les éléments du tableau sont séparés par des virgules
 while (( $data = fgetcsv( $h , 1000 , "," ))!== FALSE )
 
 {
   // Chaque tableau individuel est poussé dans le tableau imbriqué
   $the_big_array []=$data ;		
 }

 // Ferme le fichier
 fclose( $h );
}

// Afficher le code dans un format lisible
echo  "<pre>" ;
var_dump($the_big_array );
echo  "</pre>" ;

?>