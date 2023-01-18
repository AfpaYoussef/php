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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>PDO - Ajout</title>
</head>
<body>

    <h1  align = "center">Ajouter un vinyle</h1><br>

    <div align = "center">
    <form action ="script_disc_ajout.php" method="post">

        <label for="titre"><h4>Title :</h4></label>
        <input type="text" name="letitre" placeholder="Enter title" id="title">
        <br><br>



        <label for="url_for_label"><h4>Artist :</h4></label>
        <select name="lartiste" id="artiste">
        <option value="" selected>Select your artist</option> 
        <?php foreach ($tableau as $artist){
           
            echo "<option value='$artist->artist_id'>$artist->artist_name</option>"; 
        }
?>        
        </select>
      
        <br><br>

        <label for="year_for_label"><h4>Year :</h4></label>
        <input type="text" name="yeardisc" placeholder="Year" id="year">
        <br><br>

        <label for="genre_du_label"><h4>Genre:</h4></label>
        <input type="text" name="genredisc" placeholder="Enter genre" id="genre_for_label">
        <br><br>

        <label for="le_label"><h4>Label:</h4></label>
        <input type="text" name="labeldisc" placeholder="Enter label (EMI, Warner, PolyGram, Univers Sale...)" id="label_for_label">
        <br><br>

        <label for="price_for_label"><h4>Price :</h4></label>
        <input type="text" name="pricedisc" id="pricelabel">
        <br><br>

        <label for="picture_for_label"><h4>Picture:</h4></label>
        <input type="file" name="picture" value="Ajouter" placeholder="Choisir un fichier" class="btn btn-secondary">
        <br><br>

        
        <input type="submit" value="Ajouter"  class="btn btn-primary">
        <a href="/atelier_crud/discs.php"  class="btn btn-success" >Retour à la liste des artistes</a>
    </form>
    </div>
</body>
</html>