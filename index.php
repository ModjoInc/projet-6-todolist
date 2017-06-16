<?php require("lib/formulaire.php"); ?>
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
           <ul id="todoList">
           </ul>
        </div>
        <div class="archive">
          <h2>ARCHIVES</h2>
          <div class="archList">

        </div>
      </div>
      <form class="ajoutTache" action="" method="post" id="formAjout">
        <fieldset>
          <legend>Ajouter une tâche</legend>
          <input type="textarea" name="tache" id="tache">
          <button type="submit" form="formAjout" name="ajout" id="ajouter" value="ajouter" >Ajouter</button>
        </fieldset>
       </form>

     </section>
    <footer></footer>
    <script src="assets/app.js"></script>
  </body>
</html>
