<?php
    // Fichier 'hello.php'

    if (file_exists("fonctions.php") ) 
    {
        include("fonctions.php");
    } 
    else{
        echo "le fichier demandé n'existe pas.";
        exit;
    }
    $message = "Hello world !";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Inclusion de fichiers PHP</title>
    </head>
    <body> 
        <?php 
            writeMessage($message); 
        ?>
        <br>
        <?php 
            writeMessage("Bonjour tout le monde !"); 
        ?>
    <script src="js/scripts.js"></script>
    </body>
</html>