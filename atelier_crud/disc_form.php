<?php
require "db.php";
$db = connexionBase();
$requete = $db->prepare("SELECT * FROM disc WHERE disc_id=?");
$requete->execute(array($_GET["id"]));
$disc = $requete->fetch(PDO::FETCH_OBJ);
$requete->closeCursor();
$nouveau = $db->query("SELECT artist_id, artist_name FROM artist");
$nouveau1 = $nouveau -> fetchAll(PDO::FETCH_OBJ);
$nouveau -> closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier</title>
</head>
<body>
    <h1 align = "center">Modifier un vinyle</h1>

        <div align = "center">
    <form action ="script_disc_modif.php" method="post">

        <input type="hidden" name="id" value="<?= $disc->disc_id ?>">
        
        <label for="nom_for_title"><h10>Title:</h10></label>
        <input type="text" name="title" id="title_for_label" value="<?= $disc->disc_title ?>">
        <br><br>




        <label for="artist_for_label"><h10>Artist:</h10></label>
        <select name="lartiste" id="artist_for_label">
        <option value="" selected>Select your artist</option> 
        <?php foreach ($nouveau1 as $artist):?>

        <option value=<?= $artist->artist_id ?>><?= $artist->artist_name ?></option>; 
        
        <?php endforeach ;?> 
        </select>
        
        <br><br>

        <label for="year_for_label"><h10>Year:</h10></label>
        <input type="text" name="year" id="year0_for_label" value="<?= $disc->disc_year ?>">
        <br><br>

        <label for="genre_for_label"><h10>Genre:</h10></label>
        <input type="text" name="genre" id="genre1_for_label" value="<?= $disc->disc_genre ?>">
        <br><br>

        <label for="label_for_label"><h10>Label:</h10></label>
        <input type="text" name="label" id="label1_for_label" value="<?= $disc->disc_label ?>">
        <br><br>

        <label for="price_for_label"><h10>Price:</h10></label>
        <input type="text" name="price" id="price1_for_label" value="<?= $disc->disc_price ?>">
        <br><br>

        <label for="picture_for_label"><h10>Picture:</h10></label>
        <input type="file" name="picture" id="picture1_for_label" class="btn btn-secondary">
        <img src='/atelier_crud/img/<?= $disc->disc_picture ?>' width='20%'>
        <br><br>

        <input type="submit" value="Modifier" class="btn btn-warning">
        <a href="discs.php" class="btn btn-success" >Retour à la liste des artistes</a>

    </form>
        </div>

    
</body>
</html>