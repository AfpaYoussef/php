<html>
 <head>
 <meta charset="utf-8">
 <!-- importer le fichier de style -->
 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
 </head>
 <body style='background:#fff;'>
 <div id="content">
 <!-- tester si l'utilisateur est connecté -->
 <?php
 session_start();
 require "db.php"; 
    $db = connexionBase();

try {
    // Construction de la requête INSERT sans injection SQL (qui doit respecter l'ordre des colonnes de la table dans la base de données sans l'id) et VALUES (doit respecter cet ordre sans l'id) :
    $requete = $db->query('SELECT * FROM user');
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);

    // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
    $requete->closeCursor();

    foreach($tableau as $user){

        $nom = $user->nom;
        $prenom = $user->prénom;

    }
}

// Gestion des erreurs
catch (Exception $j) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (/authentification_et_motdepasse/login_script.php)");
}

 $_SESSION['username'] = $nom . " " . $prenom ;


 if( $_SESSION['username'] !== ""){
 $user = $_SESSION['username'];
 // afficher un message
 echo "Bonjour $user, vous êtes connecté!";
 }
 ?>
 
 </div>
 </body>
</html>