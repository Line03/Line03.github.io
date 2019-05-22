<!DOCTYPE html>
<html>
<head>
	<title>Liste de presence SIMPLON CIV</title>
	<!-- On ajoute une icone dans la barre d'adresse -->
	<link rel="icon" type="image/jpg" href="Logo Simplon.jpg">
	<!-- On lie le fichier à bootstrap pour un rendu plus interessant -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta charset="utf-8">
	<style media="screen">
		body {
			background-image: url("Logo Simplon.jpg");
			background-repeat: no-repeat;
			background-position: top;
		}
	</style>
</head>
<body>

<div class="container">
<h1 align="center">LISTE DE PRESENCE SIMPLON COTE D'IVOIRE DU
	<!--
	Affichage de la date du serveur
-->
	<?php
	date_default_timezone_set('Africa/Abidjan'); // CDT
	echo date("d/m/y");
	?> </h1>
	<!--
	Formulaire permettant à l'apprenant de s'enregistrer dans la liste de présence
	-->
<form method="post">
  <div class="form-group">
    <label >Nom : </label>
    <input type="text" class="form-control" placeholder="Nom" name="nom" required="required">
  </div>
  <div class="form-group">
    <label>Prénom : </label>
    <input type="text" class="form-control" placeholder="Prénom" name="prenom" required="required">
  </div>
  <div class="form-group">
    <label>E-mail :</label>
    <input type="email" class="form-control" placeholder="Votre E-mail" name="email" required="required">
  </div>
  <div class="form-group">
    <label>Numéro De Téléphone : </label>
    <input type="text" class="form-control" placeholder="Ex : 01234567" name="numTel" required="required">
  </div>
  <div class="form-group">
    <label>Sexe : </label>
    <input type="radio" name="sexe" value="M"> H <input type="radio" name="sexe" value="F">F
  </div>
	<center>
  <button type="submit" class="btn btn-default" name="present">Je suis Présent(e)</button><br>
	<h2 id="error" style="color : red;"></h2>
	<h2 id="success" style="color : green;"></h2>
	<h4 id="small_error" style="color : red;"></h4>
	</center>
	
</form>
</div>

<?php
//Pour afficher les erreurs sur la page afin de faciliter le debogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//On appelle le fichier dans lequel a été enregistré le code de connexion à la db
include('connect2db.php');

if (isset($_POST['present'])) {
	$nom = addslashes($_POST['nom']);
	$prenom = addslashes($_POST['prenom']);
	$email = addslashes($_POST['email']);
	$numTel = addslashes($_POST['numTel']);
	$sexe = addslashes($_POST['sexe']);
	$heure_arriv = date("h:i:s");
	
//On verifie que l'email que l'apprenant a entré n'a pas deja été entré auparavant
$query = mysqli_query($conn, "SELECT * FROM simplonien WHERE email='$email'");
			 $rows = mysqli_num_rows($query);
			 if($rows==1){
				 echo '<script>
				 document.getElementById("error").innerHTML ="Vous ne pouvez pas vous inscrire deux fois sur la liste de présence";
				 document.getElementById("small_error").innerHTML ="Non ajouté";
				echo </script>';
			 }
			 else {
				 //Si le programme n'a pas trouvé d'email correspondant dans la bd alors il enregistre les données entrées
				 $sql = mysqli_query($conn,"INSERT INTO simplonien (nom, prenom, email, numTel, sexe,heure_arriv)
			 VALUES ('$nom', '$prenom', '$email','$numTel','$sexe', '$heure_arriv')");
				 if ($sql) {
					echo '
						<script>
						document.getElementById("success").innerHTML ="Vous avez bien été enregistré dans la liste de présence";
						</script>
					';
				 }
				 else {
					 //Si le programme a trouvé un mail identique à ce que l'utilisateur a entré il affiche le message suivant
					
					echo '
						<script>
						document.getElementById("error").innerHTML ="Vous n\'avez pas été enregistré dans la liste de présence. Réessayez plus tard";
						</script>
					';
				 }
			 }

}
$conn->close();
?>

<br><br>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
