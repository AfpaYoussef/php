<?php
    // On se connecte à la BDD via notre fichier db.php :
    require "db.php";
    $db = connexionBase();

    // On récupère l'ID passé en paramètre :
    $id = $_GET["id"];

    // On crée une requête préparée avec condition de recherche :
    $requete = $db->prepare("SELECT * FROM disc join  artist ON artist.artist_id = disc.artist_id WHERE disc_id=?" );
    
    // on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
    $requete->execute(array($id));

    // on récupère le 1e (et seul) résultat :
    $myDisc = $requete->fetch(PDO::FETCH_OBJ);

    // on clôt la requête en BDD
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>PDO - Détail</title>
    </head>
    <body>
        <h1>Details</h1>

        
        Title : <?= $myDisc->disc_title ?>
        Year : <?= $myDisc->disc_year ?>
        Label : <?= $myDisc->disc_label ?>
        Artist : <?= $myDisc->artist_name ?>
        Genre : <?= $myDisc->disc_genre ?>
        Price : <?= $myDisc->disc_price ?>
        
        Picture :<img src='/atelier_crud/img/<?= $myDisc->disc_picture ?>'width='5%'>



        <a href="disc_form.php?id=<?= $myDisc->disc_id ?>"><button type="button">Modifier</button></a>
        <a href="script_disc_delete.php?id=<?= $myDisc->disc_id ?>"><button type="button" id="delete_button">Supprimer</button></a>
        <a href="/atelier_crud/discs.php"><button type="button">Retour à la liste des artistes</button></a>

       
        
          <script type="text/javascript">
            
            document.getElementById("delete_button").addEventListener('click', function(e){
                var del = confirm("Etes-vous sûr de vouloir supprimer ces données ?");
                if(del == true){
                    alert("Données effacées");
                }
                
                if (del == false){
                    
                    alert("Données non effacées");
                    e.preventDefault();
                }

                return del;
            });
          </script>
    </body>
</html>