<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberVote Administration</title>
    <link href="style/stylechoix.css" rel="stylesheet" />
</head>
<?php
session_start();
?>
<body>
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

<div>
    <h2>Veuillez entrer une nouvelle élection :</h2>
    <h3 style="text-align:center" id="message"></h3>
    <div id="loader" class="loader"></div>

</div>
    <div class="nouvelle election">
        <form id="form_nouvelle_election" action="action_nouvelle_election.php" method="POST">
            <label><b>Libélé de l'élection</b></label>
            <input type="text" placeholder="Entrer un libélé" name="libElection" required>
        
            <label><b>Date de début de l'élection</b></label>
            <input type="date" id="datePickerId" name="debutElection" />

            <label><b>Date de fin de l'élection</b></label>
            <input type="date" name="finElection" required>

            <input type="submit" id='submit' value='Créer une nouvelle élection' >
        </form>
    </div>
    </body>
<script>
    datePickerId.min = new Date().toISOString().split("T")[0];
//////////////

document.getElementById("form_nouvelle_election").addEventListener("submit", function(event) {
  event.preventDefault();

  var form_data = new FormData(this);

  // Afficher le loader
  var loader = document.getElementById("loader");
  loader.style.display = "block";

  var message = document.getElementById("message");
  // Envoie de la requête Ajax
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'action_nouvelle_election.php');
  xhr.onload = function() {
    console.log(xhr.responseText);

    // Masquer le loader
    loader.style.display = "none";
    
    if (xhr.status === 200 && xhr.responseText === "true") {
        // Si la requête a réussi, affichez un message de confirmation à l'utilisateur
        alert("L'élection a été ajoutée avec succès.");
    } else {
        // Sinon, afficher un message d'erreur
        alert("La requête a échoué ou aucune ligne n'a été affectée.");
    }
  };
  xhr.send(form_data);
});
/////
</script>
<br>
    <br>
    <br>
<footer>
        <div class="footer-left">
            <h3>CyberVote Administration</h3>
            <p>Téléphone : 514-555-1234</p>
            <p>Email : info@cybervote.com</p>
        </div>
    <div class="copy-right">
        <p>&copy; 2023 CyberVote. Tous droits réservés.</p>
    </div>
</footer>
</html>