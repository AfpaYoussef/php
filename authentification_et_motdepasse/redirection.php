
<?php
// Infos de redirection
$delai=10; // Délai en secondes
$url='/authentification_et_motdepasse/login_form.php'; // Adresse vers laquelle rediriger le visiteur
// Redirection dans x secondes
header('Refresh: '.$delai.';url='.$url);
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirection en HTML</title>
</head>
<body>

    <p>Félicitations! Nous sommes heureux de vous compter parmi nos membres.</p>
        
    <p>Vous allez être redirigé(e) vers la page de connexion du site dans quelques instants.</p>

    <p>Il y aura plein de lots à gagner: de l'argent, des voitures,... </p>

    <p>Vous visiterez notre site avec plein de rêves en tête.</p>

</body>
</html>