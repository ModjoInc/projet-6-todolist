<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>TO DO LIST</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header></header>
    <?php include "assets/formulaire.php" ?>

      <section>


      <div class="todo">
        <h2>A FAIRE</h2>
        <form class="" action="" method="post">
          <label><input type="checkbox" name="checkB" id="">tache1</label>
        <div class="">
         <?php
          include "assets/contenu.php"
         ?>
        </div>

        </form>
        <button type="button" name="enregistrer">ENREGISTRER</button>
      </div>
      <div class="archive">
        <h2>ARCHIVES</h2>
        <div class="archList">

        </div>
      </div>
       <form class="ajoutTache" action="" method="post" id="formAjout">

         <label for="tache">Ajouter une Tâche</label><input type="text" name="tache" id="tache">
         <button type="submit" form="formAjout" name="ajout" >Ajouter</button>

       </form>

      </section>
    <footer></footer>


    <script src="lib/app.js"></script>
  </body>
</html>
