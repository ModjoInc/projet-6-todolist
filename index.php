<?php require "assets/formulaire.php" ?>
<?php require "assets/contenu.php" ?>
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
          <form class="enreTache" action="" method="post" id="formEnr">
           <div><?php
             echo $message1;
             ?>
           </div>
           <div>
             <ul>
             <?php echo $aFaire; ?>
           </ul>
           </div>
          <button type="submit" name="enregistrer" value="update">ENREGISTRER</button>
        </form>
      </div>

      <div class="archive">
        <h2>ARCHIVES</h2>
        <div class="archList">
          <ul>
         <?php echo $tacheOK; ?>
       </ul>
        </div>
      </div>
       <form class="ajoutTache" action="" method="post" id="formAjout">
         <label for="tache">Ajouter une Tâche</label><input type="textarea" name="tache" id="tache">
         <button type="submit" form="formAjout" name="ajout" value="ajouter" >Ajouter</button>
       </form>
      </section>
    <footer></footer>
    <!--<script src="lib/app.js"></script>-->
  </body>
</html>
