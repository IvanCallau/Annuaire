<?php

require "connexion.php";

$appliBD = new Connexion();

<<<<<<< HEAD
$newUser->$appliBD->selectPersonneById($id);
=======
$id = $_GET["id"];

$newUser = $appliBD->selectPersonneById($id);
>>>>>>> fac70acfd54410fddb3d49776fba4e005a783bdd

$lastname = $_POST["lastname"];
$firstname =  $_POST["firstname"];
$photo = $_POST["photo_URL"];
$anniversaire = $_POST["anniversaire"];
$status = $_POST["status"];

echo "$lastname </br> $firstname </br> $photo </br> $anniversaire </br> $status";

$nouvelId = $appliBD->insertPersonne($lastname, $firstname, $photo, $anniversaire, $status);

echo "<form method='POST' action='Profil.php?id=" . $newUser->ID . "><input id='title' type='submit' value='VisageLibraire'></form>";

?>