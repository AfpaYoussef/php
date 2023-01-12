<?php

$login = $_POST['username'];
$motdepasse = $_POST['password'];

// S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    require "db.php"; 
    $db = connexionBase();

try {
    // Construction de la requête INSERT sans injection SQL (qui doit respecter l'ordre des colonnes de la table dans la base de données sans l'id) et VALUES (doit respecter cet ordre sans l'id) :
    $requete = $db->query('SELECT * FROM user');
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);

    // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
    $requete->closeCursor();

    foreach($tableau as $user){

        $bmail = $user->mail;
        $bmdp = $user->mot_de_passe;

        if($bmail == $login && password_verify($motdepasse, $bmdp)){
            header("location: /authentification_et_motdepasse/pageouverture.php");
            exit;
        }
    }
}

// Gestion des erreurs
catch (Exception $j) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (/authentification_et_motdepasse/login_script.php)");
}


header("location: /login_form.php");
exit;

?>