<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM artist");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO - Ajout</title>
</head>
<body>

    <h1>Ajouter un vinyle</h1>

    <br>
    <br>

    <form action ="script_disc_ajout.php" method="post">

        <label for="titre">Title :</label><br>
        <input type="text" name="letitre" placeholder="Enter title" id="title">
        <br><br>



        <label for="url_for_label">Artist :</label><br>
        <select name="lartiste" id="artiste">
        <option value="" selected>Select your artist</option> 
        <?php foreach ($tableau as $artist){
           
            echo "<option value='$artist->artist_id'>$artist->artist_name</option>"; 
        }
?>        
        </select>
      
        <br><br>

        <label for="year_for_label">Year :</label><br>
        <input type="text" name="yeardisc" placeholder="Year" id="year">
        <br><br>

        <label for="genre_du_label">Genre:</label><br>
        <input type="text" name="genredisc" placeholder="Enter genre" id="genre_for_label">
        <br><br>

        <label for="le_label">Label:</label><br>
        <input type="text" name="labeldisc" placeholder="Enter label (EMI, Warner, PolyGram, Univers Sale...)" id="label_for_label">
        <br><br>

        <label for="price_for_label">Price :</label><br>
        <input type="text" name="pricedisc" id="pricelabel">
        <br><br>

        <label for="picture_for_label">Picture:</label><br>
        <input type="file" name="picture" value="Ajouter" placeholder="Choisir un fichier">
        <br><br>

        
        <input type="submit" value="Ajouter">
        <a href="/atelier_crud/discs.php"><button type="button">Retour à la liste des artistes</button></a>
    </form>
</body>
</html>