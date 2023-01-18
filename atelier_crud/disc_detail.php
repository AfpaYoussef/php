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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>PDO - Détail</title>
    </head>
    <body>
        <h1 align = "center">Details</h1>
        <table align = "center" class="border border-dark">
        
        
        
        
        <tr align = "center" class="border border-dark"><th>Title: </th> <td><?= $myDisc->disc_title ?> </td></tr>
        <tr align = "center" class="border border-dark"><th>Year: </th> <td> <?= $myDisc->disc_year ?> </td> </tr>
        <tr align = "center" class="border border-dark"><th>Label: </th> <td><?= $myDisc->disc_label ?> </td></tr>
        <tr align = "center" class="border border-dark"><th>Artist: </th> <td> <?= $myDisc->artist_name ?> </td></tr>
        <tr align = "center" class="border border-dark"><th>Genre: </th> <td> <?= $myDisc->disc_genre ?> </td></tr>
        <tr align = "center" class="border border-dark"> <th>Price: </th> <td> <?= $myDisc->disc_price ?> </td></tr>
        
        <tr align = "center" class="border border-dark"><th>Picture: </th> <td><img src='/atelier_crud/img/<?= $myDisc->disc_picture ?>'width='35%'></td> </tr>
        
        </table>


       <div align = center ><br>
        <a href="disc_form.php?id=<?= $myDisc->disc_id ?>" class="btn btn-warning" >Modifier</a>
        <a href="script_disc_delete.php?id=<?= $myDisc->disc_id ?>" class="btn btn-danger" id="delete_button">Supprimer</a><br><br>
        <a href="/atelier_crud/discs.php" class="btn btn-success" >Retour à la liste des artistes</a>
       </div>

       
        
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