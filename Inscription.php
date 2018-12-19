<?php

require "connexion.php";

$appliBD = new Connexion();

$lastname = $_POST["lastname"];
$firstname =  $_POST["firstname"];
$photo = $_POST["photo_URL"];
$anniversaire = $_POST["anniversaire"];
$status = $_POST["status"];
$musiques = $_POST["musiques"];
$hobbies = $_POST["hobbies"];
$contacts = $_POST["contacts"];


echo "$lastname </br> $firstname </br> $photo </br> $anniversaire </br> $status";

$nouvelId = $appliBD->insertPersonne($lastname, $firstname, $photo, $anniversaire, $status);

foreach ($musiques as $musique) {

	$mesMusiques = $appliBD->insertPersonneMusique($nouvelId, $musique);

}

foreach ($hobbies as $hobby) {

	$mesHobbies = $appliBD->insertPersonneHobby($nouvelId, $hobby);

}

foreach ($contacts as $persone) {

	$mesRelations = $appliBD->insertRelationPersonne($nouvelId, $persone, $type);

}

header("Location: /Annuaire/Profil.php?id=$nouvelId", true, 303);

exit;

?>