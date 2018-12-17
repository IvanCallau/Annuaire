
<?php

// Fais appel au code qu'il y a dans 'connexion.php'.
require "connexion.php";

// Je crée mon objet connexion.
$appliBD = new Connexion();


if ($appliBD->getConnexion() !== null) {
	echo "Connection BD réussie.</br></br>";
}
else {
	echo "Connection BD échoué.</br>";
}

/*
$myHobbies = $appliBD->insertPersonneHobbies();

if ($myHobbies !== null) {
	echo "n'a pas changé.</br>";
}
else{
	echo "cette personne a un nouvel hobby.</br>";
}


/*

$relations = $appliBD->getRelationPersonne(1);

echo "Relations:</br></br>";

foreach ($relations as $rPersonne) {

	echo "<li>" . $rPersonne->Type . "</li></br>";

}

$pHobbies = $appliBD->getPersonneHobby(2);

echo "Hobbies:</br></br>";

foreach ($pHobbies as $pHobby) {

	echo "<li>" . $pHobby->Type . "</li></br>";

}

/*
$personneMusique = $appliBD->getPersonneMusique(1);

echo "Hobbies:</br></br>";

foreach ($personneMusique as $pMusiques) {

	echo "<li>" . $pMusiques->Type . "</li></br>";

}






$personnes = $appliBD->selectPersonneByNomPrenomLike("er");

// Appel seulement la première entrée du tableaux
// qui possède "er" dans Prénom ou Nom.
echo $personnes[0]->Prenom . " " . $personnes[0]->Nom . "</br></br>";


echo "<ul>";
// Liste toutes les entrées qui ont "er" dans Prénom ou Nom.
foreach ($personnes as $personne) {

	echo "<li>" . $personne->Prenom . " " . $personne->Nom . "</li></br>";

}

echo "</ul>";






var_dump($relations);


/*

$allHobbies = $appliBD->selectAllHobbies();

echo "<ul>";

foreach ($allHobbies as $hobby) {

	echo "<li>" . $hobby[Type] . "</li>";

}

echo "</ul>";


// Correction.
echo "<ul>";

$hobbies = $appliBD->selectAllHobbies2();

foreach ($hobbies as $hobby2) {

	echo "<li>" . $hobby2->Type . "</li>";

}

echo "</ul>";

/*



$allMusic = $appliBD->selectAllMusic();


foreach ($allMusic as $music) {

	echo '<input type="checkbox">' . $music[Type] . '</input>';

}

echo "</br>";


// Correction.
$musiques = $appliBD->selectAllMusique2();

foreach ($musiques as $m) {

	echo '<input type="checkbox">' . $m->Type . '</input>';
	echo "</br>";

}

*/


/*
$appelPersonne = $appliBD->insertPersonne("Holder", "Regan", "default.jpg", "1998.09.21", "Couple");

if ($appelPersonne !== null) {
	echo "Personne n'a été ajouté";
}
else {
	echo "Un nouveau profil a été ajouté!";
}

/*
$appelHobby = $appliBD->insertHobby("Informatique");


if ($appelHobby !== null) {
	echo "Hobby $appelHobby a été ajouté.</br>";
}
else{
	echo "Hobby n'a pas changé.</br>";
}

/*

$appelMusique = $appliBD->insertMusique("Pop");


if ($appelMusique !== null) {
	echo "Hobby $appelMusique a été ajouté.</br>";
}
else{
	echo "Hobby n'a pas changé.</br>";
}

*/

?>