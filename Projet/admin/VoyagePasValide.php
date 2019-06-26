<?php
include('php/database/request.php');
session_start();

unvalidReservation($_SESSION["reference"]);
header('Location: Inscriptionsreçues.php');
exit();
