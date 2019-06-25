<?php

include('../database/request.php');

$voyage = new voyage();
$voyage->setLibelle($_POST['libelle'])  ;
$voyage->setDescription($_POST['description'])  ;
$voyage->setDuree($_POST['duree']) ;
$voyage->setCout($_POST['cout']) ;
$voyage->setReference($_POST['reference']);
$voyage->setCodePays($_POST['code_pays']);

if(isset($_POST["reference"])){

    updateVoyage($voyage);
}

header('Location: ../../Recherche.php');
exit();
