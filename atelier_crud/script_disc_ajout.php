<?php
    // Récupération des informations :
    if (isset($_POST['letitre']) && $_POST['letitre'] != "") {
        $nom = $_POST['letitre'];
    }
    else {
        $nom = Null;
    }

    if (isset($_POST['lartiste']) && $_POST['lartiste'] != "") {
        $a = $_POST['lartiste'];
    }
    else {
        $a = Null;
    }

    if (isset($_POST['yeardisc']) && $_POST['yeardisc'] != "") {
        $b = $_POST['yeardisc'];
    }
    else {
        $b = Null;
    }

    if (isset($_POST['genredisc']) && $_POST['genredisc'] != "") {
        $c = $_POST['genredisc'];
    }
    else {
        $c = Null;
    }

    if (isset($_POST['labeldisc']) && $_POST['labeldisc'] != "") {
        $d = $_POST['labeldisc'];
    }
    else {
        $d = Null;
    }

    if (isset($_POST['pricedisc']) && $_POST['pricedisc'] != "") {
        $e = $_POST['pricedisc'];
    }
    else {
        $e = Null;
    }


    if (isset($_POST['picture']) && $_POST['picture'] != "") {
        $g = $_POST['picture'];
    }
    else {
        $g = Null;
    }




    // Récupération de l'URL (même traitement, avec une syntaxe abrégée)
    // $url = (isset($_POST['url']) && $_POST['url'] != "") ? $_POST['url'] : Null;

    // En cas d'erreur, on renvoie vers le formulaire
    if ($nom == Null || $a == Null || $b == Null|| $c == Null|| $d == Null|| $e == Null||  $g == Null) {
        header("Location: disc_new.php");
        exit;
    }

    // S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    require "db.php"; 
    $db = connexionBase();


try {
    // Construction de la requête INSERT sans injection SQL (qui doit respecter l'ordre des colonnes de la table dans la base de données sans l'id) et VALUES (doit respecter cet ordre sans l'id) :
    $requete = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price, artist_id) VALUES (:letitre,:yeardisc,:picture,:labeldisc,:genredisc,:pricedisc,:lartiste);");

    // Association des valeurs aux paramètres via bindValue() :
    $requete->bindValue(":letitre", $nom, PDO::PARAM_STR);
    $requete->bindValue(":lartiste", $a, PDO::PARAM_STR);
    $requete->bindValue(":yeardisc", $b, PDO::PARAM_STR);
    $requete->bindValue(":genredisc", $c, PDO::PARAM_STR);
    $requete->bindValue(":labeldisc", $d, PDO::PARAM_STR);
    $requete->bindValue(":pricedisc", $e, PDO::PARAM_STR);
    $requete->bindValue(":picture", $g, PDO::PARAM_STR);


    // Lancement de la requête :
    $requete->execute();

    // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
    $requete->closeCursor();
}

// Gestion des erreurs
catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_disc_ajout.php)");
}

// Si OK: redirection vers la page discs.php
header("Location: discs.php");

// Fermeture du script
exit;
?>