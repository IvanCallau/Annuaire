<?php

require "connexion.php";

$appliBD = new Connexion();

$id = $_GET["id"];

$personneMusique = $appliBD->getPersonneMusique($id);
$personne = $appliBD->selectPersonneById($id);
$pHobbies = $appliBD->getPersonneHobby($id);
$relations = $appliBD->getRelationPersonne($id);

?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>VisageLibraire</title>

  <link rel="stylesheet" type="text/css" href="VLstyle.css">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">

</head>
<body>

	<div class="profil_recherche">
		Recherche:
		<input id="search" type="text" name="Recherche" placeholder="Recherche">
	</div>

	<div id="title_invisible">
		<form method="GET" action="Index.php">
			<input id="title" type="submit" value="VisageLibraire">
		</form>
	</div>

	<div class="flex">
		<div class="info">
			<h2>Musique</h2>
			<div class="mini_ls">

				<?php

				echo "<ul class='espace'>";

				foreach ($personneMusique as $pMusiques) {

					echo "<li>" . $pMusiques->Type . "</li>";

				}

				echo "</ul>";

				?>

			</div>
		</div>
		<div class="profil">

			<?php

			echo "<img src='$personne->URL_Photo'>";

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
			<table>
				<td>
					<?php

					echo "<tr>";
					echo "<ul>";

					foreach ($relations as $personne) {

					echo "<li><a href='Profil.php?id=$personne->ID'>" . $personne->Prenom . " " . $personne->Nom . " " . $personne->Type ."</a></li>";

					}

					echo "</ul>";
					echo "</tr>";

					?>
				</td>
	  		</table>
	  	</div>
	</div>

</body>
</html>