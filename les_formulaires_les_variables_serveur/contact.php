<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous contacter</title>
</head>
<body>

    <p><h1>Vos coordonnées :</h1></p>
    <p style="color:brown"><strong><h> * Ces zones sont obligatoires pour envoyer le formulaire.</h></strong></p>

    <form name="form3" method="post" action="exercice.php"> 
        <div  style="line-height: 2.5rem;">

            <label ><strong>Société: </strong><input type="text" name="choix" value="" id="societe"/></label><label style="color:red"> *</label><br/>
            <label ><strong>Personne à contacter:  </strong><input type="text" name="choix1" value="" id="perscontact"/></label><label style="color:red"> *</label><br/>
            <label ><strong>Adresse de l'entreprise:  </strong><textarea  type="text" name="choix2" value="" id=""></textarea></label><br/> 
            <label ><strong>Code postale:  </strong><input type="text" name="choix3" value="" id="codepost"/></label><label style="color:red"> *</label><br/> 
            <label ><strong>Ville:  </strong><input type="text" name="choix4" value="" id="ville"/></label><label style="color:red"> *</label><br/>
            <label ><strong>E-mail:  </strong><input type="text" name="choix5" value="" id="email"/></label><label style="color:red"> *</label><br/>
            <label ><strong>Téléphone:  </strong><input type="text" name="choix6" value=""/></label><br/>
            <label ><strong>Tapez ou sélectionnez l'environnement technique du projet:  </strong><textarea  type="text" name="choix" id="targetValue" value=""></textarea></label><br>
            <select name="Choix7" id="targetOption">
                <option value="">Sélectionnez</option>
                <option value="Access">Access</option>
                <option value="Java">Java</option>
                <option value="Delphi">Delphi</option>
                <option value="Windev">Windev</option>
                <option value="Visual Basic">Visual Basic</option>
                <option value="Power Builder">Power Builder</option>
                <option value="Internet">Internet</option>
                <option value="Intranet">Intranet</option>
                <option value="Windows NT">Windows NT</option>
                <option value="Unix">Unix</option>
                <option value="SQL Server">SQL Server</option>
                <option value="Oracle">Oracle</option>
                <option value="Autres...">Autres...</option>
                
            </select>
        </div>    
        <input type="submit" id="cliquons" value="Envoyer"/>
        <input type="reset" name="but" value="Effacer"  />
    </form>
    <script src="/FRONT/DYNAMIQUE/JAVASCRIPT/assets/js/Contact.js"></script>
</body>
</html>