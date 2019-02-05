<?php

require "connexion.php";

$appliBD = new Connexion();

// Donne sa valeur $id selon la valeur envoyée sur %?id="$id" dans le lien ET permet au reste des $appliBD de fonctionner.
$id = $_GET["id"];

$personneMusique = $appliBD->getPersonneMusique($id);
$personne = $appliBD->selectPersonneById($id);
$pHobbies = $appliBD->getPersonneHobby($id);
$relations = $appliBD->getRelationPersonne($id);

?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8"/>
  <meta http-equiv="x-ua-compatible" content="ie=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <title>VisageLibraire</title>

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
	</div>

	<div class="flex">
		<div class="info">
			<h2>Musique</h2>
			<div class="mini_ls">

				<?php

				echo "<ul class='espace'>";

				// Affiche les musiques que la personne a séléctionné dans la base de données et qui se trouvent dans RelationMusique.
				foreach ($personneMusique as $pMusiques) {

					echo "<li>" . $pMusiques->Type . "</li>";

				}

				echo "</ul>";

				?>

			</div>
		</div>
		<div class="profil">

			<?php

			// Prend les informations dans la table Personne selon l'ID.
			echo "<img id='foo' src='$personne->URL_Photo' onerror='standby()'>";

			echo "<p>" . $personne->Prenom . " " . $personne->Nom . "</p>";

			echo "<p>" . $personne->Date_Naissance . "</p>";

			echo "<p>" . $personne->Statut_couple . "</p>";

			?>

		</div>
		<div class="info">
			<h2>Hobbies</h2>
			<div class="mini_ls">

				<?php

				echo "<ul class='espace'>";

				// Affiche les hobbies comme pour musiques.
				foreach ($pHobbies as $pHobby) {

					echo "<li>" . $pHobby->Type . "</li>";

				}

				echo "</ul>";

				?>

			</div>
		</div>
	</div>

	<div class="cont">
		<h2 class="contacts">Contacts</h2>
		<div class="ls_ct">
			<?php

			$iP = 0;

			// Même principe que le reste, prend les valeurs du tableau RelationPersonne selon l'ID du propriétaire du Profil et affiche le Nom/Prénom et le type de relation entre les 2.
			foreach ($relations as $personne) {

				echo "<a href='Profil.php?id=$personne->ID'>" . $personne->Prenom . " " . $personne->Nom ."&nbsp;/&nbsp;" . $personne->Type ."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

				$iP++;

				if ($iP % 2 === 0) {

					echo "</br></br>";

				}

			}

			?>
	  	</div>
	</div>

	<!-- Fonction qui permet de mettre une image par défaut dans les cas où la photo ne s'afficherait pas. -->
	<script type="text/javascript">

		function standby() {
    		document.getElementById('foo').src = 'default.jpg'

		}

	</script>


</body>
</html>