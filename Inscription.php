<?php

require "connexion.php";

$appliBD = new Connexion();

$lastname = $_POST["lastname"];
$firstname =  $_POST["firstname"];
$photo = $_POST["photo_URL"];
$anniversaire = $_POST["anniversaire"];
$status = $_POST["status"];
$hobbies = $_POST["hobbies"];
$musiques = $_POST["musiques"];
$contacts = $_POST["contacts"];


echo "$lastname </br> $firstname </br> $photo </br> $anniversaire </br> $status";

$nouvelId = $appliBD->insertPersonne($lastname, $firstname, $photo, $anniversaire, $status);

header("Location: /Annuaire/Profil.php?id=$nouvelId", true, 303);

exit;

?>