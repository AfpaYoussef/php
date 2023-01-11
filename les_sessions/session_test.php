<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

session_start();

// la session login existe et est autorisée (true) ou interdite (false)

$_SESSION["login"] = true;


// Partie autorisation 
if ($_SESSION["login"]) 
{
   echo"Vous êtes autorisé à voir cette page.";  
} 

// sinon interdiction 
else 

{
   echo "Cette page nécessite une identification.";  
}

?>
</body>
</html>

