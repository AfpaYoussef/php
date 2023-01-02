<!-- Utilisez la fonction file() pour récupérer le contenu de ce fichier. -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>
</head>
<body>

<?php
    $l=file(lien.text);
    echo $l[0];
?>

</body>