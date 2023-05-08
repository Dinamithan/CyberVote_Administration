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

    <div class="container">
        <div Align="center" bg="grey">
            <h2>Bonjour
                <?php
                //    echo $_SESSION['prenomPersonne'] . ' ' . $_SESSION['nomPersonne']; // A RAJOUTER JOINTURE
                ?>
            </h2>
        </div>
    </div>
</body>
    <body>
        <h2>Veuillez choisir une election pour voir les résultats</h2>
        <div class="election">
                
                <?php
                include("ConnexionBDD.php");
                $allelections = mysqli_query($conn, "SELECT CodeElection, DateDebutElection, DateFinElection, LibElection FROM ELECTION");
                
            while($row = mysqli_fetch_assoc($allelections)) 
            {
                echo ('<div class="election">');
                echo ('<a class="election-link" href="resultats.php?election_id='. $row['CodeElection'] .'">');
                echo ('<div class="election-details">');
                echo ('<h3 class= "nom">' . ($row['LibElection']) . '</h3>');
                echo ('<p class= "date">Date début de l\'élection : ' . ($row['DateDebutElection']) . '</p>');
                echo ('<p class= "date">Date fin de l\'élection : ' . ($row['DateFinElection']) . '</p>');
                echo ('</div>');
                echo ('</a>');
                echo ('</div>');
        }
                ?>
        </div>
    </body>
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