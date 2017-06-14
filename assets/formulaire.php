<?php
function sanit($input) {
  $input = filter_var($input, FILTER_SANITIZE_STRING);
  $input = htmlspecialchars($input);
  $input = ltrim($input, " \t.");
  return $input;
}

$message1 = "";
$aFaire = "";
$tacheOK="";

$fichier = 'todo.json';
$fichierJson = file_get_contents($fichier);
$tabTache = json_decode($fichierJson, true);

if (isset($_POST["ajout"])) {

  $tache = $_POST["tache"];
  $tachePropre = sanit($tache);

  if (!empty ($tache)) {
    //ouverture et ecriture JSON
    $tabTache[] =["id" => count($tabTache), "tache" => $tachePropre, "fait" => false];
    //update fichier json
    $update = json_encode($tabTache, JSON_PRETTY_PRINT);
    file_put_contents($fichier, $update);
    // actualisation fichier json
    $fichierJson = file_get_contents($fichier);
    $tabTache = json_decode($fichierJson, true);

    $message1= "Tâche ajoutée";
    } else {
      echo "en attente";
    }
}

if (isset($_POST["enregistrer"])) {
    $fait = $_POST["aFaire"];
    // On prend l'id et on modifie la valeur de "done"
  	foreach ($fait as $key => $value) {
  		$tabTache[$value] = ["id" => $value, "tache" => $tabTache[$value]["tache"], "fait" => true];
    }
  	//On encode en json et on récrit le fichier
  	$tabTache = json_encode($tabTache, JSON_PRETTY_PRINT);
  	file_put_contents($fichier, $tabTache);

  	// On va rechercher le fichier pour qu'il s'actualise //
  	$fichier_json = file_get_contents($fichier);
  	$tabTache = json_decode($fichier_json, true);

}


?>
