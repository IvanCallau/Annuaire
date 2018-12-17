<?php

require "connexion.php";

$appliBD = new Connexion();

$musiques = $appliBD->selectAllMusique2();
$hobbies = $appliBD->selectAllHobbies2();

?>

<!doctype html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>VisageLibraire - Nouveau profil</title>

  <link rel="stylesheet" type="text/css" href="VLstyle.css" />
  <link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700" rel="stylesheet">

</head>

<body>

<div id="title_invisible">
    <form method="POST" action="Index.php">
      <input id="title" type="submit" value="VisageLibraire">
    </form>
  </div>

  <div id="formulaire">
    <form method="POST" action="Inscription.php">
      <div class="inquiry">
        <input id="bouton1" type="radio" name="gender[]">
        <label for="bouton1">
          Homme
        </label>
        <input id="bouton2" type="radio" name="gender[]">
        <label for="bouton2">
          Femme
        </label>
        <input id="bouton3" type="radio" name="gender[]" checked>
        <label for="bouton3">
          Non spécifié
        </label>
      </div>

      <div class="inquiry">
        Nom:
        <input id="lastname" type="text" name="lastname" required>
      </div>

      <div class="inquiry">
        Prénom:
        <input id="firstname" type="text" name="firstname" required>
      </div>
 
      <div class="inquiry">
        Date de naissance:
        <input type="date" name="anniversaire">
      </div>

      <div class="inquiry">
        <input id="bouton4" type="radio" name="status" value="En Couple">
        <label for="bouton4">
          En Couple
        </label>
        <input id="bouton5" type="radio" name="status" value="Célibataire">
         <label for="bouton5">
          Célibataire
        </label>
        <input id="bouton6" type="radio" name="status" value="Non Défini" checked>
        <label for="bouton6">
          Non Défini
        </label>
      </div>

      <div class="inquiry">
        Photo de profil:
        <input id="profile-pic" type="url" name="photo_URL" value="default.jpg" placeholder="URL de l'image">
      </div>

      <div id="music">
        <h2>Musique:</h2>

        <?php

        $iM = 0;

        foreach ($musiques as $m) {

          echo "<input id='checkbox" . "$iM+1' type='checkbox' name='musiques[]' value=" . $m->ID . "><label for='checkbox" . "$iM+1'>" . $m->Type . "</label>";

          $iM++;

        }

        ?>

      </div>

      <div id="hobbies">
        <h2>Hobbies:</h2>

        <?php

        $iH = 50;

        foreach ($hobbies as $hobby) {

          echo "<input id='checkbox" . "$iH+1' type='checkbox' name='hobbies[]'><label for='checkbox" . "$iH+1'>" . $hobby->Type . "</label>";

          $iH++;

        }

        ?>

        </div>

        <div id="other-contacts">
          <h2>Contacts:</h2>

          <?php

          $iC = 200;

          echo "<td>";
          echo "<input id='checkbox17' type='checkbox' name='contacts[]'>";
          echo "<label for='checkbox17'>";
          echo "Lorem";
          echo "</label>";
          echo "</td>";
          echo "<td>";
          echo "<input id='checkbox18' type='checkbox' name='contacts[]'>";
          echo "<label for='checkbox18'>";
          echo "Ipsum";
          echo "</label>";
          echo "</td>";
          echo "<td>";
          echo "<input id='checkbox19' type='checkbox' name='contacts[]'>";
          echo "<label for='checkbox19'>";
          echo "Dolor";
          echo "</label>";
          echo "</td>";
          echo "<td>";
          echo "<input id='checkbox20' type='checkbox' name='contacts[]'>";
          echo "<label for='checkbox20'>";
          echo "Sit";
          echo "</label>";
          echo "</td>";
          echo "<td>";
          echo "<input id='checkbox21' type='checkbox' name='contacts[]'>";
          echo "<label for='checkbox21'>";
          echo "Amet";
          echo "</label>";
          echo "</td>";
          echo "<td>";
          echo "<input id='checkbox22' type='checkbox' name='contacts[]'>";
          echo "<label for='checkbox22'>";
          echo "Consectetur";
          echo "</label>";
          echo "</td>";
          echo "<td>";
          echo "<input id='checkbox23' type='checkbox' name='contacts[]'>";
          echo "<label for='checkbox23'>";
          echo "Adipiscing";
          echo "</label>";
          echo "</td>";
          echo "<td>";
          echo "<input id='checkbox24' type='checkbox' name='contacts[]'>";
          echo "<label for='checkbox24'>";
          echo "Elit";
          echo "</label>";
          echo "</td>";

          $iC++;

          ?>
          
        </div>

        <div id="create-account">
          <input type="SUBMIT" name="createprofile" value="Créer profil">
        </div>
    </form>
  </div>

</body>
</html>