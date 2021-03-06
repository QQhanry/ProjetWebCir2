<?php 

include('php/database/request.php');
$listepays = affichepays();

if (isset($_POST["reference"])) {
  $voyage = afficheVoyage($_POST["reference"]);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ISEN Voyages : admin</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php">ISEN Voyages</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
             <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Recherche.php">Recherche</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="gestiondevoyage.php">Gestion de voyages</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Inscriptionsreçues.php">Inscriptions reçues</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Inscriptionsvalidées.php">Inscriptions validées</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

      <!-- Formulaire pour modifier un voyage -->
        <form method="post" action="gestiondevoyage.php" id="modifiervoyage">
          <div class="container">  
            <div class="row">
               <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase" id="title_modif">Modifier un voyage</h2>
              </div><br>
              <div class="coordonnées" id="modifcoor">
              <h6>Libellé</h6>
                <div class="form-group">
                  <input class="form-control" id="libelle" name="libelle" type="text" placeholder="Libellé *" value=<?php echo '"'.$voyage[0]['libelle'].'"'?> >
                  <p class="help-block text-danger"></p>
                </div>
                <h6>Description</h6>
                <div class="form-group">
                  <textarea class="form-control" id="description" name="description" type="text" placeholder="Description *"  ><?php echo $voyage[0]['description'] ?></textarea>
                  <p class="help-block text-danger"></p>
                </div>
                <h6>Durée</h6>
                <div class="form-group">
                  <input class="form-control" id="duree" name="duree" type="number" min="0" placeholder="Durée *" value=<?php echo "'".$voyage[0]['duree']."'"?>  >
                  <p class="help-block text-danger"></p>
                </div>
                <h6>Coût</h6>
                <div class="form-group">
                  <input class="form-control" id="cout" name="cout" type="number" step="0.01" placeholder="Coût *" value=<?php echo "'".$voyage[0]['cout']."'"?>  >
                  <p class="help-block text-danger"></p>
                </div>
                <h6>Pays</h6>
                <select name="code_pays">
                  <?php
                  $pays = affichePays($voyage[0]['code_pays']);
                  echo "<option value ='".$voyage[0]['code_pays']."'>".$pays[0]['nom_pays']."</option>";
                  foreach ($listepays as $key => $value) {
                  echo "<option value='".$value[0]."'>".$value[1]."</option>";
                  }
                   ?>
                </select><br>
                 <div class="col-lg-12 text-center">
                <div id="validermodif"></div>
                <input type="hidden" name="reference" value=<?php echo "'".$voyage[0]['ref']."'"?>>
                <input type="hidden" name="modifvoyage" value="true">
                <button id="validateButton" class="btn btn-primary1 " type="submit">Valider</button>
              </div>

              </div>
            </div>
          </div>
      </form>




  <!-- Footer 

  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Your Website 2019</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>-->
  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>


  </body>
  </html>
