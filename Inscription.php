<?php

require "connexion.php";

$appliBD = new Connexion();

// Récupère les données insérées dans Formulaire.php selon leurs "name".
$lastname = $_POST["lastname"];
$firstname =  $_POST["firstname"];
$photo = $_POST["photo_URL"];
$anniversaire = $_POST["anniversaire"];
$status = $_POST["status"];
$musiques = $_POST["musiques"];
$hobbies = $_POST["hobbies"];
$contacts = $_POST["contacts"];
$relationType = $_POST["typeRelation"];

var_dump($_POST);
echo "$lastname </br> $firstname </br> $photo </br> $anniversaire </br> $status";

// Crée le nouvel utilisateur dans le tableau Personne et récupère son ID.
$nouvelId = $appliBD->insertPersonne($lastname, $firstname, $photo, $anniversaire, $status);

// Fait des insertions dans le tableau RelationMusique pour chaque valeur séléctionnée dans "musiques".
foreach ($musiques as $musique) {

	// Insère 1 à 1 les relations.
	$mesMusiques = $appliBD->insertPersonneMusique($nouvelId, $musique);

}

// Fait des insertions dans le tableau RelationHobby pour chaque valeur séléctionnée dans "hobbies".
foreach ($hobbies as $hobby) {

	// Insère 1 à 1 les relations.
	$mesHobbies = $appliBD->insertPersonneHobby($nouvelId, $hobby);

}

// Fais des insertions dans le tableau RelationPersonne pour chaque personne séléctionnée dans "contacts" ainsi que le type qui a été écrit dans la barre.
foreach ($relationType as $personeId => $personeRelation) {

	// Insère 1 à 1 les relations SI il y en a.
	if ($personeRelation != "") {
		$mesRelations = $appliBD->insertRelationPersonne($nouvelId, $personeId, $personeRelation);
	}
}

// Envoie directement vers la page profil en donnant l'ID du nouvel utilisateur comme valeur dans le lien.
header("Location: /Annuaire/Profil.php?id=$nouvelId", true, 303);

exit;

?>