<!-- Créer une fonction qui vérifie le niveau de complexité d'un mot de passe -->
 


<?php

$resultat = "TopSecret42";

function complex_password($resultat) {
    $r1='/[A-Z]/';  //Uppercase
    $r2='/[a-z]/';  //lowercase
    $r3='/[0-9]/';  //numbers
 
    if(preg_match_all($r1,$resultat, $o)<1) return FALSE;
 
    if(preg_match_all($r2,$resultat, $o)<1) return FALSE;
 
    if(preg_match_all($r3,$resultat, $o)<1) return FALSE;
 
    if(strlen($resultat)<8) return FALSE;
 
    return TRUE;
 }

 $variablefonction = complex_password($resultat);

 if ($variablefonction) {

    echo "Votre mot de passe a une solidité forte!";
 }
 else{
    echo "Votre mot de passe est faible!";
 }

?>