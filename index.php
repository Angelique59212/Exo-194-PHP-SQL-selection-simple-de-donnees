<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sélection simple</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
require "Connect.php";
require "Config.php";

$myConnexion = Connect::dbConnect();

try {
    $stmt = $myConnexion->prepare("SELECT nom,prenom,rue,numero,code_postal,ville,pays,mail FROM user ");
    $state = $stmt->execute();

    if ($state) {
        foreach ($stmt->fetchAll() as $user) {
            echo "<div class='classe-css-utilisateur'>"."Utilisateur: ".$user['nom']. " ".$user['prenom']. " ".$user['rue']. " ".$user['numero']. " ".
                $user['code_postal']." ".$user['ville']." ".$user['pays']." ".$user['mail'];
        }
    }

    $stmt = $myConnexion->prepare("SELECT * FROM user ORDER BY id DESC");
    $state = $stmt->execute();

    if ($state) {
        foreach ($stmt->fetchAll()as $user) {
            echo "<div class='classe-css-utilisateur'>"."Utilisateur: id: ".$user['id'] .$user['nom']. " ".$user['prenom'].
                " ".$user['rue']. " ".$user['numero']. " ". $user['code_postal']." ".$user['ville']." ".$user['pays']." ".$user['mail'];
        }
    }

    $stmt = $myConnexion->prepare("SELECT nom,prenom FROM user");
    $state = $stmt->execute();

    if ($state) {
        foreach ($stmt->fetchAll() as $user) {
            echo "<div class='classe-css-utilisateur'>"."Utilisateur: ".$user['nom']. " ".$user['prenom'];
        }
    }
}
catch (PDOException $exception) {
    echo $exception->getMessage();
}

?></body>
</html>

