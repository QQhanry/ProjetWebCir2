<?php
require_once('connexion.php');
require_once ("php/class/voyage.php");

// CRUD pays

function ajoutPays($pays){ //Ajout d'un pays dans la base
    $db = dbConnect();

    $statement = $db->prepare('INSERT INTO pays(code_pays) VALUES (:code_pays)');
    $statement->bindParam(':code_pays',$pays);
    $statement->execute();
}

function affichePays($pays = null){            //Affichage d'un ou de tous les pays dans la base
    $db = dbConnect();

    $request= 'select * FROM pays';
    $statement= $db->prepare($request);
    $statement->execute();
    $result = $statement ->fetchAll();

    return $result;
}

function supprimePays($pays){         //Suppression d'un pays dans la base
    $db = dbConnect();

    $statement = $db->prepare('DELETE FROM pays WHERE code_pays = :code_pays');
    $statement->bindParam(':code_pays',$pays);
    $statement->execute();
}






//CRUD voyage

function ajoutVoyage($voyage){
    $db = dbConnect();


    $libelle =$voyage->getLibelle();
    $description = $voyage->getDescription();
    $duree = $voyage->getDuree();

    $cout = $voyage->getCout();
    $reference = $voyage->getReference();
    $code_pays = $voyage->getCodePays();
   // $image = './qsgs';

    echo $libelle;
    echo $description;
    echo $duree;
    echo $cout;
    echo $reference;
    echo $code_pays;
  //  echo $image;

    $statement = $db->prepare('INSERT INTO voyage(libelle,description,duree,cout,ref,code_pays) VALUES (:libelle,:descript,:duree,:cout,:ref,:code_pays)');
    $statement->bindParam(':libelle',$libelle);
    $statement->bindParam(':descript',$description);
    $statement->bindParam(':cout',$cout);
    $statement->bindParam(':duree',$duree);
    $statement->bindParam(':ref',$reference);
    $statement->bindParam(':code_pays',$code_pays);
  //  $statement->bindParam(':image',$image);
    $statement->execute();
    return true;
}


function afficheVoyage($reference = ""){
    $db = dbConnect();
    $voyage = new voyage();


    if($reference != ""){
        $statement = $db->prepare('SELECT * FROM voyage WHERE ref = :ref');
        $statement->bindParam(':ref',$reference);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        $voyage->setLibelle($result[0]["libelle"]);
        $voyage->setDescription($result[0]["description"]);
        $voyage->setDuree($result[0]["duree"]);
        $voyage->setCout($result[0]["cout"]);
        $voyage->setReference($reference);
        $voyage->setCodePays($result[0]["code_pays"]);
        //$voyage->setImage($result[0]["image"]);

        echo $result[0]["libelle"];
        echo $result[0]["description"];
        echo $result[0]["duree"];
        echo $result[0]["cout"];
        echo $result[0]["ref"];
        echo $result[0]["code_pays"];
        //echo $result[0]["image"];

    }else {
        $statement = $db->prepare('SELECT * FROM voyage');
        $statement->execute();
        $result = $statement->fetchAll();

       /* $nombre = $db->prepare('SELECT COUNT(*) FROM voyage');
        $nombre->execute();
        $nombre = $nombre->fetchAll(PDO::FETCH_ASSOC);
        echo $nombre;*/


        /*for($i=0;$i<10;$i++){
            echo $result[$i]["libelle"];
            echo $result[$i]["description"];
            echo $result[$i]["duree"];
            echo $result[$i]["cout"];
            echo $result[$i]["ref"];
            echo $result[$i]["code_pays"];
            //echo $result[$i]["image"];
        }*/
    }


    return $result;
}

function updateVoyage($voyage){
    $db = dbConnect();

    $libelle =$voyage->getLibelle();
    $description = $voyage->getDescription();
    $duree = $voyage->getDuree();
    $cout = $voyage->getCout();
    $reference = $voyage->getReference();
    $code_pays = $voyage->getCodePays();


    $statement = $db->prepare('UPDATE voyage SET libelle = :libelle,description = :description,cout = :cout,duree = :duree,ref = :ref,code_pays=:code_pays WHERE ref = :ref');
    $statement->bindParam(':libelle',$libelle);
    $statement->bindParam(':description',$description);
    $statement->bindParam(':cout',$cout);
    $statement->bindParam(':duree',$duree);
    $statement->bindParam(':ref',$reference);
    $statement->bindParam(':code_pays',$code_pays);
    $statement->execute();

}
function supprimeVoyage($reference){
    $db = dbConnect();

    $statement = $db->prepare('DELETE FROM voyage WHERE ref = :ref');
    $statement->bindParam(':ref',$reference);
    $statement->execute();

}





//CRUD réservation

function afficheVoyageValide(){
    $db = dbConnect();


    $statement = $db->prepare('SELECT * FROM voyage,inscription WHERE voyage.ref = inscription.ref AND inscription.validation = 2');
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    echo "coucou";
    return $result;
}

function afficheVoyageEnValidation(){
    $db = dbConnect();

    $statement = $db->prepare('SELECT * FROM voyage,inscription WHERE voyage.ref = inscription.ref AND inscription.validation = 1');
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}


function updateReservation($reference){
    $db = dbConnect();


    $statement = $db->prepare('UPDATE inscription set validation = 1 WHERE ref = :ref ');
    $statement->bindParam(':ref',$reference);
    $statement->execute();

}