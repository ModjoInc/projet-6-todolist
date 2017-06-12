<?php
/* Récupération du contenu du fichier .json */
$contenu_fichier_json = file_get_contents('todo.json');
/* Les données sont récupérées sous forme de tableau (true) */
$tr = json_decode($contenu_fichier_json, true);
echo $tr;


 ?>
