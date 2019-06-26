<?php
include('php/database/request.php');
session_start();



updateValidation($_SESSION["reference"]);
header('Location: Inscriptionsreçues.php');
exit();