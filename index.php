<?php include "assets/formulaire.php" ?>
<?php include "assets/contenu.php" ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>TO DO LIST</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header></header>
      <section>
        <div class="todo">
          <h2>A FAIRE</h2>
          <form class="" action="" method="post">
           <?php echo $message1; ?>
          <div class="">

          </div>
          <button type="button" name="enregistrer">ENREGISTRER</button>
        </form>
      </div>

      <div class="archive">
        <h2>ARCHIVES</h2>
        <div class="archList">

        </div>
      </div>
       <form class="ajoutTache" action="" method="post" id="formAjout">

         <label for="tache">Ajouter une Tâche</label><input type="textarea" name="tache" id="tache">
         <button type="submit" form="formAjout" name="ajout" >Ajouter</button>

       </form>

      </section>
    <footer></footer>


    <!--<script src="lib/app.js"></script>-->
  </body>
</html>
