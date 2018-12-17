<?php

function connexionBD() {

	// Le chemin vers le serveur.
	$PARAM_hote='localhost' ;

	// Le port de connexion à la base de données.
	$PARAM_port='3306' ;

	// Le nom de votre base de données.
	$PARAM_nom_bd='minifacebook' ;

	// Nom d'utilisateur pour se connecter.
	$PARAM_utilisateur='adminMiniFacebook' ;

	// Mot de passe de l'utilisateur pour se connecter.
	$PARAM_mot_passe='Minif@ceb00k' ;

	// Essaye de faire ça.
	try {

		// Construit un nouvel objet "PDO".
		$connexion = new PDO (
			'mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, 
			$PARAM_utilisateur, 
			$PARAM_mot_passe);
	}

	// Si des erreurs aparaissent: Atrape-les et met 'Exception' dans '$e'.
	catch(Exception $e) {
		echo 'Erreur : ' .$e->getMessage(). '<br />';
		echo 'N° : ' .$e->getCode();
		return null;
	}

	return $connexion;
}



function insertHobby($hobby) {

	try {

		// Je me connecte à la base de données.
		$connexion = connexionBD();

		// On prépare notre requête.
		$requete_prepare = $connexion->prepare(
			"INSERT INTO Hobby (Type) values (:hobby)");

		// On exécute la requête en remplacant
		// :hobby par la valeur de $hobby.
		$requete_prepare->execute(
			array('hobby' => $hobby));
	}

	catch(Exception $e) {
		echo 'Erreur : ' .$e->getMessage(). '</br>';
		echo 'N° : ' .$e->getCode();
		return null;
	}

	return $hobby;
}



function insertMusique($style) {

	try {

		// Je me connecte à la base de données.
		$connexion = connexionBD();

		// On prépare notre requête.
		$requete_prepare = $connexion->prepare(
			"INSERT INTO Musique (Type) values (:musique)");

		// On exécute la requête en remplacant
		// :musique par la valeur de $style.
		$requete_prepare->execute(
			array('musique' => $style));
	}

	catch(Exception $e) {
		echo 'Erreur : ' .$e->getMessage(). '</br>';
		echo 'N° : ' .$e->getCode();
		return null;
	}

	return $style;
}



function insertPersonne($nom, $prenom, $url_photo, $date_naissance, $statut_couple) {

	try {

		$connexion = connexionBD();

		// On prépare notre requête.
		$requete_prepare = $connexion->prepare(
			"INSERT INTO Personne
			(Nom, Prenom, URL_Photo, Date_Naissance, Statut_couple)
			VALUES
			(:nom, :prenom, :url_photo, :date_naissance, :statut_couple)");


		// On exécute la requête en remplacant
		$requete_prepare->execute(
			array('nom' => $nom,
				'prenom' => $prenom,
				'url_photo' => $url_photo,
				'date_naissance' => $date_naissance,
				'statut_couple' => $statut_couple));
		}

		catch(Exception $e) {
			echo 'Erreur : ' .$e->getMessage(). '</br>';
			echo 'N° : ' .$e->getCode();
			return null;
		}
}



function selectAllHobbies() {

	$connexion = connexionBD();

	$requete_prepare = $connexion->prepare(
		"SELECT Type FROM Hobby");

	$requete_prepare->execute();

	$resultat = $requete_prepare->fetchALL(PDO::FETCH_ASSOC);

	echo "Hobbies:";

	return $resultat;
}
// Correction.
function selectAllHobbies2() {

	$connexion = connexionBD();

	$requete_prepare = $connexion->prepare(
		"SELECT Type FROM Hobby");

	$requete_prepare->execute();

	$resultat = $requete_prepare->fetchALL(PDO::FETCH_OBJ);

	echo "Hobbies:";

	return $resultat;
}



function selectAllMusic() {

	$connexion = connexionBD();

	$requete_prepare = $connexion->prepare(
		"SELECT Type FROM Musique");

	$requete_prepare->execute();

	$resultat = $requete_prepare->fetchALL(PDO::FETCH_ASSOC);

	echo "Musiques:";

	return $resultat;
}
// Correction.
function selectAllMusique2() {

	$connexion = connexionBD();

	$requete_prepare = $connexion->prepare(
		"SELECT Type FROM Musique");

	$requete_prepare->execute();

	$resultat = $requete_prepare->fetchALL(PDO::FETCH_OBJ);

	echo "Musique:</br>";

	return $resultat;
}



// Correction.
function selectPersonneById($id) {

	$connexion = connexionBD();

	$requete_prepare = $connexion->prepare(
		"SELECT * FROM Personne WHERE Id = :id"); 
		// Pas besoin de mettre ":id" entre () car c'est un SELECT et pas un INSERT.

	$requete_prepare->execute(array("id" => $id));

	$resultat = $requete_prepare->fetch(PDO::FETCH_OBJ);

	return $resultat;
}




// Correction.              input dans la barre de recherche.
function selectPersonneByNomPrenomLike($pattern) {

	$connexion = connexionBD();

	$requete_prepare = $connexion->prepare(
		"SELECT * FROM Personne
		WHERE Nom LIKE :nom
		OR Prenom LIKE :prenom");

	// Les % sont utilisé pour chercher ce qu'il y a avant ("%$pattern"),
	// ce qu'il y a après ("$pattern%")
	// ou ce qu'il y a autour ou dedans $pattern ("%$pattern%").
	$requete_prepare->execute(
			array("nom" => "%$pattern%",
				"prenom" => "%$pattern%"));

	$resultat = $requete_prepare->fetchALL(PDO::FETCH_OBJ);

	return $resultat;
}



function getPersonneHobby($personneId) {

	// Je me connecte à la base de données.
	$connexion = connexionBD();

	// Je prépare ma requete SQL.
	$requete_prepare = $connexion->prepare(
		"SELECT h.Type FROM Hobby h
		INNER JOIN RelationHobby rh ON rh.Hobby_Id = h.ID
		WHERE rh.Personne_Id = :id");

	// J'execute la requete en passant la valeur "id" dans $personneId.
	$requete_prepare->execute(
		array("id" => $personneId));

	// Je récupère le résultat des 2 lignes précédantes.
	$hobbies = $requete_prepare->fetchALL(PDO::FETCH_OBJ);


	// Je retourne/renvoie la liste des hobbies.
	return $hobbies;
}



function getPersonneMusique($personneId) {

	$connexion = connexionBD();

	$requete_prepare = $connexion->prepare(
		"SELECT m.Type FROM Musique m
		INNER JOIN RelationMusique rm ON rm.Musique_Id = m.ID
		WHERE rm.Personne_Id = :id");

	$requete_prepare->execute(
		array("id" => $personneId));

	$musiques = $requete_prepare->fetchALL(PDO::FETCH_OBJ);

	return $musiques;
}



/*
function getRelationPersonne($personneId) {

	$connexion = connexionBD();

	$requete_prepare = $connexion->prepare(
		"")

}
*/
?>