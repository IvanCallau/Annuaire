<?php

require "connexion.php";

$appliBD = new Connexion();

$id = $_GET["id"];

$newUser = $appliBD->selectPersonneById($id);

$lastname = $_POST["lastname"];
$firstname =  $_POST["firstname"];
$photo = $_POST["photo_URL"];
$anniversaire = $_POST["anniversaire"];
$status = $_POST["status"];

echo "$lastname </br> $firstname </br> $photo </br> $anniversaire </br> $status";

$nouvelId = $appliBD->insertPersonne($lastname, $firstname, $photo, $anniversaire, $status);

echo "<form method='POST' action='Profil.php?id=" . $newUser->ID . "><input id='title' type='submit' value='VisageLibraire'></form>";

?>