<?php
//display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//fonction de sanitisation
function sanit($input) {
  $input = filter_var($input, FILTER_SANITIZE_STRING);
  $input = htmlspecialchars($input);
  $input = ltrim($input, " \t.");
  return $input;
}

//déclaration des variables
$message1 = "";
$aFaire = "";
$tacheOK = "";


$fichier = 'assets/todo.json';
$fichierJson = file_get_contents($fichier);
$tabTache = json_decode($fichierJson, true);
$date = date('d/m/Y H:i:s ', time());

// ajout de ma tâche

if (isset($_POST["ajout"])) {

  $tache = $_POST["tache"];
  $tachePropre = sanit($tache);

  if (!empty ($tache)) {
    //ouverture et ecriture JSON

    $tabTache[] =["date" => $date, "id" => count($tabTache), "tache" => $tachePropre, "fait" => false];

    //update fichier json
    $update = json_encode($tabTache, JSON_PRETTY_PRINT);
    file_put_contents($fichier, $update);
    // actualisation fichier json
    $fichierJson = file_get_contents($fichier);
    $tabTache = json_decode($fichierJson, true);


    $message1= "Tâche ajoutée";
    }
}
//passage de la tâche en statut FAIT
if (isset($_POST["enregistrer"])) {
    $fait = $_POST["aFaire"];
    // On prend l'id et on modifie la valeur de "fait"
  	foreach ($fait as $key => $value) {
  		$tabTache[$value] = ["date" => $date, "id" => $value, "tache" => $tabTache[$value]["tache"], "fait" => true];
    }
  	//On encode en json et on récrit le fichier
  	$update = json_encode($tabTache, JSON_PRETTY_PRINT);
  	file_put_contents($fichier, $update);

}
for($i = 0; $i < count($tabTache); ++$i) {
    if ($tabTache[$i]["fait"]){
    	$tacheOK .= '<li><label class="fait"><input name="tacheOk' . $tabTache[$i]["id"] . '" type="checkbox" ><del> ' . $tabTache[$i]["date"]. $tabTache[$i]["tache"] . '</del></label></li>';
    } else {
    	$aFaire .= '<li><label class="a faire"><input name="aFaire ' . $tabTache[$i]['id'] . '" type="checkbox" > ' . $tabTache[$i]["date"]. $tabTache[$i]["tache"] . '</label></li>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>TO DO LIST EN PHP</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <header><h1>My Todo List : version PHP+JSON</h1></header>
      <section>
        <div class="container">
          <div class="todo">
            <h2>A FAIRE</h2>
            <form class="enreTache" action="" method="post" id="formEnr">
             <div>
               <?php echo $message1; ?>
             </div>
             <div>
               <ul>
                 <?php echo $aFaire; ?>
               </ul>
             </div>
             <div class="rec">
               <button class="btn btn-lg btn-success" type="submit" name="enregistrer" value="update">ENREGISTRER</button>
             </div>
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

        <div class="formulaire">
         <form class="ajoutTache" action="" method="post" id="formAjout">

           <div>
             <input type="textarea" name="tache" id="tache">
           </div>
           <div>
             <button class="btn btn-lg btn-success" type="submit" form="formAjout" name="ajout" value="ajouter"><i class="fa fa-plus-square pull-left"></i>Ajouter<br>une tâche</button>
           </div>
         </form>
         </div>
        </div>
      </section>
    <footer>&copy; El Maaza Gomez Habib</footer>
    <!--<script src="assets/app.js"></script>-->
  </body>
</html>
