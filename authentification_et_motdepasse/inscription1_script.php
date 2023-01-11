<?php
session_start();
if(isset($_POST['email']) && isset($_POST['motdepasse']))

{

// On va vérifier les variables
if(!preg_match('/^[[:alnum:]]+$/', $_POST['email']) && !preg_match('/^[[:alnum:]]+$/', $_POST['motdepasse']))

    {
        unset($_SESSION['auth']);
        echo 'Vous devez entrer uniquement des lettres ou des chiffres <br/>';
        echo '<a href="/authentification_et_motdepasse/login_form.php" temp_href="/authentification_et_motdepasse/login_form.php">Réessayer</a>';
        exit;
    }

    else
    {
        $_SESSION['auth']='ok';
         // On réclame le fichier
        $login = $_POST['email'];
        $motdepasse = $_POST['motdepasse'];
        $nom = $_POST['nom'];
        $prenom = $_POST ['prenom'];

        $hmotdepasse=password_hash($motdepasse, PASSWORD_DEFAULT);
        
        require "db.php"; 
        $db = connexionBase();
    
    
    try {
        // Construction de la requête INSERT sans injection SQL (qui doit respecter l'ordre des colonnes de la table dans la base de données sans l'id) et VALUES (doit respecter cet ordre sans l'id) :
        $requete = $db->prepare("INSERT INTO `user` (nom, prénom, mail, mot_de_passe) VALUES (:nom,:prenom,:login,:motdepasse);");
    
        // Association des valeurs aux paramètres via bindValue() :
        $requete->bindValue(":login", $login , PDO::PARAM_STR);
        $requete->bindValue(":motdepasse", $hmotdepasse, PDO::PARAM_STR);
        $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
        $requete->bindValue(":prenom",$prenom, PDO::PARAM_STR);
    
    
    
        // Lancement de la requête :
        $requete->execute();
    
        // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
        $requete->closeCursor();
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
    }
    
}

else


{

    header("location: /authentification_et_motdepasse/pageouverture.php");
    exit;


}

?>