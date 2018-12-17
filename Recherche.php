<?php

require "connexion.php";

$appliBD = new Connexion();

$personnes = $appliBD->selectPersonneByNomPrenomLike("%%");

?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>VisageLibraire Recherche</title>
  
  <link rel="stylesheet" type="text/css" href="VLstyle.css">
  <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>


<body>

	<div id="title_invisible">
		<form method="GET" action="Index.php">
			<input id="title" type="submit" value="VisageLibraire">
		</form>
	</div>

	<div class="search">
			Recherche:

			<?php

			echo "<input id='search' type='search' name='Recherche' placeholder='Recherche'>";
			//echo "<input id='search' type='button' name='Recherche' value='🔍'>"

			?>
	</div>

	<div class="list">
		<table>
			<tr style="list-style-type:disc">
				<?php

				echo "<td>";
				echo "<ul>";

				foreach ($personnes as $personne) {

				echo "<li><a href='Profil.php?id=$personne->ID'>" . $personne->Prenom . " " . $personne->Nom . "</a></li>";

				}

				echo "</ul>";
				echo "</td>";


				echo "<td>";
				echo "<ul>";

				foreach ($personnes as $personne) {

				echo "<li><a href='Profil.php?id=$personne->ID'>" . $personne->Prenom . " " . $personne->Nom . "</a></li>";

				}

				echo "</ul>";
				echo "</td>";


				echo "<td>";
				echo "<ul>";

				foreach ($personnes as $personne) {

				echo "<li><a href='Profil.php?id=$personne->ID'>" . $personne->Prenom . " " . $personne->Nom . "</a></li>";

				}

				echo "</ul>";
				echo "</td>";


				echo "<td>";
				echo "<ul>";

				foreach ($personnes as $personne) {

				echo "<li><a href='Profil.php?id=$personne->ID'>" . $personne->Prenom . " " . $personne->Nom . "</a></li>";

				}

				echo "</ul>";
				echo "</td>";
				?>
			</tr>
		</table>
	</div>
</body>
</html>