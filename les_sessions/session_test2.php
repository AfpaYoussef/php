<?php

session_start();


// Ici on crée la session:

// $_SESSION ["login"] = "Valentin" ;


// ou

// Ici on détruit la session (brièvement):

unset($_SESSION["login"]);

// alors 


// Vérification de l'existence de la session login

if (! isset($_SESSION["login"]) ) 
{
    header("Location:index.php");
    exit;
}

echo "Bonjour " . $_SESSION ["login"] . "<br>";


// et/ou bien détruire complètement la session:


unset($_SESSION["login"]);

if (ini_get("session.use_cookies")) 
{
    setcookie(session_name(), '', time()-42000);
}

session_destroy();

?>