<?php
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
$tacheOK="";
$annu = "";

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
  		$tabTache[$value] = ["id" => $value, "tache" => $tabTache[$value]["tache"], "fait" => true];
    }
  	//On encode en json et on récrit le fichier
  	$tabTache = json_encode($tabTache, JSON_PRETTY_PRINT);
  	file_put_contents($fichier, $tabTache);


  	$fichier_json = file_get_contents($fichier);
  	$tabTache = json_decode($fichier_json, true);
}

//annuler tâche ********ne fonctionne pas**********
/*
if (isset($_POST["annuler"])) {
  $annu = $_POST["aFaire"];
  foreach ($annu as $key => $value) {
    $tabTache[$value] = ["id" => $value, "tache" => $tabTache[$value]["tache"], "fait" => false];
  }

  $tabTache = json_encode($tabTache, JSON_PRETTY_PRINT);
  file_put_contents($fichier, $tabTache);

  $fichier_json = file_get_contents($fichier);
  $tabTache = json_decode($fichier_json, true);
}*/
?>
