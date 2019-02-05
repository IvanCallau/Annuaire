<?php

require "connexion.php";

$appliBD = new Connexion();

// Prend toute les information de chaque tableau: Musique, Hobby et Personnes.
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
  <div id="center_title">
    <div id="title_invisible">
      <form method="POST" action="Index.php">
        <input id="title" type="submit" value="VisageLibraire">
      </form>
    </div>
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
        <h3>Nom:</h3>
        <input id="lastname" type="text" name="lastname" required>
      </div>

      <div class="inquiry">
        <h3>Prénom:</h3>
        <input id="firstname" type="text" name="firstname" required>
      </div>
 
      <div class="inquiry">
        <h3>Date de naissance:</h3>
        <input type="date" name="anniversaire" required>
      </div>

      <div class="inquiry">
        <h3>Status:</h3>
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
        <h3>Photo de profil:</h3>
        <input id="profile-pic" type="url" name="photo_URL" placeholder="URL de l'image" required>
      </div>

      <div class="choix">
        <h3  class="insertions">Musique:</h3>
        <p class="instructions">(Vous aimez une de ses musiques? Cocher sa case et soyez gêné par vos goût douteux.)</p></br>

        <?php

        $iM = 0;

        // Affiche toutes les musiques, 6 par ligne.
        foreach ($musiques as $m) {

          echo "<input id='checkbox" . "$iM+1' type='checkbox' name='musiques[]' value=" . $m->ID . "><label for='checkbox" . "$iM+1'>" . $m->Type . ".</label>&nbsp;&nbsp;&nbsp;";

          $iM++;

          if ($iM % 6 == 0) {

            echo "</br></br>";

          }
        }
          
        ?>

      </div>

      <div class="choix">
        <h3  class="insertions">Hobbies:</h3>
        <p class="instructions">(Vous avez un de ses hobby? Cocher sa case et montrer les à tous.)</p></br>

        <?php

        $iH = 500;

        // Affiche tout les hobbies, 5 par ligne.
        foreach ($hobbies as $hobby) {

          echo "<input id='checkbox" . "$iH+1' type='checkbox' name='hobbies[]' value=" . $hobby->ID . "><label for='checkbox" . "$iH+1'>" . $hobby->Type . ".</label>&nbsp;&nbsp;&nbsp;";

          $iH++;

          if ($iH % 5 == 0) {

            echo "</br></br>";

          }
        }

        ?>

        </div>

        <div class="choix">
          <h3 class="insertions">Connaissances:</h3>
          <p class="instructions">(Vous voyez un nom famillier? Cocher sa case et entrer votre type de relation.)</p></br>

          <?php

          $iC = 2000;

          // Affiche toutes les personnes  sur 2 colonnes, ainsi qu'une barre pour taper le type de relation SI la case à été cochée.
          foreach ($personnes as $persone) {

            echo "<input id='checkbox" . "$iC+1' type='checkbox' name='contacts[]' value=" . $persone->ID . " onclick=toggleRequired(" . $persone->ID . ")><label for='checkbox" . "$iC+1'>" . $persone->Prenom . " " . $persone->Nom . ":&nbsp;&nbsp;<input id='relation'" . $persone->ID . "' type='text' name='typeRelation[".$persone->ID."]'></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

            $iC++;

            if ($iC % 2 == 0) {

              echo "</br></br>";

            }

            //Force plus d'espace sur certaines longueurs de noms pour un affichage plus propre.
            if (strlen($persone->Nom) + strlen($persone->Prenom) === 7) {

              echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

            }
            elseif (strlen($persone->Nom) + strlen($persone->Prenom) === 12) {

              echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

            }
          }
          
          ?>
          
        </div>

        <div>
          <input id="create-account" type="SUBMIT" name="createprofile" value="Créer profil">
        </div>
    </form>
  </div>

  <!-- Fonction qui transforme les barres sous les personnes en "required" si la case à coté du nom à été cochée ET enlève le required si la case est décochée. -->
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