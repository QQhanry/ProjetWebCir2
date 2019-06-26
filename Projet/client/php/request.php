<?php 
  	require_once('database.php');
  	// db connect
  	$db = dbConnect();

  	if (!$db){
  		header ('HTTP/1.1 503 service unavailable');
  		exit;
  	}
	//check the request
  	$requestType = $_SERVER['REQUEST_METHOD'];
 	$request = substr($_SERVER['PATH_INFO'], 1);
 	$request = explode('/', $request);
	$requestRessource = array_shift($request);

	// check the id assocaition to the request
	$id = array_shift($request);
	if ($id == '')
		$id = NULL ;
		$data = false;
		// photo request 
	if ($requestRessource == 'voyages')
	{
		if($id != NULL)
			$data = dbRequestVoyage($db, intval($id));
		else 
			$data = dbRequestVoyages($db);
	}else if($requestRessource == "demande_reservation"){
        $data = dbRequestDemandeReservation($db);
        /*if($id != NULL)
            $data = dbRequestVoyage($db, intval($id));
        else
            $data = dbRequestReservation($db);*/
    }else if($requestRessource == "reservation"){
        $data = dbRequestReservation($db);
    }else if($requestRessource == "reserver"){

	    $inscription = new inscription();
	    $inscription->setDateDepart($_POST["date_depart"]);
	    $inscription->setDateRetour($_POST["date_retour"]);
        $inscription->setMontant($_POST["montant"]);
        $inscription->setMail($_POST["mail"]);
        $inscription->setReference($_POST["ref"]);
        $inscription->setValidation($_POST["validation"]);

        $user = new user();
        $user->setNom($_POST["nom"]);
        $user->setPrenom($_POST["prenom"]);
        $user->setDateNaissance($_POST["date_naissance"]);
        $user->setAdresse($_POST["adresse"]);
        $user->setMail($_POST["mail"]);
        $user->setTelephone($_POST["telephone"]);

        $data = dbAddUser($db,$user) + dbAddReservation($db,$inscription);

    }



	// Send data to the client 
	 header('Content-Type: text/plain; charset=utf-8');
	 header('Cache-control: no-store, no-cache, must-revalidate');
	 header('Pragma: no-cache');
	 if($requestType == 'POST')
	 	header('HTTP/1.1 200 Created');
	 else
	 header('HTTP/1.1 200 OK');
	 echo json_encode($data);
	 exit;

 ?>