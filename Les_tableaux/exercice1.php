<html>
<body bgcolor=darkgoldenrod>
<br><br><br><br>

<table align=center border=1>
<tr align=center>
  <td bgcolor=sandybrown> 
    <b>Mois</b>
  </td>
  <td bgcolor=gold> 
     <b>Nombre de jours</b> 
  </td>
</tr>


<?php 
$nombredejours = array(
    "Janvier" => 31, 
    "Février" => 28, 
    "Mars" => 31, 
    "Avril" => 30, 
    "Mai" => 31, 
    "Juin" => 30,
    "Juillet" => 31,
    "Août" => 31,
    "Septembre" => 30,
    "Octobre" => 31,
    "Novembre" => 30,
    "Décembre" => 31,
    ); 
    asort($nombredejours);

foreach ($nombredejours as $mois => $jours)
{
  echo "<tr align=center>";
  echo "<td bgcolor=sandybrown>$mois </td>";
  echo "<td bgcolor=gold> $jours </td>";
  echo "</tr>";
}


?>
</table> 
</body>
</html>





