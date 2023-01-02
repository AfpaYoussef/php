<!-- Utilisez la fonction file() pour récupérer le contenu de ce fichier. -->

<!-- Découpez chaque ligne en utilisant une des fonctions suivantes: explode() ou preg_split() -->

<!-- Affichez le résultat dans un tableau HTML (avec Bootstrap si possible) en prenant bien soin de nommer les colonnes du tableau. -->



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>
</head>
<body>

<body bgcolor=darkgoldenrod>
<br><br><br><br>

<table align=center border=1>
<tr align=center>
  <td bgcolor=sandybrown> 
    <b>Surname</b>
  </td>
  <td bgcolor=gold> 
     <b>Firstname</b> 
  </td>
  <td bgcolor=gold> 
     <b>Email</b> 
  </td>
  <td bgcolor=gold> 
     <b>Phone</b> 
  </td>
  <td bgcolor=gold> 
     <b>City</b> 
  </td>
  <td bgcolor=gold> 
     <b>State</b> 
  </td>
</tr>

<?php
     $l=file("http://bienvu.net/misc/customers.csv");

     while(!feof($fp)){
        //On va générer l'affichage sous forme de tableau
        $ligne = fgets($fp,1000); // On lit les 1000 caractères de la ligne
        $liste = explode(';',$ligne); // On met dans un tableau toutes les données, séparées par des points virgules
        $nbcol = count($liste); // Compter combien de colonne on a
        for($i = 0; $i < $nbcol;$i++){
            foreach($liste as $element){
            //pour chaque valeur les mettre dans le tableau
                for($numero = 0; $numero < $nbcol; $numero++){
                    $preTab.$numero[$numero] = $element;
                }
            }
        }
    }
    echo '<table style="width:auto;">';
    echo '<thead><tr>';
    for($i = 0 ; $i < $nbcol ; $i++){
        if($i > $nbcol){
            break;
        }
        echo '<th>
      
        <td>Surname</td>
        <td>Firstname</td>
        <td>Email</td>
        <td>Phone</td>
        <td>City</td>
        <td>State</td>
    
        </th>';
    }
    echo "</tr></thead>";
    echo "<tbody>";
            echo "<tr>";


    
    foreach ($l as $information)
    {
      echo "<tr align=center>";
      echo "<td bgcolor=gold>$information </td>";
      echo "</tr>";
    }
    
?>

</body>