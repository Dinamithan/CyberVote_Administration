<?php
include("ConnexionBDD.php");
session_start();

$libElection = $_POST['libElection']; 
$debutElection = $_POST['debutElection']; 
$finElection = $_POST['finElection'];

$mysqli = new mysqli("127.0.0.1", "tristan", "tristan", "CyberVote");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$stmt = $mysqli->prepare('INSERT INTO `ELECTION` (`DateDebutElection`, `DateFinElection`, `LibElection`, `VoteBlanc`) VALUES (?,?,?,?)');
$voteblanc= 0;
$stmt->bind_param("sssi", $debutElection, $finElection, $libElection, $voteblanc);
$result = $stmt->execute();
echo $stmt->error;


if ($result) {
    echo "true";
} else {
    echo $stmt->error;
}



?>