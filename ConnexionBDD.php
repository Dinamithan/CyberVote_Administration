<?php
// connexion à la base de donnée
$servername='127.0.0.1'; // le chemin vers le serveur
$nom='tristan'; // nom de la base de donnée
$password='tristan'; // mot de passe de l'utilisateur pour se connecter
$db='cybervote';
$conn = new mysqli($servername, $nom, $password, $db);


// test de la bdd
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}

?>