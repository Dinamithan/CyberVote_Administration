<?php

include "ConnexionBDD.php";
session_start();


$username = $_POST['username']; 
$password = $_POST['password'];

if ($username !== "" && $password !== "") {
    $mysqli = new mysqli("127.0.0.1", "tristan", "tristan", "CyberVote");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stmt = $mysqli->prepare('SELECT Pseudo, MotdePasse FROM ADMINISTRATEUR WHERE Pseudo = ? AND MotdePasse = ?');
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($col1, $col2); // noms de variables temporaires
    if ($stmt->fetch()) {
        header('Location: Choix_Election/index.php'); // bon login
    } else {
        header('Location: index_erreur.html'); // Mauvais login
    }
}



?>