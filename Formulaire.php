<?php

require "connexion.php";

$appliBD = new Connexion();

$musiques = $appliBD->selectAllMusique2();
$hobbies = $appliBD->selectAllHobbies2();
$personnes = $appliBD->selectAllPersonnes();

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
        <input type="date" name="anniversaire" required>
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
        <input id="profile-pic" type="url" name="photo_URL" placeholder="URL de l'image" required>
      </div>

      <div id="musics">
        <h2>Musique:</h2>

        <?php

        $iM = 0;
/*
        function tableauMusique($taille, $colone) {

          for($i = 0 ; $i < $taille ; $i++) {

            for($j = 0 ; $j < $colone ; $j++) {

              foreach ($musiques as $m) {
                echo "<input id='checkbox" . "$iM+1' type='checkbox' name='musiques[]' value=" . $m->ID . "><label for='checkbox" . "$iM+1'>" . $m->Type . "</label><br><br>";
                $iM++;
              }
            }
          }
        }

        tableauMusique()
*/
        ?>

      </div>

      <div id="hobbies">
        <h2>Hobbies:</h2>

        <?php

        $iH = 50;

        foreach ($hobbies as $hobby) {

          echo "<input id='checkbox" . "$iH+1' type='checkbox' name='hobbies[]' value=" . $hobby->ID . "><label for='checkbox" . "$iH+1'>" . $hobby->Type . "</label><br><br>";

          $iH++;

        }

        ?>

        </div>

        <div id="other-contacts">
          <h2>Contacts:</h2>

          <?php

          $iC = 200;

          foreach ($personnes as $persone) {

            echo "<input id='checkbox" . "$iC+1' type='checkbox' name='contacts[]' valeur=" . $persone->ID . "><label for='checkbox" . "$iC+1'>" . $persone->Prenom . " " . $persone->Nom . "<input id='relation' type='text' name='relation' required></label></br></br>";

            $iC++;

          }
          
          ?>
          
        </div>

        <div id="create-account">
          <input type="SUBMIT" name="createprofile" value="Créer profil">
        </div>
    </form>
  </div>

</body>
</html>