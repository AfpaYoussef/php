<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>formulaire Inscription</title>

    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
</head>
<body>

<div id="container">

<form name="mon-formulaire1" action="/authentification_et_motdepasse/inscription1_script.php" method="POST">

		<fieldset>
			<legend><b>Formulaire d'inscription</b></legend>
			<!-- La balise Table pour formater l'affichage du formulaire -->
			<table>
				<tr>
					<td><label><b>Nom:</b></label></td>
					<td><input type="text" name="nom" placeholder="saisir votre nom"/> </td>
				</tr>
				<tr>
					<td><label><b>Prénom:</b></label></td>
					<td><input type="text" name="prenom" placeholder="saisir votre prénom"/></td>
				</tr>
				<tr>
					<td><label><b>Email:</b></label></td>
					<td><input type="email" name="email"placeholder="saisir votre adresse email"/></td>
				</tr>
                <tr>
					<td><label><b>Mot de passe:</b></label></td>
					<td><input type="password" name="motdepasse" placeholder="saisir votre mot de passe"/></td>
				</tr>

                <tr>
					<td colspan="2"><input type="submit" class="textenvoyer" value="Envoyer"/><a href="/authentification_et_motdepasse/login_form.php"><input type="button" class="textenvoyer" value="Annuler"/></a></td>
				</tr>
				
			</table>
		</fieldset>


</form>
</div>
</body>
</html>


