<?php

//boucle affichant les tâches selon leur statut
for($i = 0; $i < count($tabTache); ++$i) {
    if ($tabTache[$i]["fait"]){
    	$tacheOK .= '<li><del> ' . $tabTache[$i]["tache"] . '</del></li>';
    } else {
    	$aFaire .= '<li><label class=""><input name="aFaire[]" type="checkbox" value="'. $tabTache[$i]["id"] . '"> ' . $tabTache[$i]["tache"] . '</label></li>';
    }
}

 ?>
