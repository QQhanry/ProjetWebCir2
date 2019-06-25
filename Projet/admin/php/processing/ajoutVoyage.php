<?php
include('../database/request.php');

if(isset($_POST["libelle"])){
    $nouveauvoyage = new voyage();

    $nouveauvoyage->setLibelle($_POST['libelle'])  ;
    $nouveauvoyage->setDescription($_POST['description'])  ;
    $nouveauvoyage->setDuree($_POST['duree']) ;
    $nouveauvoyage->setCout($_POST['cout']) ;
    $nouveauvoyage->setReference($_POST['reference']) ;
    $nouveauvoyage->setCodePays($_POST['code_pays']);

    ajoutVoyage($nouveauvoyage);


}

header('Location: ../../Recherche.php');
exit();
