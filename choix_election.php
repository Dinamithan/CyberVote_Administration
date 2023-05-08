<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberVote Administration</title>
    <link href="stylechoix.css" rel="stylesheet" />
</head>
<?php
session_start();
?>
<body>
    <header>
        <nav class="navbar bg-primary">
            <div class="logo-container">
              <img src="/style/cyberVote.png" alt="Logo CyberVote">
              <h1>CyberVote</h1>
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

    <body>
        <div class="election">
            <h2>Veuillez choisir une election pour voir les résultats</h2>
                <?php
                $compteur = 0;
                include("ConnexionBDD.php");
                $allelections = mysqli_query($conn, "SELECT DateDebutElection, DateFinElection, LibElection FROM ELECTION");
                
            while($row = mysqli_fetch_assoc($allelections)) 
            {
                $compteur++;
                echo ('<div class="election_'. $compteur .'">');
                echo ('<h3 class= "nomelection_'. $compteur .'">' . ($row['LibElection']) . '</h3>');
                echo ('<p class= "prix">Date début de l\'élection : ' . ($row['DateDebutElection']) . 'Date fin de l\'élection : ' . ($row['DateFinElection']) . '</p>');              
        }
                ?>
        </div>
    </body>
</html>