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

        foreach ($musiques as $m) {

          echo "<input id='checkbox" . "$iM+1' type='checkbox' name='musiques[]' value=" . $m->ID . "><label for='checkbox" . "$iM+1'>" . $m->Type . "</label>&nbsp;&nbsp;&nbsp;";

          $iM++;

          if ($iM % 6 == 0) {

            echo "</br></br>";

          }
        }
          
        ?>

      </div>

      <div id="hobbies">
        <h2>Hobbies:</h2>

        <?php

        $iH = 500;

        foreach ($hobbies as $hobby) {

          echo "<input id='checkbox" . "$iH+1' type='checkbox' name='hobbies[]' value=" . $hobby->ID . "><label for='checkbox" . "$iH+1'>" . $hobby->Type . "</label>&nbsp;&nbsp;&nbsp;";

          $iH++;

          if ($iH % 5 == 0) {

            echo "</br></br>";

          }
        }

        ?>

        </div>

        <div id="other-contacts">
          <h2>Contacts:</h2>

          <?php

          $iC = 2000;

          foreach ($personnes as $persone) {

            echo "<input id='checkbox" . "$iC+1' type='checkbox' name='contacts[]' value=" . $persone->ID . " onclick=toggleRequired(" . $persone->ID . ")><label for='checkbox" . "$iC+1'>" . $persone->Prenom . " " . $persone->Nom . "</br><input id='relation" . $persone->ID . "' type='text' name=" . $persone->ID . "></br></label></br></br>";

            $iC++;

          }
          
          ?>
          
        </div>

        <div id="create-account">
          <input type="SUBMIT" name="createprofile" value="Créer profil">
        </div>
    </form>
  </div>

  <script type="text/javascript">
    
    function toggleRequired(personeId) {

      var textInput = document.getElementById("relation"+personeId);

      if (textInput.hasAttribute('required') !== true) {
        textInput.setAttribute('required','required');
      }
      else {
        textInput.removeAttribute('required');  
      }
    }
  </script>

</body>
</html>