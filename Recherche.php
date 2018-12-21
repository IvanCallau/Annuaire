<?php

require "connexion.php";

$appliBD = new Connexion();

// Met la valeur de $pattern à rien.
$pattern = "";

// Empèche le navigateur d'afficher une erreur tout en incluant les 2 possibilitées: NULL et TRUE.
if (isset($_GET['Recherche'])) {
	// stocker la valeur
	$pattern = $_GET["Recherche"];
}

// La valeur donnée dans la barre de recherche est insérée dans le lein et permet de faire une recherche.
$personnes = $appliBD->selectPersonneByNomPrenomLike($pattern);

?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8"/>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>VisageLibraire Recherche</title>
  
  <link rel="stylesheet" type="text/css" href="VLstyle.css">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>


<body>
	<div id="center_title">
		<div id="title_invisible">
			<form method="GET" action="Index.php">
				<input id="title" type="submit" value="VisageLibraire">
			</form>
		</div>

		<form method="GET" action="Recherche.php">
			<div class="search">
					Recherche:
				<input id='search' type='search' name='Recherche' placeholder='Recherche'>
				<input id='search' type='submit' value='🔍'>
			</div>
		</form>
	</div>

	<div class="list">
		<?php

		$iP = 0;

		// Affiche le Nom/Prénom de toutes les Personnes dans la base de donnée et si une recherche est faite, modifie les résultat celon les inputs.
		foreach ($personnes as $personne) {

		echo "<a href='Profil.php?id=$personne->ID'>" . $personne->Prenom . " " . $personne->Nom . "</a>&nbsp;&nbsp;&nbsp;&nbsp;";

		$iP++;

			if ($iP % 4 == 0) {

				echo "</br>";

			}

		}

		?>
	</div>
</body>
</html>