
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Liste de présence</title>
    <link rel="icon" type="image/jpg" href="../Logo Simplon.jpg">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style media="screen">
  		body {
  			background-image: url("../Logo Simplon.jpg");
  			background-repeat: no-repeat;
  			background-position: top;
  		}
  	</style>

  </head>
  <body>
<center>
<!-- SEARCH BAR -->
<form method="post" action="../search" >
<div class="d-flex justify-content-center h-100">
        <div class="searchbar">
          
          <input onkeyup="showResult(this.value)" class="search_input" type="text" name="search_input" placeholder="Chercher un  nom, un prénom ou un mail...">
          <button style="background : transparent; border : transparent" class="search_icon" type="submit" name="btn_search"><i class="fas fa-search"></i></button>
    
        </div>
      </div>
      </form>
      <!-- END SEARCH BAR -->
<br>
<h2 id="message"></h2>
</center>
        <?php
        include '../connect2db.php';
        error_reporting(E_ALL);
        if (!isset($_POST['search'])) {
       
        $sql1 ="SELECT * FROM simplonien";
        $result = $conn->query($sql1);

      if ($result->num_rows > 0) {
        //Afficher la liste de présence dans un tableau
        echo "<center>";
        echo "<br>";
        echo '
        <h1 align="center">LISTE DE PRESENCE SIMPLON COTE D\'IVOIRE DU ';

        	date_default_timezone_set('Africa/Abidjan'); // CDT
        	echo date("d/m/y");
        	echo ' </h1>  ';
          echo "
          <div id=\"print\">
          <table  border=\"2\" cellspacing=\"0\" cellspadding=\"0\" text-align=\"center\"><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>E-mail</th><th>Numéro De Téléphone</th><th>Sexe</th><th>Heure d'arrivée</th></tr>";
          // output data of each row
          $id = 1;
          while($row = $result->fetch_assoc()) {
              echo "<tr><td>".$id++."</td><td>".$row["nom"]."</td><td>".$row["prenom"]."</td><td>".$row["email"]."</td><td>".$row["numTel"]."</td><td>".$row["sexe"]."</td><td>".$row["heure_arriv"]."</td></tr>";
          }
          echo "</table>
          </div>
          ";

          echo "</center>";
      } else {
        echo '
        <script>
        document.getElementById("message").innerHTML ="Aucune personne enregistrée pour le moment";
        </script>
      ';
      }
    
      $conn->close();
    }
      ?>


<center style="margin-top : 100px;">
  <button class="btn btn-default" type="button" name="button" onclick="redirect();">Imprimer la liste de présence</button><br><br>
  <form action="./delete" method="post">
  <button type="submit" class="btn btn-default" name="delete">Réinitialiser la liste de présence</button>
  </form>
</center>

<script type="text/javascript">
 function redirect() {
    document.location.replace('./imprimer');
  }
</script>

  </body>
</html>
