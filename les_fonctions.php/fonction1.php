
<!-- Ecrivez une fonction qui permette de générer un lien. -->

<?php


function lien($l,$t)  {
    echo "<a href='$l'>$t</a>";
}


lien("https://www.reddit.com/", "Reddit Hug");
?>