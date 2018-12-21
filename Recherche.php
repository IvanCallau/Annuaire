<?php

require "connexion.php";

$appliBD = new Connexion();

$pattern = "";

$personnes = $appliBD->selectPersonneByNomPrenomLike("%%");
$recherche = $appliBD->selectPersonneByNomPrenomLike("GET");

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

	<div id="title_invisible">
		<form method="GET" action="Index.php">
			<input id="title" type="submit" value="VisageLibraire">
		</form>
	</div>

	<form method="GET" action="Recherche.php">
		<div class="search">
				Recherche:

				<?php

				echo "<input id='search' type='search' name='Recherche' placeholder='Recherche'>";
				echo "<input id='search' type='button' name='Recherche' value='🔍'>"

				if ($_GET["Recherche"] != NULL) {
					// stocker la valeur
					$pattern = $personnes;
				}

				?>
		</div>
	</form>

	<div class="list">
		<?php

		$iP = 0;

		foreach ($personnes as $persone) {

		echo "<a href='Profil.php?id=$persone->ID'>" . $persone->Prenom . " " . $persone->Nom . "</a>&nbsp;&nbsp;&nbsp;&nbsp;";

		$iP++;

			if ($iP % 4 == 0) {

				echo "</br>";

			}

		}

		?>
	</div>
</body>
</html>