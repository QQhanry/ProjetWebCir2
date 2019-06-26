<?php

  require_once('constants.php');
  require_once('inscription.php');
  require_once ('user.php');

  //----------------------------------------------------------------------------
  //--- dbConnect --------------------------------------------------------------
  //----------------------------------------------------------------------------
  // Create the connection to the database.
  // \return False on error and the database otherwise.
  function dbConnect()
  {
    try
    {
      $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME.';charset=utf8',
        DB_USER, DB_PASSWORD);
    }
    catch (PDOException $exception)
    {
      error_log('Connection error: '.$exception->getMessage());
      return false;
    }
    return $db;
  }

  //----------------------------------------------------------------------------
  //--- dbRequestPhoto ---------------------------------------------------------
  //----------------------------------------------------------------------------
  // Get a specific photo.
  // \param db The connected database.
  // \param id The id of the photo.
  // \return The photo.
  function dbRequestVoyage($db, $ref)
  {
    try
    {
      $request = 'select * from voyage where ref = :ref';
      $statement = $db->prepare($request);
      $statement->bindParam(':ref', $ref, PDO::PARAM_INT);
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return $result;
  }


function dbRequestVoyages($db)
{
  try
  {
    $request = 'select * from voyage';
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  catch (PDOException $exception)
  {
    error_log('Request error: '.$exception->getMessage());
    return false;
  }
  return $result;
}




function dbRequestDemandeReservation($db){

    try{
      $request = 'select * from voyage,inscription WHERE voyage.ref=inscription.ref AND inscription.validation = 1';
      $statement = $db->prepare($request);
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $exception){
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return $result;
}

function dbRequestReservation($db){
  try{
    $request = 'select * from voyage,inscription WHERE voyage.ref=inscription.ref AND inscription.validation = 2';
    $statement = $db->prepare($request);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  catch (PDOException $exception){
    error_log('Request error: '.$exception->getMessage());
    return false;
  }
  return $result;
}

function dbAddReservation($db,$inscription){

    $date_depart = $inscription->getDateDepart();
    $date_retour = $inscription->getDateRetour();
    $montant = $inscription->getMontant();
    $validation = $inscription->getValidation();
    $ref = $inscription->getReference();
    $mail = $inscription->getMail();


  try{
    $request = 'INSERT INTO inscription(date_depart,date_retour,montant,validation,mail,ref) VALUES (:date_depart,:date_retour,:montant,:validation,:mail,:ref)';
    $statement = $db->prepare($request);
    $statement->bindParam(':date_depart',$date_depart);
    $statement->bindParam(':date_retour',$date_retour);
    $statement->bindParam(':montant',$montant);
    $statement->bindParam(':validation',$validation);
    $statement->bindParam(':mail',$mail);
    $statement->bindParam(':ref',$ref);

    $statement->execute();

  }
  catch (PDOException $exception){
    error_log('Request error: '.$exception->getMessage());
    return false;
  }

}

function dbAddUser($db,$user){
  var_dump($user);
  $nom =$user->getNom();
  $prenom = $user->getPrenom();
  $date_naissance = $user->getDateNaissance();
  $telephone = $user->getTelephone();
  $adresse = $user->getAdresse();
  $mail = $user->getMail();


  try{
    $request = 'INSERT INTO client(nom,prenom,date_naissance,telephone,adresse,mail) VALUES (:nom,:prenom,:date_naissance,:telephone,:adresse,:mail)';
    $statement = $db->prepare($request);
    $statement->bindParam(':nom',$nom);
    $statement->bindParam(':prenom',$prenom);
    $statement->bindParam(':date_naissance',$date_naissance);
    $statement->bindParam(':telephone',$telephone);
    $statement->bindParam(':mail',$mail);
    $statement->bindParam(':adresse',$adresse);

    $statement->execute();

  }
  catch (PDOException $exception){
    error_log('Request error: '.$exception->getMessage());
    return false;
  }

}

?>
