<!-- Trouvez le numéro de semaine de la date suivante : 14/07/2019.  -->
<?php

$date=explode('-','2019-07-14');
echo date('W',mktime(0,0,0,$date[1],$date[2],$date[0]))."<br>";

?>


<!-- Combien reste-t-il de jours avant la fin de votre formation ? -->

<?php
$echeance = '2023/02/03'; // La date de référence, qui provient de où-tu-veux
echo 'Nombre de jours restants : ', floor((strtotime($echeance) - time())/86400)."<br>";
?>

<!-- Comment déterminer si une année est bissextile ?  -->

<?php
// L'année est bissextile
$tonannee = '2008';
if (date("L", mktime(0, 0, 0, 1, 1,$tonannee)) == 1)
{
    echo "L'année est bissextile";
}
// L'année n'est pas bissextile
else
{
    echo "L'année n'est pas bissextile";
}
?>

<!-- Montrez que la date du 32/17/2019 est erronée.  -->

<?php
  function isValid($date, $format = 'Y-m-d'){
    $dt = DateTime::createFromFormat($format, $date);
    return $dt && $dt->format($format) === $date;
  }
  
  if (isValid('2019-17-32') == false) {

    echo "<br>Votre date est erronée";
  }

  else
  {
    echo "<br>Votre date est valide";

  }
  ?>

<br>
<!-- Affichez l'heure courante sous cette forme : 11h25. -->

<?php
echo date('H:i')."<br>"; 

?>



<!-- Ajoutez 1 mois à la date courante.  -->

<?php

$mod = strtotime("+ 1 month");
echo date("d/m/Y",$mod)."<br>";

?>

<!-- Que s'est-il passé le 1000200000 ? -->
<?php


echo date("d/m/Y",1000200000);

?>
