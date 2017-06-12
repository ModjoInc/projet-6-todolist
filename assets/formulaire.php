<?php
$tache = $_POST["tache"];
$tache = htmlspecialchars($tache);
$tache = ltrim($tache, " \t.");
$fichier = 'todo.json';

if (isset($tache) ) {
  //ajout de la tache à json
  $jsonTache = json_encode($tache);
  file_put_contents($fichier, $jsonTache, FILE_APPEND);

} else {
  echo "Vous n'avez pas ajouter de tâche";
}


 ?>
