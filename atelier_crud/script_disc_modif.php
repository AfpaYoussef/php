<?php
    // Récupération des valeurs :
    $id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
    $a = (isset($_POST['title']) && $_POST['title'] != "") ? $_POST['title'] : Null;
    $b = (isset($_POST['year']) && $_POST['year'] != "") ? $_POST['year'] : Null;
    $d = (isset($_POST['label']) && $_POST['label'] != "") ? $_POST['label'] : Null;
    $e = (isset($_POST['genre']) && $_POST['genre'] != "") ? $_POST['genre'] : Null;
    $f = (isset($_POST['price']) && $_POST['price'] != "") ? $_POST['price'] : Null;
    $g = (isset($_POST['lartiste']) && $_POST['lartiste'] != "") ? $_POST['lartiste'] : Null;
    
    if(isset($_POST['picture']) && $_POST['picture'] != ""){
        $c=$_POST['picture']; 
    }
    else{
        if(isset($_POST['image']) && $_POST['image'] != ""){
            $c=$_POST['image']; 
        }
        else{
            $c=Null;
        }
    }

    // En cas d'erreur, on renvoie vers le formulaire
    if ($id == Null) {
        header("Location: discs.php");
    }

    elseif ($a == Null || $b == Null || $c == Null|| $d == Null || $e == Null || $f == Null || $g == Null) {
        header("Location: disc_form.php?id=".$id);
        exit;
    }

    // Si la vérification des données est ok :
    require "db.php"; 
    $db = connexionBase();

    try {
        // Construction de la requête UPDATE sans injection SQL :
        $requete = $db->prepare("UPDATE disc SET disc_title = :title, disc_year = :year, artist_id = :lartiste, disc_picture = :picture, disc_label = :label, disc_genre = :genre, disc_price = :price WHERE disc_id = :id;");
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        $requete->bindValue(":title", $a, PDO::PARAM_STR);
        $requete->bindValue(":year", $b, PDO::PARAM_STR);
        $requete->bindValue(":picture", $c, PDO::PARAM_STR);
        $requete->bindValue(":label", $d, PDO::PARAM_STR);
        $requete->bindValue(":genre", $e, PDO::PARAM_STR);
        $requete->bindValue(":price", $f, PDO::PARAM_STR);
        $requete->bindValue (":lartiste", $g, PDO::PARAM_INT);
        $requete->execute();
        $requete->closeCursor();
    }

    catch (Exception $j) {
        echo "Erreur : " .$requete->errorInfo()[2]. "<br>";
        die("Fin du script (script_disc_modif.php)");
    }


    // Si OK: redirection vers la page disc_detail.php
    header("Location: disc_detail.php?id=".$id);
    exit;

    ?>