<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM disc");
    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // var_dump($tableau);
    // on clôt la requête en BDD
    $requete->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Liste</title>
</head>
<body>
    <table>
    <caption>Liste des disques</caption>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Année</th>
            <th>Disque</th>
            <th>Label</th>
            <th>Genre</th>
            <th>Prix</th>
            <th>Artist ID</th>
            <!-- Ici, on ajoute une colonne pour insérer un lien -->
            <th></th>
        </tr>

        <?php foreach ($tableau as $disc): ?>

        <?php //var_dump($artist); // Le var_dump() est écrit à titre informatif ?>
        <tr>
            <td><?= $disc->disc_id ?></td>
            <td><?= $disc->disc_title ?></td>
            <td><?= $disc->disc_year ?></td>
            <td><img src='<?= $disc->disc_picture ?>'></td>
            <td><?= $disc->disc_label ?></td>
            <td><?= $disc->disc_genre ?></td>
            <td><?= $disc->disc_price ?></td>
            <td><?= $disc->artist_id ?></td>
            
            <!-- Ici, on ajoute un lien par artiste pour accéder à sa fiche : -->
            <td><a href="artist_detail.php?id=<?= $disc->disc_id ?>">Détails</a></td>
        </tr>

        <?php endforeach; ?>

    </table>
</body>
</html>