<?php

class Connexion {

	private $connexion;

	public function __construct() {

		$PARAM_hote='localhost'; // Le chemin vers le serveur.
		$PARAM_port='3306'; // Le port de connexion à la base de données.
		$PARAM_nom_bd='minifacebook'; // Le nom de votre base de données.
		$PARAM_utilisateur='adminMiniFacebook'; // Nom d'utilisateur pour se connecter.
		$PARAM_mot_passe='Minif@ceb00k'; // Mot de passe de l'utilisateur pour se connecter.

		// Essaye de faire ça.
		try {
			// Construit un nouvel objet "PDO".
			$this->connexion = new PDO ('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
		}
		// Si des erreurs aparaissent: Atrape-les et met 'Exception' dans '$e'.
		catch(Exception $e) {
			echo 'Erreur : ' .$e->getMessage(). '<br />';
			echo 'N° : ' .$e->getCode();
			return null;
		}
	}

	// Getter sur l'atribut connexion.
	public function getConnexion() {

		return $this->connexion;

	}

	public function insertHobby($hobby) {

		try {

			$requete_prepare = $this->connexion->prepare(
				"INSERT INTO Hobby (Type) values (:hobby)");

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



	public function insertMusique($style) {

		try {
			// On prépare notre requête.
			$requete_prepare = $this->connexion->prepare(
				"INSERT INTO Musique (Type) values (:musique)");

			// On exécute la requête en remplacant :musique par la valeur de $style.
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



	public function insertPersonne($nom, $prenom, $url_photo, $date_naissance, $statut_couple) {

		try {
			// On prépare notre requête.
			$requete_prepare = $this->connexion->prepare(
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

			$id = $this->connexion->lastInsertId();

			return $id;
		}

		catch(Exception $e) {
			echo 'Erreur : ' .$e->getMessage(). '</br>';
			echo 'N° : ' .$e->getCode();
			return null;
		}
	}
/*
	public function insertPersonneHobbies($personneId, $hobbies) {

		try {
			foreach ($hobbies as $hobby) {
				$h_id = $connexion->getHobbyId($hobby);

				$requete_prepare = $this->connexion->prepare(
					"INSERT INTO RelationHobby
					(Personne_Id, Hobby_Id)
					VALUES
					(:p_id, :h_id)");

				$requete_prepare->execute(
				array('p_id' => $personneId,
					'h_id' => $h_id));
			}
		}

		catch(Exception $e) {
			echo 'Erreur : ' .$e->getMessage(). '</br>';
			echo 'N° : ' .$e->getCode();
			return null;
		}
	}

	private function getHobbyId($hobby) {

		try {
			$requete_prepare = $this->connexion->prepare("SELECT ID FROM Hobby WHERE Type = $hobby");

			$requete_prepare->execute();
		}
		catch(Exception $e) {
			echo 'Erreur : ' .$e->getMessage(). '</br>';
			echo 'N° : ' .$e->getCode();
			return null;
		}
	}

	private function insertPersonneHobby($personneId, $id) {


	}
*/
	public function selectAllHobbies() {

		$requete_prepare = $this->connexion->prepare(
			"SELECT Type FROM Hobby");

		$requete_prepare->execute();

		$resultat = $requete_prepare->fetchALL(PDO::FETCH_ASSOC);

		echo "Hobbies:";

		return $resultat;
	}
	// Correction.
	public function selectAllHobbies2() {

		$requete_prepare = $this->connexion->prepare(
			"SELECT * FROM Hobby");

		$requete_prepare->execute();

		$resultat = $requete_prepare->fetchALL(PDO::FETCH_OBJ);

		return $resultat;
	}



	public function selectAllMusic() {

		$requete_prepare = $this->connexion->prepare(
			"SELECT Type FROM Musique");

		$requete_prepare->execute();

		$resultat = $requete_prepare->fetchALL(PDO::FETCH_ASSOC);

		echo "Musiques:";

		return $resultat;
	}
	// Correction.
	public function selectAllMusique2() {

		$requete_prepare = $this->connexion->prepare(
			"SELECT * FROM Musique");

		$requete_prepare->execute();

		$resultat = $requete_prepare->fetchALL(PDO::FETCH_OBJ);

		return $resultat;
	}



	// Correction.
	public function selectPersonneById($personneId) {

		$requete_prepare = $this->connexion->prepare(
			"SELECT * FROM Personne WHERE Id = :id"); 
			// Pas besoin de mettre ":id" entre () car c'est un SELECT et pas un INSERT.

		$requete_prepare->execute(array("id" => $personneId));

		$resultat = $requete_prepare->fetch(PDO::FETCH_OBJ);

		return $resultat;
	}

/*
	public function getPersonneName($id) {

		$requete_prepare = $this->connexion->prepare(
			"SELECT Prenom, Nom FROM Personne WHERE Id = :id"); 

		$requete_prepare->execute(array("id" => $id));

		$resultat = $requete_prepare->fetch(PDO::FETCH_OBJ);

		return $resultat;
	}


	public function getPersonneDate($id) {

		$requete_prepare = $this->connexion->prepare(
			"SELECT Date_Naissance FROM Personne WHERE Id = :id");

		$requete_prepare->execute(array("id" => $id));

		$resultat = $requete_prepare->fetch(PDO::FETCH_OBJ);

		return $resultat;
	}
	


	public function getPersonneStatut($id) {

		$requete_prepare = $this->connexion->prepare(
			"SELECT Statut_couple FROM Personne WHERE Id = :id"); 

		$requete_prepare->execute(array("id" => $id));

		$resultat = $requete_prepare->fetch(PDO::FETCH_OBJ);

		return $resultat;
	}

*/


	// Correction.                     input dans la barre de recherche.
	public function selectPersonneByNomPrenomLike($pattern) {

		$requete_prepare = $this->connexion->prepare(
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



	public function getPersonneHobby($personneId) {

		// Je prépare ma requete SQL.
		$requete_prepare = $this->connexion->prepare(
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



	public function getPersonneMusique($personneId) {

		$requete_prepare = $this->connexion->prepare(
			"SELECT m.Type FROM Musique m
			INNER JOIN RelationMusique rm ON rm.Musique_Id = m.ID
			WHERE rm.Personne_Id = :id");

		$requete_prepare->execute(
			array("id" => $personneId));

		$musiques = $requete_prepare->fetchALL(PDO::FETCH_OBJ);

		return $musiques;
	}



	
	public function getRelationPersonne($personneId) {

		$requete_prepare = $this->connexion->prepare(
			"SELECT * FROM RelationPersonne rp
			INNER JOIN Personne p ON rp.Relation_Id = p.ID
			WHERE rp.Personne_ID = :id");

		$requete_prepare->execute(
			array("id" => $personneId));

		$relation = $requete_prepare->fetchALL(PDO::FETCH_OBJ);

		return $relation;

	}

}

?>