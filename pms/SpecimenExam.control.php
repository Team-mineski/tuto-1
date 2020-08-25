<?php
include_once "SpecimenExam.model.php";
include_once "Database.model.php";
include_once "Patient.class.php";



session_start();
//$database=unserialize($_SESSION['database']);
//$database->connectDatabase();
$database=Database::getInstance();

$patient = unserialize($_SESSION['patient']);
$regNo=$patient->getRegNo();
$date=$_SESSION['request_date'];


$specimen_form = new SpecimenExam($database,$regNo,$date);

$specimen_form->writeToTable();

 ?>
