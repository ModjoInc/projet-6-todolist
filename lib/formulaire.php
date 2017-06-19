<?php
//fonction de sanitisation
function sanit($input) {
  $input = filter_var($input, FILTER_SANITIZE_STRING);
  $input = htmlspecialchars($input);
  $input = ltrim($input, " \t.");
  return $input;
}
//définition des variables
$message1 = "";
$aFaire = "";
$tacheOK="";

$fichier = 'todo.json';
$fichierJson = file_get_contents($fichier);
$tabTache = json_decode($fichierJson, true);

//ajout de la tâche au fichier Json
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
    //affichage d'un message selon le statut d'avancement
    $message1= "Tâche ajoutée";
    } else {
      echo "en attente";
    }
}
//ajout de la fonction d'enregistrement et modification du statut FAIT
if (isset($_POST["enregistrer"])) {
    $fait = $_POST["aFaire"];
    // parcourir le tableau des données et selon l'id correspondant modifier la valeur de FAIT
  	foreach ($fait as $key => $value) {
  		$tabTache[$value] = ["id" => $value, "tache" => $tabTache[$value]["tache"], "fait" => true];
    }
  	//encodage du nouveau statut et écriture dans le fichier Json
  	$tabTache = json_encode($tabTache, JSON_PRETTY_PRINT);
  	file_put_contents($fichier, $tabTache);

  	// actualisation du fichier Json
  	$fichier_json = file_get_contents($fichier);
  	$tabTache = json_decode($fichier_json, true);

}


?>
