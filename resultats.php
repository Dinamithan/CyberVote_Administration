<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberVote Administration</title>
    <link href="style/stylechoix.css" rel="stylesheet" />
</head>
<script>
// Récupération des paramètres de l'URL
const urlParams = new URLSearchParams(window.location.search);

// Récupération de la valeur de "election_id"
const electionId = urlParams.get('election_id');
console.log(electionId); // Affiche "2" dans la console

</script>
<?php
session_start();
?>
    <header>
        <nav class="navbar bg-primary">
            <div class="logo-container">
                <img src="style/cyberVote.png" alt="Logo CyberVote">
                <h1>CyberVote</h1>
                <a class="nouvelle_election" href="nouvelle_election.php">Nouvelle élection</a>
              <a class="choix" href="choix_election.php">Choix d'élection</a>
              <a class="deconnexion" href="index.html">Se déconnecter</a>

            </div>
          </nav>
      </header> 
<body>
  <?php
  $electionId = intval($_GET["election_id"]);
    include("ConnexionBDD.php");
    $resultat_lib = mysqli_query($conn, "SELECT LibElection FROM ELECTION WHERE CodeElection = ' $electionId'");
     
    while($row = mysqli_fetch_assoc($resultat_lib)){
      echo("<h2>" . $row['LibElection'] . "</h1>");
    }
  
  ?>
  <h3>Résultat des élections :</h3>
  <div>
    <?php
      $electionId = intval($_GET["election_id"]);
      include("ConnexionBDD.php");
      $resultat_voteblanc = mysqli_query($conn, "SELECT LibElection, VoteBlanc FROM ELECTION WHERE CodeElection = ' $electionId'");
       
      while($row = mysqli_fetch_assoc($resultat_voteblanc)){
        echo("<p>Nombre de vote blanc : " . $row['VoteBlanc'] . "</p>");
      }
      $resultat_candidat = mysqli_query($conn, "SELECT PrenomSalarie, NomSalarie, NbVoix
      FROM LISTECANDIDATELECTION, CANDIDAT, SALARIE, ELECTION 
      WHERE ELECTION.CodeElection = ' $electionId'
      AND LISTECANDIDATELECTION.CodeElection = ELECTION.CodeElection
      AND LISTECANDIDATELECTION.CodeCandidat = CANDIDAT.CodeCandidat
      AND CANDIDAT.CodeSalarie = SALARIE.CodeSalarie");
      while($row = mysqli_fetch_assoc($resultat_candidat))
      {
        echo("<p>Candidat " . $row['PrenomSalarie'] . " " .  $row['NomSalarie'] .  " : " . $row['NbVoix'] ." nombres de voix.</p>");
      }
    ?>
  </div>
</body>

    <footer>
    <div class="footer-container">
        <div class="footer-left">
            <h3>CyberVote</h3>
            <p>Téléphone : 514-555-1234</p>
            <p>Email : info@cybervote.com</p>
        </div>

    </div>
    <div class="copy-right">
        <p>&copy; 2023 CyberVote. Tous droits réservés.</p>
    </div>
</footer>

</html>