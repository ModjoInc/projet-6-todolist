<?php
function sanit($input) {
  $input = filter_var($input, FILTER_SANITIZE_STRING);
  $input = htmlspecialchars($input);
  $input = ltrim($input, " \t.");
  return $input;
}

$tache = $_POST["tache"];
$tachePropre = sanit($tache);

if (isset($tache)) {
  if (!empty ($tache)) {

  //ouverture et ecriture JSON
    $fichier = 'todo.json';
    $tabTache =[];
    $fichierJson = file_get_contents($fichier);

    $tabTache = json_decode($fichierJson);

    /*foreach ($variable as $key => $value) {
      if $value==
      # code...
    }*/

    array_push($tabTache, $tachePropre, $id);
    print_r($tabTache);
    $update = json_encode($tabTache);

    file_put_contents($fichier, $update);

    $message1= "Tâche ajoutée";

  } else {

    $message1= "Veuillez ajouter une tâche";

  }


}
 ?>
