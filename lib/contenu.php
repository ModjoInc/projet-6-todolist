<?php
for($i = 0; $i < count($tabTache); ++$i) {
    if ($tabTache[$i]["fait"]){
    	$tacheOK .= '<li><label class="' . $tabTache[$i] . '"><input name="tacheOk[]" type="checkbox" value="'. $tabTache[$i]["id"] . '">'. '<del> ' . $tabTache[$i]["date"]. $tabTache[$i]["tache"] . '</del></label></li>';
    } else {
    	$aFaire .= '<li><label class="' . $tabTache[$i] . '"><input name="aFaire[]" type="checkbox" value="'. $tabTache[$i]["id"] . '"> ' . $tabTache[$i]["date"]. $tabTache[$i]["tache"] . '</label></li>';
    }
}
?>
