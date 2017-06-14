<?php
for($i = 0; $i < count($tabTache); ++$i) {
    if ($tabTache[$i]["fait"]){
    	$tacheOK .= '<li><strike> ' . $tabTache[$i]["tache"] . '</strike></li>';
    } else {
    	$aFaire .= '<li><label class=""><input name="aFaire[]" type="checkbox" value="'. $tabTache[$i]["id"] . '"> ' . $tabTache[$i]["tache"] . '</label></li>';
    }
}

 ?>
