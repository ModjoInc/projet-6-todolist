<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>TO DO LIST</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body onload="changeClass();">
    <header></header>
      <section>
        <div class="addTodo">
          <div class="listFa">
          <i class="fa fa-plus-circle fa-5x" aria-hidden="true"></i>
          </div>
           <form class="form-inline" action="todo_post.php" method="post" id="formAjout">
             <div class="form-group">
             <input type="text" name="tache" id="tache">
             </div>
             <div class="form-group">
             <input class="btn btn-primary" type="submit" value="Ajouter">
             </div>
            </form>
         </div>
        <div class="todo">
          <div class="listFa">
            <i class="fa fa-list fa-2x" aria-hidden="true"></i>
          </div>
          <?php
          error_reporting(E_ALL);
          ini_set('display_errors', 1);
          //connexion à la BD
            try {
              $bd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'mvdtvw28');
            } catch(exception $e) {
              die('Erreur: ' . $e->getMessage());
            }

            //récupération des derniers messages
            $result = $bd->query('SELECT tache, ID, date FROM todo_list ORDER BY date DESC');

            //affichage de chaque message
            echo '<ul>';
            while($donnees = $result->fetch()) {
              echo '<li>' . htmlspecialchars($donnees['tache']) . ' <small>/ Ajoutée le '. $donnees['date'] . '</small></li>';
            }
            echo '</ul>';
            $result->closeCursor();

          ?>

          <ul class="archives">
            <div class="listFa">
            <i class="fa fa-check-square fa-4x" aria-hidden="true"></i>
            </div>
            <li class="arch"></li>
          </ul>
        </div>
      </section>
    <footer></footer>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script>
    <script src="app.js"></script>
  </body>
</html>
