<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
  $bd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'mvdtvw28');
} catch(exception $e) {
  die('Erreur: ' . $e->getMessage());
}


$request = $bd->prepare('INSERT INTO todo_list (tache) VALUES( ? )');

$request->execute(array($_POST['tache']));

header('location: index.php');

 ?>
