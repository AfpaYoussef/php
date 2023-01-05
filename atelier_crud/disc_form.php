<?php
require "db.php";
$db = connexionBase();
$requete = $db->prepare("SELECT * FROM disc WHERE disc_id=?");
$requete->execute(array($_GET["id"]));
$disc = $requete->fetch(PDO::FETCH_OBJ);
$requete->closeCursor();
$nouveau = $db->query("SELECT artist_id, artist_name  FROM artist");
$nouveau1 = $nouveau -> fetchAll(PDO::FETCH_OBJ);
$nouveau -> closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier</title>
</head>
<body>
    <h1>Modifier un vinyle</h1>
    <br><br>

    <form action ="script_disc_modif.php" method="post">
        
        <label for="nom_for_title">Title</label><br>
        <input type="text" name="title" id="title_for_label" value="<?= $disc->disc_title ?>">
        <br><br>




        <label for="artist_for_label">Artist </label><br>
        <select name="lartiste" id="artist_for_label">
        <option value="" selected>Select your artist</option> 
        <?php foreach ($nouveau1 as $artist):?>

          <option value=<?= $artist->artist_id ?>><?= $artist->artist_name ?></option>; 
        
        <?php endforeach ;?> 
        </select>


        <br><br>



        <label for="year_for_label">Year </label><br>
        <input type="text" name="year" id="year0_for_label" value="<?= $disc->disc_year ?>">
        <br><br>

        <label for="genre_for_label">Genre </label><br>
        <input type="text" name="genre" id="genre1_for_label" value="<?= $disc->disc_genre ?>">
        <br><br>

        <label for="label_for_label">Label </label><br>
        <input type="text" name="label" id="label1_for_label" value="<?= $disc->disc_label ?>">
        <br><br>

        <label for="price_for_label">Price </label><br>
        <input type="text" name="price" id="price1_for_label" value="<?= $disc->disc_price ?>">
        <br><br>

        <label for="picture_for_label">Picture </label><br>
        <input type="file" name="picture" id="picture1_for_label" >
        <img src='/atelier_crud/img/<?= $disc->disc_picture ?>' width='20%'>
        <br><br>

        <input type="submit" value="Modifier">
        <a href="discs.php"><button type="button">Retour à la liste des artistes</button></a>

    </form>

    
</body>
</html>